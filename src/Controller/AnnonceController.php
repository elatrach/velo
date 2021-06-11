<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnnonceRepository;
use App\Repository\ReservationRepository;
use App\Entity\Annonce;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\RechercheAnnonceFormType;


class AnnonceController extends AbstractController
{
    /**
    * @Route("/annonce", name= "annonce")
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
            return $this->render('annonce/afficheAnnonce.html.twig',['velo'=>$velo,'date'=>$dateReservation]);
        }
        
        return $this->render('annonce/rechercheAnnonce.html.twig',[
        	'form'=>$form->createView()]);
    }
    
}
