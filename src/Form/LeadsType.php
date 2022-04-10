<?php

namespace App\Form;

use App\Entity\Administrateur;
use App\Entity\Agent;
use App\Entity\Concessionnaire;
use App\Entity\Leads;
use App\Entity\Marchand;
use App\Entity\Modeleemail;
use App\Entity\Modelesms;
use App\Entity\Partenaire;
use App\Entity\SourcesLeads;
use App\Entity\Status;
use App\Entity\Statusleads;
use App\Entity\Utilisateur;
use App\Entity\Vendeurr;
use App\Repository\AgentRepository;
use App\Repository\ModeleemailRepository;
use App\Repository\ModelesmsRepository;
use App\Repository\PartenaireRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\DataTransformer\ChoicesToValuesTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class LeadsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder,  array $options): void
    {
        $builder
            ->add('nom')
            ->add('telephone')
            ->add('courriel')
            ->add('datecreation')
            ->add('commantaire')
            ->add('numserie')
            ->add('budgetmonsuelle')
            ->add('datenaissance')
            ->add('statutprofessionnel')
            ->add('revenumensuel')
            ->add('depuisquand')
            ->add('nomcompagnie')
            ->add('occupationposte')
            ->add('adressedomicile')
            ->add('locationproprietaire')
            ->add('paiementmonsuel')
            ->add('date')
            ->add('rappel')
            ->add('marque')
            ->add('modele')
            ->add('annee')
            ->add('type')
           


      ->add('agent', EntityType::class,array(
                'class' => Agent::class,
                'choice_label' => 'utilisateur.nomutilisateur',
                'required' => false,
                'label' => false ,
                'mapped'=>true,
                  
                ))
                ->add('vendeurr', EntityType::class,array(
                    'class' => Vendeurr::class,
                    'choice_label' => 'utilisateur.nomutilisateur',
                    'required' => false,
                    'label' => false ,
                    'mapped'=>true,
                      
                    ))
  

                  ->add('partenaire', EntityType::class,array(
                        'class' => Partenaire ::class,
                        'choice_label' => 'utilisateur.nomutilisateur',
                        'required' => false,
                        'label' => false ,
                        'mapped'=>true,
                        ))
                       
                            ->add('concessionnaire', EntityType::class,array(
                                'class' => Concessionnaire ::class,
                                'choice_label' => 'concessionnairemarchand.utilisateur.nomutilisateur',
                                'required' => false,
                                'label' => false ,
                                'mapped'=>true,
                
                                ))
                               ->add('marchand', EntityType::class,array(
                                    'class' => Marchand ::class,
                                    'choice_label' => 'concessionnairemarchand.utilisateur.nomutilisateur',
                                    'required' => false,
                                    'label' => false ,
                                    'mapped'=>true,
                                        
                               ))
                                    
                                    ->add('administrateur',EntityType::class,array(
                                        
                                        'class' => Administrateur::class,
                                        'choice_label' => 'utilisateur.nomutilisateur',
                                        'required' => false,
                                        'label' => false ,
                                        'mapped'=>true,
                                        
                          
                                    ))
                                   
                                  
                                  
                                         
                                        



                                        ->add('statusvehicule', ChoiceType::class,
                                            [
                                                'label' => 'Status :',
                                                'required' => false,
                                                'choices' => array(
                                                    'usagé' => 'usagé',
                                                    'neuf' => 'neuf',
                                              
                                                ),
                                                'placeholder' => 'Status',
                                            ]
                                        )


          
           /*    ->add('emailleads',EntityType::class,[
                    'class' => Modeleemail::class,
                    'choice_label' => function ($email) {
                       return $email->getTitre();
                    },
                    'expanded' => true,
                    'multiple' => true,
                    'required' => false,
                    'by_reference' => false ,
                    
                      ])
                  
    
                      ->add('smsleads',EntityType::class,[
                        'class' => Modelesms::class,
                        'choice_label' => function ($sms) {
                           return $sms->getTitre();
                        },
                        'expanded' => true,
                        'multiple' => true,
                        'required' => false,
                        'by_reference' => false ,
                       
                          ])*/
                          
    
            


            ->add('statusleads',EntityType::class,array(
                'class' => Statusleads::class,
                'choice_label' => 'nom',
  
            ))

            ->add('sourcesleads',EntityType::class,array(
                'class' => SourcesLeads::class,
                'choice_label' => 'nom',
  
            ))
        ;
    }


    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Leads::class,
           
        ]);
    }
}
