<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class AddIndispoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date1',CheckboxType::class)
            ->add('date2',CheckboxType::class)
            ->add('date3',CheckboxType::class)
            ->add('date4',CheckboxType::class)
            ->add('date5',CheckboxType::class)
            ->add('date6',CheckboxType::class)
            ->add('date7',CheckboxType::class)
            ->add('date8',CheckboxType::class)
            ->add('date9',CheckboxType::class)
            ->add('date10',CheckboxType::class)
            ->add('date11',CheckboxType::class)
            ->add('date12',CheckboxType::class)
            ->add('date13',CheckboxType::class)
            ->add('date14',CheckboxType::class)
            ->add('date15',CheckboxType::class)
            ->add('date16',CheckboxType::class)
            ->add('date17',CheckboxType::class)
            ->add('date18',CheckboxType::class)
            ->add('date19',CheckboxType::class)
            ->add('date20',CheckboxType::class)
            ->add('date21',CheckboxType::class)
            ->add('date22',CheckboxType::class)
            ->add('date23',CheckboxType::class)
            ->add('date24',CheckboxType::class)
            ->add('date25',CheckboxType::class)
            ->add('date26',CheckboxType::class)
            ->add('date27',CheckboxType::class)
            ->add('date28',CheckboxType::class)
            ->add('date29',CheckboxType::class)
            ->add('date30',CheckboxType::class)
            ->add('date31',CheckboxType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
            
        ]);
    }
}
