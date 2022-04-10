<?php

namespace App\Form;

use App\Entity\Agent;
use App\Entity\Typeagent;
use App\Form\UtilisateurType;
use App\Form\Type;
use App\Form\ConcessionnairemarchandType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class AgentType extends AbstractType
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
           /* ->add('concessionnairemarchands', ConcessionnairemarchandType::class)*/
            //->add('typeagent',)
            ->add('typeagent',EntityType::class,[
                'class' => Typeagent::class,
                'choice_label' => function ($ag) {
                  # return sprintf('<img src="%s"/>', $fab->getMedia()->getLien());
                 
                   return $ag->gettype();
                },
                'expanded' => false , 
                'required' => True
                
            ])
            
            ->add('utilisateur', UtilisateurType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Agent::class,
        ]);
    }
}

