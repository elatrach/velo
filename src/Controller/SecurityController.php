<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{

    /** 
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, EntityManagerInterface $manager,UserPasswordEncoderInterface $encoder)
    {
        $user = new Utilisateur();

        $form = $this->createForm(RegistrationType::class , $user);

        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid()){
            $hash = $encoder->encodepassWord($user, $user->getMdpUtilisateur());
            $user->setMdpUtilisateur($hash);


            $manager->persist($user);
            $manager->flush();
        }

        return $this->render("security/registration.html.twig",[
            'form' => $form->createView()
        ]);
       
    }



}
