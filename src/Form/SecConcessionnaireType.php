<?php

namespace App\Form;


use App\Entity\Concessionnaire;
use App\Entity\Concessionnairemarchand;
use App\Form\SecUtilisateurType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SecConcessionnaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder


            ->add('utilisateur', SecUtilisateurType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Concessionnaire::class,
        ]);
    }
}
