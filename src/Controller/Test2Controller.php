<?php

namespace App\Controller;

 
use App\Entity\Fabriquant;
use App\Entity\Modele;
use App\Repository\VehiculeRepository;
use App\Repository\StatusRepository;
use App\Repository\FabriquantRepository;
use App\Repository\ModeleRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use App\Entity\Vehicule;
use App\Form\TestType;
use App\Entity\Status;
use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;

class Test2Controller extends AbstractController
{
    #[Route('/test2', name: 'test2')]
     public function Filter(ModeleRepository $MRep , VehiculeRepository $repository,FabriquantRepository $Frep,  StatusRepository $Rstatus , Request $request , UtilisateurRepository $Users)
    {
       $status = $Rstatus -> findAll();
       $F = $Frep -> findAll();

            $form = $this->createFormBuilder()
            ->add('Year',
                'Symfony\Component\Form\Extension\Core\Type\ChoiceType',[
                'choices' => $this->getYears(1960) , 
                'label' => false,
                'required' => false
            ])
            ->add('Submit', SubmitType::class)
            ->getForm();
            ;

            $form -> handleRequest($request);
            $y =$form->get('Year')->getData() ;
         

         
            $SearchByYears = $repository->findByYear( $y);
                        
 


            $form2 = $this->createFormBuilder()
            ->add('Status',EntityType::class,array(
                'class' => Status::class,
                'choice_label' => function ($status) {
                 
                    return $status->getNom();
                 },
                 'expanded' => false ,
                 'required' => false ,
                 'label' => false 
  
            ))
            ->add('Submit', SubmitType::class)
            ->getForm();
            ;

            $form2 -> handleRequest($request);
            $Status =$form2->get('Status')->getData() ;
         

            $SearchByStatus = $repository->findBystatus($Status);
            //    dump($Status);die();
 
            $form3 = $this->createFormBuilder()
            ->add('Marque',EntityType::class,array(
                'class' => Fabriquant::class,
                'choice_label' => function ($F) {
                 
                    return $F->getNom();
                 },
                 'required' => false ,
                 'label' => false 
  
            ))
            ->add('Submit', SubmitType::class)
            ->getForm();
            ;

            $form3 -> handleRequest($request);
            $marque =$form3->get('Marque')->getData() ;
         

            $SearchByMarque = $repository->findByMarque($marque);
            //    dump($Marque);die();

             $M = $MRep -> findAll();

            $form4 = $this->createFormBuilder()
            ->add('Modele',EntityType::class,array(
                'class' => Modele::class,
                'choice_label' => function ($M) {
                 
                    return $M->getNom();
                 },
                 'required' => false ,
                 'label' => false 
  
            ))
            ->add('Submit', SubmitType::class)
            ->getForm();
            ;

            $form4 -> handleRequest($request);
            $Modele =$form4->get('Modele')->getData() ;
         

            $Modele = $repository->findByModel($Modele);
            //    dump($Modele);die();

               $users = $Users -> FindAll() ; 

            $form6 = $this->createFormBuilder()
            ->add('Users',EntityType::class,array(
                'class' => Utilisateur::class,
                'choice_label' => function ($users) {
                 
                    return $users->getnom();
                 },
                 'required' => false ,
                 'label' => false 
  
            ))
            ->add('Submit', SubmitType::class)
            ->getForm();
            ;

            $form6 -> handleRequest($request);
            $Users =$form6->get('Users')->getData();  

            //  dump($repository->findByUser(12));die();

            // dump($Users->getId());die();
             if($Users)
            { $SearchByUser = $repository->findByUser($Users->getId());  }
            else 
            $SearchByUser = Null  ;

                $vehicules = $repository -> findAll();
                // dump($SearchByYears);die();

            $form5 = $this->createFormBuilder()
            ->add('Inv',EntityType::class,array(
                'class' => Vehicule::class,
                'choice_label' => function ($vehicules) {
                 
                    return $vehicules->getNuminventaire();
                 },
                 'required' => false ,
                 'label' => false 
  
            ))
            ->add('Submit', SubmitType::class)
            ->getForm();
            ;

            $form5 -> handleRequest($request);
            $Inv =$form5->get('Inv')->getData();           
            if ($Inv)
          {  $SearchByInv = $repository->findByNumInv($Inv->getNuminventaire());
                // dump($SearchByInv);die();
          }
          else 
          $SearchByInv = [] ; 



          if ($SearchByYears)
               { $filter = $SearchByYears ;
            }
          else if ($SearchByInv)
               { $filter = $SearchByInv ; }
          else if ($SearchByStatus )
                { $filter = $SearchByStatus ;}
          else if ($Modele)
                {$filter = $Modele ;}
          else if ($SearchByMarque )
                {$filter = $SearchByMarque ;}

          else if ($SearchByInv  )
               {$filter = $SearchByInv  ;} 
          
          else if ($SearchByUser  )
               {$filter = $SearchByUser  ;}
               
          else 
               {$filter = $vehicules  ;}

                
        return $this->render('test2/index.html.twig', [
            
            
            'form' => $form->createView(),
            'form2' => $form2->createView() , 
            'form3' =>  $form3->createView() , 
            'form4' => $form4->createView() , 
            'form5' => $form5->createView() , 
            'form6' => $form6->createView() , 
            // 'vehicules' => $vehicules , 
            'vehicule' => $filter 
            // 'Y' => $SearchByYears ,
            // 'Status' =>  $SearchByStatus , 
            // 'Model' => $Modele, 
            // 'Marque' => $SearchByMarque , 
            // 'Inv' => $SearchByInv , 
            // 'Users' =>$SearchByUser 
            
       
            
        ]);   
    }

    private function getYears($min, $max='current')
    {
         $years = range($min, ($max === 'current' ? date('Y') : $max));

         return array_combine($years, $years);
    }
}