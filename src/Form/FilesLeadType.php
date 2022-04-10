<?php

namespace App\Form;

use App\Entity\FilesLead;
use App\Entity\Leads;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilesLeadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           
           ->add('nom', FileType::class, [
                'label' => false,
                'multiple' => false,
                'mapped' => false,
                'required' => false
                                             ])

                                             
            ->add('lien')
            ->add('titre')
            ->add('lead', EntityType::class,array(
                'class' => Leads ::class,
                'choice_label' => 'nom',
                'required' => false,
                

                ))
        ;
       
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FilesLead::class,
        ]);
    }
}
