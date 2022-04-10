<?php

namespace App\Form;

use App\Entity\Emails;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sendto' , EmailType::class, [
                'label' => 'mail lead',
                'attr' => [
                    'class' => 'form-control'
                ]
            ]) 

            ->add('sendfrom' , EmailType::class, [
                'label' => 'mail lead',
                'attr' => [
                    'class' => 'form-control'
                ]
            ]) 


            ->add('sujet' , EmailType::class, [
                'label' => 'mail user',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('msg')

            
            ->add('lead')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Email::class,
        ]);
    }
}
