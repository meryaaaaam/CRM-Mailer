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
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\OptionsResolver\OptionsResolver;



class TestController extends AbstractController

{

    public function __construct(  VehiculeRepository $vehiculeRepository,)
    { //ici on instancie le repo
        $this->vehiculeRepository=$vehiculeRepository;
    }
    
     
    #[Route('/test', name: 'test' , methods:'GET|POST')]
    public function Filter(  VehiculeRepository $repository ,Request $request , UtilisateurRepository $Users)
    {
             $form = $this->createFormBuilder()
            ->add('Year',
                'Symfony\Component\Form\Extension\Core\Type\ChoiceType',[
                'choices' => $this->getYears(1960) , 
                'label' => false,
                'required' => false
            ])


            ->add('Status',EntityType::class,array(
                'class' => Status::class,
                'choice_label' => function ($status) {
                 
                    return $status->getNom();
                 },
                 'expanded' => false ,
                 'required' => false ,
                 'label' => false 
  
            ))

            ->add('Marque',EntityType::class,array(
                'class' => Fabriquant::class,
                'choice_label' => function ($F) {
                 
                    return $F->getNom();
                 },
                 'required' => false ,
                 'label' => false 
  
            ))

            ->add('Modele',EntityType::class,array(
                'class' => Modele::class,
                'choice_label' => function ($M) {
                 
                    return $M->getNom();
                 },
                 'required' => false ,
                 'label' => false 
  
            ))


            ->add('Users',EntityType::class,array(
                'class' => Utilisateur::class,
                'choice_label' => function ($users) {
                 
                    return $users->getnom();
                 },
                 'required' => false ,
                 'label' => false 
  
            ))

            ->add('Inv',EntityType::class,array(
                'class' => Vehicule::class,
                'choice_label' => function ($vehicules) {
                 
                    return $vehicules->getNuminventaire();
                 },
                 'required' => false ,
                 'label' => false 
  
            ))
            ->add('Submit', SubmitType::class)

            ->add('Reset', ResetType::class )

            ->getForm();
            ;
 
            $form -> handleRequest($request);
            $y =$form->get('Year')->getData() ;
            $Status =$form->get('Status')->getData() ;
            $marque =$form->get('Marque')->getData() ;
            $Modele =$form->get('Modele')->getData() ; 
            $Users =$form->get('Users')->getData();  
            $vehicules = $repository -> findAll();
            $Inv =$form->get('Inv')->getData();           
    
          
 
           $phe ='' ;
           $condition = '' ;
           if ($marque)
           { $marque_form = ($form->get('Marque')->getData( ))->getnom() ;
            $condition .=  '$v->getmarque()->getnom()  ==   $marque_form '  ; }
            if ($Modele) 
            { $modele_form = ($form->get('Modele')->getData( ))->getnom()  ;
                $condition .=  '&& $v->getmodele()->getnom() == $modele_form ' ; }
                if ($Inv)
                {   $Inv_form = ($form->get('Inv')->getData())->getNuminventaire()  ;
                    $condition .=  '&& $v->getNuminventaire() == $Inv_form ' ; }
                    if ($Users  )
                    { $U_form = $form->get('Users')->getData()->getNomutilisateur();

                        $condition .=  '&& $v->getutilisateur()->getNomutilisateur() == $U_form ' ; }
                        if ($y  )
                        {$Y_form = $form->get('Year')->getData() ;
                            $condition .=  '&& $v->getannee() == $Y_form ' ; } 
                            if ($Status )
                            {$S_form = $form->get('Status')->getData()->getnom();
                                $condition .=  '&& $v->getstatus()->getnom() == $S_form  ' ; }


 
 
                                if ( substr($condition, 0,2) == '&&' ) 

                                { $condition[0] = " " ;
                                    $condition[1] = " " ;
 
                                }


                                {$cmd = ' if (' . $condition . ') ';
                                    $cmd .= ' {  ' ;
              // $condition .= $phe . ' = true' ;
              $cmd .= '$phe = true ;'   ;
              $cmd .= '  } ' ;
              $cmd .= ' else {  $phe = false ;}   ' ;
 
 


              $i =0 ;
              $filterr = $repository -> findAll() ;
              if(!empty($condition))

              {   $filterr = [] ;
                foreach ( $vehicules as $v)
                {
                    ++$i ;
    
                    if($condition)
                    { eval( $cmd );
                        if($phe == 'true') 
                        { 
                            $filterr[$i] = $v ; }
         
                        }
                    }
                }
                else {$filterr = $repository -> findAll() ;}
            }
  
         
            return $this->render('test/index.html.twig', [
                'form' => $form->createView(),
                'vehicule' => $filterr  ]);   
         }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }



    private function getYears($min, $max='current')
    {
         $years = range($min, ($max === 'current' ? date('Y') : $max));

         return array_combine($years, $years);
    } 

    
  
    
   
}
