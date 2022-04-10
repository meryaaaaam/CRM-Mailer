<?php

namespace App\Form;


use App\Entity\Agent;
use App\Entity\Concessionnairemarchand;
use App\Entity\Marchand;
use App\Form\SecUtilisateurType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SecMarchandType extends AbstractType
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
            'data_class' => Marchand::class,
        ]);
    }
}
