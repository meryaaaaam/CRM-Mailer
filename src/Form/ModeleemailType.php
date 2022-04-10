<?php

namespace App\Form;

use App\Entity\Modeleemail;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModeleemailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('sujetemail')
      

            ->add('message', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
            ])
        
         ->add('user', HiddenType::class, [
                'data' => 'abcdef',
            ]);
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Modeleemail::class,
        ]);
    }
}
