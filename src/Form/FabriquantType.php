<?php

namespace App\Form;

use App\Entity\Fabriquant;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FabriquantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('actifcrm',CheckboxType::class,[
                'label_attr' => [
                    'class' => 'checkbox-switch'
                ],'required' => false
            ])
               
            ->add('actifservice',CheckboxType::class,[
                'label_attr' => [
                    'class' => 'checkbox-switch'
                ],'required' => false

            ])
        
            ->add('actifaccueil',CheckboxType::class 
            ,[
                'label_attr' => [
                    'class' => 'checkbox-switch'
                ],'required' => false
            ])
            
            ->add('nom')
            ->add('lien')
            ->add('description', TextareaType::class, [
                'attr' => array('cols' => '5', 'rows' => '5')])

            ->add('media', MediasType::class,[
                'required'=>true]  )
            ;
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fabriquant::class,
        ]);
    }
}
