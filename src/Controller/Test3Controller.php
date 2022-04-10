<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Fabriquant;
use App\Entity\Modele;
use App\Repository\VehiculeRepository;
use App\Repository\StatusRepository;
use App\Repository\FabriquantRepository;
use App\Repository\ModeleRepository;

use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use App\Entity\Vehicule;
use App\Form\TestType;
use App\Entity\Status;
use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Test3Controller extends AbstractController
{
    #[Route('/test3', name: 'test3')]
    public function index(  VehiculeRepository $repository , ModeleRepository $MRepo , FabriquantRepository $Frep , StatusRepository $Rstatus ): Response
    {
        $vehicules = $repository -> findAll();
        
       
        
        return $this->render('test3/index.html.twig', [
            'vehicule' => $vehicules

        ]);
    }



    public function filter(ModeleRepository $MRep , VehiculeRepository $repository,FabriquantRepository $Frep,  StatusRepository $Rstatus , Request $request , UtilisateurRepository $Users)
    {
        
    }
}
