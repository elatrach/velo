<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class CreateAnnonceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreAnnonce')
            ->add('descriptionAnnonce')
            ->add('prixAnnonce')


            ->add('idTaille')
            ->add('idUtilisateur')
            ->add('idCategorie')
            ->add('idCible')
            ->add('idAccessoire')

            ->add('idPhoto',FileType::class,['mapped'=>false,'required'=>false,'constraints' =>[
                    new File(
                        [
                            'maxSize' => '2048k',
                            'mimeTypes' =>
                            [
                                'image/jpeg',
                                'image/png'
                            ],
                        'mimeTypesMessage' => 'Please upload a valid JPG or PNG image',
                        ])
                    ],
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
