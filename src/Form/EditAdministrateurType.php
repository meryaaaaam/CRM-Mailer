<?php

namespace App\Form;
use App\Form\EditUtilisateurType;
use App\Entity\Administrateur;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class EditAdministrateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
             ->add('authenvoiemails',CheckboxType::class,[
                'label_attr' => [
                    'class' => 'checkbox-switch'
                ],'required' => false
        
            ])
            ->add('authenvoisms',CheckboxType::class,[
                'label_attr' => [
                    'class' => 'checkbox-switch'
                ],'required' => false
        
            ])
            ->add('utilisateur',EditUtilisateurType ::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Administrateur::class,
        ]);
    }
}
