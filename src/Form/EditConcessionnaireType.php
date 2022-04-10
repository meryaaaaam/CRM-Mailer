<?php

namespace App\Form;

use App\Entity\Concessionnaire;
use App\Entity\Utilisateur;
use App\Entity\Concessionnairemarchand;
use App\Entity\Fabriquant;
use App\Form\UtilisateurType;

use Doctrine\Migrations\Configuration\Connection\ConfigurationFile;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditConcessionnaireType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
         ->add('concessionnairemarchand', EditConcessionnairemarchandType::class, ['label' => false ]);
        
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Concessionnaire::class,
          
        ]);
    }

    
}
