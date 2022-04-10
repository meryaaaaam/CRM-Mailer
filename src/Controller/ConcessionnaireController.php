<?php

namespace App\Controller;

use App\Entity\Concessionnaire;
use App\Entity\Concessionnairemarchand;
use App\Entity\Medias;
use App\Entity\Utilisateur;
use App\Form\ConcessionnairemarchandType;
use App\Form\ConcessionnaireType;
use App\Form\EditConcessionnairemarchandType;
use App\Form\EditConcessionnaireType;
use App\Form\SecConcessionnaireMarchandType;
use App\Form\SecConcessionnaireType;
use App\Form\SecUtilisateurType;
use App\Repository\AgentRepository;
use App\Repository\ConcessionnaireRepository;
use App\Repository\ConcessionnairemarchandRepository;
use App\Repository\FabriquantRepository;
use App\Repository\MediasRepository;
use App\Repository\TypemediaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Exception;

class ConcessionnaireController extends AbstractController
{
    private MediasRepository $MR;
    private FabriquantRepository $fabriquantRepository;
    private EntityManagerInterface $objectManager;
    

    public function __construct(MediasRepository $MR,
     FabriquantRepository $fabriquantRepository, 
     AgentRepository $agentRepository,
     ConcessionnaireRepository $concessionnaireRepository,

     ObjectManager $om
     )
    {
        $this->MR = $MR;
        $this->om = $om;
        //ici on instancie le repo
        $this->fabriquantRepository = $fabriquantRepository;
        $this->AgentRepository = $agentRepository;
        $this->ConcessionnaireRepository = $concessionnaireRepository;

        
    }

    #[Route('/concessionnaire', name: 'concessionnaire')]
    public function index(ConcessionnaireRepository $repository): Response
    {
        $concessionnaires = $repository -> findAll();
       
       
        return $this->render('concessionnaire/index.html.twig', [
            'concessionnaires' => $concessionnaires
        ]);
    }


    #[Route('/concessionnaire/{id}', name: 'suppression_concessionnaire', methods:'delete')]
    public function suppression(Concessionnaire $concessionnaires, Request $request){

       $om=$this->om;
       // if($this->isCsrfTokenValid("SUP". $concessionnaires->getId(),$request->get('_token'))){
            $om->remove($concessionnaires);
            $om->flush();
            return $this->redirectToRoute("concessionnaire");
        
      //  }
   
 
    }


    #[Route('/concessionnaire_modification/{id}', name: 'modification_concessionnaire', methods:'GET|POST')]
    public function ajout_modification( Concessionnaire $concessionnaires = null, TypemediaRepository $repository, Request $request)
    {

     
        if(!$concessionnaires){

            $concessionnaires = new Concessionnaire();
            
        }
        $om=$this->om;

       


        $medias = new Medias();

       

        $cr = $this->MR->findAll();
        //$medias->Concessionnairemarchand::class->getfabriquants()->setMedia($cr);

        //Ici on va creeer un tableau pour les liens des logos des fabricants
        $lienLogo = [];

        //On recupere tous les Fabs depuis le repo instancié dans le __construct()
        $fabs = $this->fabriquantRepository->findAll();

        //On crée une boucle sur tous les fabs
        foreach($fabs as $fab){
            //Pour chaque fab on recupere l'id et le liens du logo
            //Puis on l'enregistre dans le tableau
            //L'id ce met en KEY et le lien en VALUE

            $lienLogo[$fab->getId()] = $fab->getMedia()->getLien();
        }

        
        $form = $this->createForm(EditConcessionnaireType::class, $concessionnaires)->remove("password");
       
        
         

        //On recupere le concessmarchand
        $concessvalue = $form->get('concessionnairemarchand')->getData();

        if($concessvalue != null){
        //On recupere les vendeurs liés au concessionnaire
        $vdrs = $this->AgentRepository->fillVendeursbyConcessionnairemarchand($concessvalue->getId());

       
        //On ajoute les valeurs selected dans la select list Vendeurs
        $form->get('concessionnairemarchand')->get('vendeurs')->setData($vdrs);
        
        }

        
        $form -> handleRequest($request);

       
       

      
        if($form->isSubmitted() && $form->isValid()){

            $vendeurs =$form->get('concessionnairemarchand')->get('vendeurs')->getData();
           
            //Ajoute la liste des vendeurs (unmapped)
            foreach ($vendeurs as $vendeur){
                $concessionnaires->getConcessionnairemarchand()->addAgent($vendeur);
            }
            
            
            //Récupère l'image
            $media = $form->getData()->getConcessionnairemarchand()->getMedia();
           
           
            //Récupère le fichier image
            $mediafile = $form->getData()->getConcessionnairemarchand()->getMedia()->getImageFile();
            //Ajouter le nom
            if ($mediafile) {
            $name = $mediafile->getClientOriginalName();
            //Déplacer le fichier
            $lien = '/media/logos/'.$name;
            $mediafile->move('../public/media/logos', $name);
            
            //Définit les valeurs
            $media->setNom($name);
            $media->setLien($lien);
            }
            //Ajoute le type du média
           
            $type = $repository->gettype('photo');
           
            $media->setType($type);

           $this->om->persist($concessionnaires);
            $om->flush();
            return $this->redirectToRoute("concessionnaire");
          
        }
          
        
        return $this->render('concessionnaire/modificationConcessionnaire.html.twig', [
            'concessionnaire' => $concessionnaires,
            'medias'=>$medias,
            'form' => $form->createView(),
            'isModification' => $concessionnaires->getId() !== null,
            // On passe le tableau cree plus haut en param
            'listeLogo'=>$lienLogo

           
        ]);
    }

