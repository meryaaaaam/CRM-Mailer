<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AdministrateurRepository;
use App\Entity\Administrateur;
use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;

class DefaultController extends AbstractController
{

 

    #[Route('/', name: 'index')] 
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


    // #[Route('/index', name: 'index')] 
    //  public function topbar(Administrateur $admin): Response
    // {
 
    //     $admin = $this->AdministrateurRepository->findOneByUtilisateur_Id ('89');              
   
    //     return $this->render('default/index.html.twig', [
    //         'admiin' => $admin
 
    //     ]);
    //  }
   

}
