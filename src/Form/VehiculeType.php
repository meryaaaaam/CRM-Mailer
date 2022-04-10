<?php

namespace App\Form;
use App\Entity\Vehicule;
use App\Entity\Agent;
use App\Entity\Carburant;
use App\Entity\Carrosserie;
use App\Entity\Category;
use App\Entity\Concessionnaire;
use App\Entity\Concessionnairemarchand;
use App\Entity\Condition;
use App\Entity\Cylindres;
use App\Entity\Fabriquant;
use App\Entity\GalerieVehicule;
use App\Entity\Medias;
use App\Entity\Modele;
use App\Entity\Moteur;
use App\Entity\Partenaire;
use App\Entity\Status;
use App\Entity\Traction;
use App\Entity\Transmission;
use App\Entity\Utilisateur;
use App\Repository\AgentRepository;
use App\Repository\ConcessionnairemarchandRepository;
use App\Repository\ConcessionnaireRepository;
use App\Repository\PartenaireRepository;
use App\Repository\UtilisateurRepository;
use App\Repository\VehiculeRepository;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotNull;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        // $imageConstraints = [
        //     new NotNull([
        //         'message' => 'Veuillez inserer une image'])
        // ] ;
        
        // /** @var Medias $media  */
        $media = new Medias() ;
        
        
        if (! $media ) {
            $imageConstraints[] = new NotNull([
                'message' => 'Please upload an image',
            ]);
        }


        $builder
            ->add('stock')
            ->add('vin')
            ->add('numinventaire') 
            ->add('actif')
            ->add('km')
            ->add('Couleurexterieur')
            ->add('couleurinterieur')
            ->add('portes')
            ->add('Passagers')
            ->add('prixdetail')
            ->add('prixwholesale')
           
            ->add('Aileronarriere')
            ->add('antipatinage')
            ->add('chargeurdc')
            ->add('climatisationautomatique')
            ->add('coussingonflablepouleconducteur')
            ->add('crochetremorquagearriere')
            ->add('detecteurdepluie')
            ->add('Essuieglacesintermittentsavitessevariable')
            ->add('inclinaisonelectriquetoitouvrantcoulissant')
            ->add('miroirschauffants')
            ->add('ordinateurdebord')
            ->add('pharesantibrouillard')
            ->add('radiosatellite')
            ->add('servodirection')
            ->add('siegesarriereschauffants')
            ->add('sonardestationnementarriere')
            ->add('systemealarme')
            ->add('tacheometre')
            ->add('vitreselectriques')
            ->add('airclimatise')
            ->add('bluetooth')
            ->add('climatisation2zones')
            ->add('commandesauvolant')
            ->add('coussingonflablepourlepassager')
            ->add('degivreurarriere')
            ->add('enjoliveursderoues')
            ->add('freinsabc')
            ->add('lecteurdc')
            ->add('miroirselectriques')
            ->add('ouverturesducoffreadistance')
            ->add('pharesxenon')
            ->add('regulateurdevistesse')
            ->add('Sigeschauffants')
            ->add('siegechauffantconducteur')
            ->add('siegesarrierestraversables')
            ->add('siegescuire')
            ->add('sunmoonroof')
            ->add('systemedenavigation')
            ->add('tapisdesolavant')
            ->add('vitresteintes')
            ->add('amfmsterio')
            ->add('cameraderecul')
            ->add('climatisationarriere')
            ->add('controledestabilite')
            ->add('cousinsgonflableslateraux')
            ->add('demarragesanscle')
            ->add('entreesanscle')
            ->add('freinsassistes')
            ->add('lecteurmp')
            ->add('miroirssignaldecourbeintegre')
            ->add('particulier')
            ->add('porteselectriques')
            ->add('serruresdesecuritepourenfant')
            ->add('siegeelectriqueconducteur')
            ->add('siegesbaquets')
            ->add('siegesmemoire')
            ->add('systemeantivol')
            ->add('systemesurveillancepressiondespneus')
            ->add('toitouvrant')
          
            ->add('volantajustable')
            ->add('annee',
                'Symfony\Component\Form\Extension\Core\Type\ChoiceType',[
                'choices' => $this->getYears(1960)
            ])

           //Photo prinicpale
           ->add('media', MediasType::class, array(
               
               'required'  => false ,
            //    'constraints' => $imageConstraints
               ))
        
        ->add('galerie', FileType::class, [
            'label' => false,
            'multiple' => true,
            'mapped' => false,
            'required' => false
                                         ])

          

            ->add('disponiblefinance')
          
            ->add('financement', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
            ])
            ->add('disponiblegarentie')
           
            ->add('garentie', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
            ])
            ->add('carproof')
           
           
           
            ->add('modele',EntityType::class,array(
                'class' => Modele::class,
                'choice_label' => 'nom',
  
            ))
    
            ->add('marque',EntityType::class,[
                'class' => Fabriquant::class,
                'choice_label' => function ($marq) {
                 
                   return $marq->getNom();
                },
                'expanded' => false
                
            ])
        

            ->add('category',EntityType::class,array(
                'class' => Category::class,
                'choice_label' => 'nom',
  
            ))
       
            ->add('status',EntityType::class,array(
                'class' => Status::class,
                'choice_label' => function ($statu) {
                 
                    return $statu->getNom();
                 },
                 'expanded' => false
  
            ))
          

            ->add('carrosserie',EntityType::class,array(
                'class' => Carrosserie::class,
                'choice_label' => 'nom',
  
            ))
       

            ->add('transmission',EntityType::class,array(
                'class' => Transmission::class,
                'choice_label' => 'nom',
  
            ))
      


            ->add('Carburant',EntityType::class,array(
                'class' => Carburant::class,
                'choice_label' => 'nom',
  
            ))

            ->add('traction',EntityType::class,array(
                'class' => Traction::class,
                'choice_label' => 'nom',
  
            ))
         
        

            ->add('cylindres',EntityType::class,array(
                'class' => Cylindres::class,
                'choice_label' => 'nom',
  
            ))


            ->add('moteur',EntityType::class,array(
                'class' => Moteur::class,
                'choice_label' => 'nom',
  
            ))

           
        
            
            ->add('conditions',EntityType::class,array(
                'class' => Condition::class,
                'choice_label' => 'nom',
  
            ))

           
           
            ->add('utilisateur', EntityType::class,array(
                'class' => Utilisateur::class,
                'choice_label' => 'nom', 
                'query_builder' => function(UtilisateurRepository $repo)
                    {
                        $companies = $repo->fillCompanies();
                       
                        return $companies;
                        },
                        
                        'expanded' => false,
                        'multiple' => false
                      
                    ))

            
                    ->add('liquidation')
           
               


         
        
           
        ;
    }



    

    private function getYears($min, $max='current')
    {
         $years = range($min, ($max === 'current' ? date('Y') : $max));

         return array_combine($years, $years);
    }
  
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
   
}
