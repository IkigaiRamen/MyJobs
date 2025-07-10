<?php

namespace App\Form\Travailleur;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CvWorkFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('work1')
        ->add('company1')
        ->add('workperiod1')
        ->add('workdescription1',TextareaType::class)
        ->add('work2')
        ->add('company2')
        ->add('workperiod2')
        ->add('workdescription2',TextareaType::class)
        ->add('Modifier', SubmitType::Class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
