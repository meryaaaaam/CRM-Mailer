<?php

namespace App\Form;
use App\Form\EditUtilisateurType;
use App\Entity\Agent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Typeagent;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class EditAgentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
               ->add('actif',CheckboxType::class,[
                'label_attr' => [
                    'class' => 'checkbox-switch'
                ],'required' => false
        
            ])
            
              ->add('authenvoiemail',CheckboxType::class,[
                'label_attr' => [
                    'class' => 'checkbox-switch'
                ],'required' => false
        
            ])
            ->add('authenvoisms',CheckboxType::class,[
                'label_attr' => [
                    'class' => 'checkbox-switch'
                ],'required' => false
        
            ])
       
        ->add('typeagent',EntityType::class,[
            'class' => Typeagent::class,
            'choice_label' => function ($ag) {   return $ag->gettype();},
             'expanded' => false ,
             'required' => True  ])
        
        ->add('utilisateur', EditUtilisateurType::class)
    
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agent::class,
        ]);
    }
}
