<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnnonceRepository;
use App\Repository\ReservationRepository;
use App\Entity\Annonce;
use App\Entity\Photo;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\RechercheAnnonceFormType;
use App\Form\CreateAnnonceFormType;
use App\Form\ModifAnnonceFormType;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class AnnonceController extends AbstractController
{
    /**
    * @Route("/recherche_annonce", name= "recherche_annonce")
    */
    public function rechercheAnnonce(ReservationRepository $reservationRepo, AnnonceRepository $annonceRepo ,Request $request, EntityManagerInterface $em):Response
    {
    	$annonce=new RechercheAnnonceFormType();
        $form=$this->createForm(RechercheAnnonceFormType::class);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid())
        {
        	$data=$request->request->all();
        	unset($data['recherche_annonce_form']['_token']);
            $velo=$annonceRepo->findBy($data['recherche_annonce_form']);
            $idData=array();
            foreach ($velo as $v)
            {
                array_push($idData, $v->getIdAnnonce());
            }
            $dateReservation=array();
            foreach($idData as $id)
            {
                array_push($dateReservation,$reservationRepo->findBy(["idAnnonce"=>$id]));
            }
            return $this->render('annonce/afficheAnnonce.html.twig',['velo'=>$velo,'date'=>$dateReservation,'data'=>$data]);
        }
        
        return $this->render('annonce/rechercheAnnonce.html.twig',[
        	'form'=>$form->createView()]);
    }


    /**
    * @Route("/poster_annonce", name= "poster_annonce")
    */
    public function addAnnonce(Request $request, EntityManagerInterface $em, SluggerInterface $slugger):Response
    {
        $annonce=new Annonce();
        $form=$this->createForm(CreateAnnonceFormType::class,$annonce);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid())
        {
            $imagefile=$form->get('idPhoto')->getData();
            if ($imagefile)
            {
                $originalFilename = pathinfo($imagefile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = '/uploads/images/'.$safeFilename.'-'.uniqid().'.'.$imagefile->guessExtension();
                $imagefile->move($this->getParameter('images_directory'),$newFilename);
                $photo=new Photo();
                $photo->setFilenamePhoto($newFilename);
                $em->persist($photo);
                $em->flush();
                $annonce->addIdPhoto($photo);
            }
            $annonce->setDateCreationAnnonce(new \DateTime());
            $em->persist($annonce);
            $em->flush();
            return $this->redirectToRoute('home');
        }
        
        return $this->render('annonce/create_annonce.html.twig',[
            'form'=>$form->createView()]);
    }

    /**
    * @Route("/annonce/{id}/edit", name= "annonce_edit")
    */
    public function editAnnonce(Annonce $annonce, Request $request, EntityManagerInterface $em):Response
    {
        $form=$this->createForm(ModifAnnonceFormType::class,$annonce, ['method'=>'GET']);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid())
        {
            $em->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('annonce/annonce_edit.html.twig',['annonce'=>$annonce,'form'=>$form->createView()]);
    }

    /**
    * @Route("/annonce/{id}/delete", name= "annonce_delete")
    */
    public function deleteAnnonce(Annonce $annonce, Request $request, EntityManagerInterface $em):Response
    {
        $annonce->setFlagAfficheAnnonce(0);
        $em->flush();
        return $this->redirectToRoute('home');
    }

    /**
    * @Route("/annonce", name= "all_annonce")
    */
    public function allAnnonce(AnnonceRepository $annonceRepo, ReservationRepository $reservationRepo): Response
    {
        $velo=$annonceRepo->findAll();
        $idData=array();
        foreach ($velo as $v)
        {
            array_push($idData, $v->getIdAnnonce());
        }
        $dateReservation=array();
        foreach($idData as $id)
        {
            array_push($dateReservation,$reservationRepo->findBy(["idAnnonce"=>$id]));
        }
        return $this->render('annonce/afficheAnnonce.html.twig',['velo'=>$velo,'date'=>$dateReservation]);
    }
}
