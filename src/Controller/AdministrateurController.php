<?php

namespace App\Controller;
use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Entity\Administrateur;
use App\Form\AdministrateurType;
use App\Form\EditAdministrateurType;
use App\Form\SecAdministrateurType;
use App\Form\SecUtilisateurType;
use App\Form\EditUtilisateurType;

use App\Repository\AdministrateurRepository;
/*use Doctrine\ORM\EntityManager;*/
/*use Doctrine\Common\Persistence\ObjectManager;*/
/*use Doctrine\ORM\EntityManagerInterface;*/
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
//use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
//use App\Security\LoginAuthentificatorAuthenticator;


use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class AdministrateurController extends AbstractController  
{
    public function __construct(AdministrateurRepository $administrateurRepository,

    )
    {
        $this->AdministrateurRepository = $administrateurRepository;

    }


    #[Route('/administrateur', name: 'administrateur')]
    public function index(AdministrateurRepository $repository): Response
    {
        $administrateurs = $repository -> findAll();
        

   
        return $this->render('administrateur/index.html.twig', [
            'administrateurs' => $administrateurs
         
            
        ]);
    }


   
    #[Route('/delete-administrateur/{id}', name: 'delete_administrateur')]
    public function suppression(Administrateur $administrateurs, Request $request,ObjectManager $objectManager){

        // $id = $request->get('id');
        //dd($this->isCsrfTokenValid("SUP". $request->get('id'),$request->get('_token')));die();
       // if($this->isCsrfTokenValid("SUP". $request->get('id'),$request->get('_token'))){
            $objectManager->remove($administrateurs);
            $objectManager->flush();

            return $this->redirectToRoute("administrateur");
       // }
    }



 
  #[Route('/add-administrateur', name: 'add_administrateur')]

  public function ajout(Administrateur $administrateurs = null, ObjectManager $objectManager,UserPasswordHasherInterface $userPasswordHasher, Request $request)
  {
      
      if(!$administrateurs){

          $administrateurs = new Administrateur();
          
      }
 
      
      $form = $this->createForm(AdministrateurType::class,$administrateurs);

      $form -> handleRequest($request);

      
      $user= new Utilisateur();
  
     
    
    
    if($form->isSubmitted() && $form->isValid()){
       
                        // encode the plain password
                            $administrateurs->getUtilisateur()->setPassword(
                                $userPasswordHasher->hashPassword($user,
                        $form->get('utilisateur')->get('password')->getData()
            )
        );
                        
                    $modif = $administrateurs->getId() !== null;
                    
                    $objectManager->persist($administrateurs);
                    $objectManager->flush();
                    // $this->addFlash("success", ($modif) ? "La modification a été effectuée" : "L'ajout a été effectuée");
                    $this->addFlash('success', 'Article Created! Knowledge is power!');
                    return $this->redirectToRoute("administrateur");
               
               
      
      }

      
      return $this->render('administrateur/ajoutAdministrateur.html.twig', [
         // 'administrateurs' => $administrateurs,
          'form' => $form->createView(),
        //  'isModification' => $administrateurs->getId() !== null
      ]);
    }

    #[Route('/modify-administrateur/{id}', name: 'modification_administrateur', methods:'GET|POST')]
    public function modification(Administrateur $administrateurs = null, ObjectManager $objectManager,UserPasswordHasherInterface $userPasswordHasher, Request $request)
   {
                if(!$administrateurs)
                {
   
                    $administrateurs = new Administrateur();
                    
                }
   
            
            $form = $this->createForm(EditAdministrateurType::class,$administrateurs)->remove("password");
            $form -> handleRequest($request);
            
            $user= new Utilisateur();
   
        //$user->getPassword( $form->get('utilisateur')->get('plainPassword')->getData());
        
        
        
        if($form->isSubmitted() && $form->isValid())
        {
            
                            // encode the plain password
                           
                                 
                        $modif = $administrateurs->getId() !== null;
                        
                        $objectManager->persist($administrateurs);
                        $objectManager->flush();
                        $this->addFlash("success", ($modif) ? "La modification a été effectuée" : "L'ajout a été effectuée");
                        return $this->redirectToRoute("administrateur");
                    
                    
            
            
        }

       
        return $this->render('administrateur/modification.html.twig', [
            'administrateurs' => $administrateurs,
            'form' => $form->createView(),
            'isModification' => $administrateurs->getId() !== null
        ]);
    }
    //consultation profil administrateur 
 #[Route('/conslt-administrateur/{id}', name: 'consultation_administrateur', methods:'GET|POST')]
 public function consultation(AdministrateurRepository $repository,Administrateur $administrateurs): Response
 {
     
     $administrateurs = $repository ->findOneById ($administrateurs->getId());              

     return $this->render('administrateur/consultation.html.twig', [
         'administrateurs' => $administrateurs
      
     ]);
 }


        #[Route('/secure-administrateur/{id}', name: 'secure_administrateur', methods:'GET|POST')]
        public function secure(UserPasswordHasherInterface $userPasswordHasher, ObjectManager $objectManager, Request $request, $id)
        {

            $admin = $this->AdministrateurRepository->findOneById($id);

            $user= $admin->getUtilisateur();
            $form = $this->createForm(SecUtilisateurType::class,$user);
            $form -> handleRequest($request);



            if($form->isSubmitted() && $form->isValid()){


                // encode the plain password
                $user->setPassword(
                    $userPasswordHasher->hashPassword(
                        $user,
                        $form->get('password')->getData()
                    )
                );



                $objectManager->persist($user);
                $objectManager->flush();

                return $this->redirectToRoute("administrateur");


            }



            return $this->render('administrateur/security.html.twig', [
                'utilisateur' => $user,
                'form' => $form->createView()


            ]);

        }
}