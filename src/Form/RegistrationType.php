<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomUtilisateur')
            ->add('prenomUtilisateur')
            ->add('dateDeNaissanceUtilisateur',DateType::class,[
                'placeholder' => [
                    'day' => 'Jour', 'month' => 'Mois','year' => 'années'
                ]
                ])
            ->add('adresseUtilisateur')
            ->add('mailUtilisateur')
            ->add('mdpUtilisateur', PasswordType::class)
            ->add('portableUtilisateur')
            ->add('typeUtilisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
