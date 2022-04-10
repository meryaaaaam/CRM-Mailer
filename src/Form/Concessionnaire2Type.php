<?php

namespace App\Form;

use App\Entity\Concessionnaire;
use App\Entity\Concessionnairemarchand;
use App\Entity\Utilisateur;
use App\Repository\ConcessionnairemarchandRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Concessionnaire2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Utilisateur',EntityType::class,[
                'class'=>Utilisateur::class,
                'label'=>false,
                'choice_label'=>function(Utilisateur $user){
                return $user->getNom();
                },
                'multiple'=>false,
                'required'=>true,
                'mapped'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Concessionnaire::class,
        ]);
    }
}