    #[Route('/concessionnaire/add-concessionnaire', name: 'add_concessionnaire')]
    public function add_concessionnaire(Concessionnaire $concessionnaires = null, TypemediaRepository $repository, UserPasswordHasherInterface $userPasswordHasher, ObjectManager $objectManager, Request $request)
    {

        
        if(!$concessionnaires){

            $concessionnaires = new Concessionnaire();

        }
        $om=$this->om;


        //$medias = new Medias();



        $cr = $this->MR->findAll();
        //$medias->Concessionnairemarchand::class->getfabriquants()->setMedia($cr);

        //Ici on va creeer un tableau pour les liens des logos des fabricants
        $lienLogo = [];

        //On recupere tous les Fabs depuis le repo instancié dans le __construct()
        $fabs = $this->fabriquantRepository->findAll();

        //On crée une boucle sur tous les fabs
        foreach($fabs as $fab){
            //Pour chaque fab on recupere l'id et le liens du logo
            //Puis on l'enregistre dans le tableau
            //L'id ce met en KEY et le lien en VALUE

            $lienLogo[$fab->getId()] = $fab->getMedia()->getLien();
        }


        $form = $this->createForm(ConcessionnaireType::class, $concessionnaires);




        $form -> handleRequest($request);





        if($form->isSubmitted() && $form->isValid()){

            $vendeurs =$form->get('concessionnairemarchand')->get('vendeurs')->getData();

            //Ajoute la liste des vendeurs (unmapped)
            foreach ($vendeurs as $vendeur){
                $concessionnaires->getConcessionnairemarchand()->addAgent($vendeur);
            }


            
            $media = $form->get('concessionnairemarchand')->getData()->getMedia();
           
            if ($media) {
                //Récupère le fichier image
                $mediafile = $form->get('concessionnairemarchand')->getData()->getMedia()->getImageFile();
               
                //Ajouter le nom
                $name = $mediafile->getClientOriginalName();
               
                //Déplacer le fichier
                $lien = '/media/logos/'.$name;
                
                $mediafile->move('../public/media/logos', $name);
               
                //Définit les valeurs
                $media->setNom($name);
                $media->setLien($lien);




                //Ajoute le type du média
            $type = $repository->gettype('photo');
             
            $media->setType($type);
            }
           
            ////////

           
            



            $this->om->persist($concessionnaires);
           
            $om->flush();
       
            return $this->redirectToRoute("concessionnaire");
        }

        return $this->render('concessionnaire/ajoutConcessionnaire.html.twig', [
            'concessionnaire' => $concessionnaires,
           // 'medias'=>$medias,
            'form' => $form->createView(),
            'isModification' => $concessionnaires->getId() !== null,
            // On passe le tableau cree plus haut en param
            'listeLogo'=>$lienLogo


        ]);
    }

    #[Route('/consulter-concessionnaire/{id}', name: 'consultation_concessionnaire', methods:'GET|POST')]
    public function consultation(Concessionnaire $concessionnaire): Response
    {
        $concessionnaire = $this->ConcessionnaireRepository->findOneById($concessionnaire->getId());
       
        $concessionnairemarchand = $concessionnaire->getConcessionnairemarchand();
       
        
        $agents = $this->AgentRepository-> fillAgentsbyConcessionnairemarchand($concessionnairemarchand->getId());
        
        $vendeurs = $this->AgentRepository-> fillVendeursbyConcessionnairemarchand($concessionnairemarchand->getId());
        
         
         // dd($vendeurs);
        
        return $this->render('concessionnaire/consultation.html.twig', [
            'concessionnaire' => $concessionnaire,
            'vendeurs' => $vendeurs,
            'agents' => $agents

        ]);
    }

    #[Route('/security-concessionnaire/{id}', name: 'security_concessionnaire', methods:'GET|POST')]
    public function secure(UserPasswordHasherInterface $userPasswordHasher, ObjectManager $objectManager, Request $request, $id)
    {


        $concess = $this->ConcessionnaireRepository->findOneById($id);

        $user= $concess->getConcessionnairemarchand()->getUtilisateur();
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

            return $this->redirectToRoute("concessionnaire");


        }



        return $this->render('concessionnaire/securityConcessionnaire.html.twig', [
            'utilisateur' => $user,
            'concessessionnaire' => $concess,
            'form' => $form->createView()


        ]);

    }
}
 
 