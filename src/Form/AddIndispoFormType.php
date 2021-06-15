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
            ->add("date1", CheckboxType::class)
            ->add("date2")
            ->add("date3")
            ->add("date4")
            ->add("date5")
            ->add("date6")
            ->add("date7")
            ->add("date8")
            ->add("date9")
            ->add("date10")
            ->add("date11")
            ->add("date12")
            ->add("date13")
            ->add("date14")
            ->add("date15")
            ->add("date16")
            ->add("date17")
            ->add("date18")
            ->add("date19")
            ->add("date20")
            ->add("date21")
            ->add("date22")
            ->add("date23")
            ->add("date24")
            ->add("date25")
            ->add("date26")
            ->add("date27")
            ->add("date28")
            ->add("date29")
            ->add("date30")
            ->add("date31")
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
