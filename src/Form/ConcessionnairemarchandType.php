<?php

namespace App\Form;

use App\Entity\Agent;
use App\Entity\Concessionnairemarchand;
use App\Entity\Fabriquant;
use App\Entity\Medias;
use App\Repository\AgentRepository;
//use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Validator\Constraints\NotNull;



class ConcessionnairemarchandType extends AbstractType
{

    public function __construct(ObjectManager $om, AgentRepository $agentRepository){
        $this->om = $om;
        $this->agentRepository = $agentRepository;
    }
    
   

   

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       
        $Constraints = [
            
            new NotNull([
                'message' => 'Veuillez remplir ce champs'])
        ] ;

        
        $builder

            ->add('actif',CheckboxType::class,[
                'label_attr' => [
                    'class' => 'checkbox-switch'
                ],
                'required' => false]) 

            ->add('siteweb' , null , [
                'required'   => true,
                'constraints' => $Constraints ]


            )

            ->add('liendealertrack' , null , [
                'required'   => true,
                'constraints' => $Constraints ]
            
            )


            ->add('description',TextareaType::class , 
            [ 'required' => True , 
            'constraints' => $Constraints
            ] )


            ->add('utilisateur', UtilisateurType::class ,  [ 'required' => True     ] )

        


            ->add('fabriquants',EntityType::class,[
                'class' => Fabriquant::class,
                'choice_label' => function ($fab) {
                   return $fab->getNom();
                },
                'expanded' => true,
                'multiple' => true,
                'by_reference' => false 
                
                
                                               ])
           ->add('agents', EntityType::class,array(
                    'class' => Agent::class,
                    'choice_label' => 'utilisateur.nom', 
                    'query_builder' => function(AgentRepository $repo)
                    {
                        $agents = $repo->fillAgents();
                        return $agents;
                        },
                        
                        'expanded' => false,
                        'multiple' => true
                      
                    ))


            ->add('vendeurs', EntityType::class,array(
            'class' => Agent::class,
            'choice_label' => 'utilisateur.nom', 
            'query_builder' => function(AgentRepository $repo)
            {
                $vendeurs = $repo->fillVendeurs();
                return $vendeurs;
                },
                
                'expanded' => false,
                'multiple' => true,
                'mapped' => false
            ))
            
               

              
                ->add('media', MediasType::class)
           
            
                ;
            }
     
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Concessionnairemarchand::class,
        ]);
    }
}
