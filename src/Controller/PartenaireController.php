<?php
namespace App\Controller;
use App\Entity\Partenaire;
use App\Entity\Utilisateur;
use App\Form\PartenaireType;
use App\Form\EditPartenaireType;
use App\Form\SecUtilisateurType;
use App\Repository\AgentRepository;
use App\Repository\TypemediaRepository;
use App\Repository\PartenaireRepository;
use Doctrine\Persistence\ObjectManager;
use App\Form\SecurityPartenaireType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
class PartenaireController extends AbstractController
{
    public function __construct(ObjectManager $om,
     PartenaireRepository $PartenaireRepository,
     AgentRepository $AgentRepository,
     TypemediaRepository $TypemediaRepository
    )
   {
      
       $this->om = $om;
       $this->PartenaireRepository = $PartenaireRepository;
       $this->AgentRepository = $AgentRepository;
       $this->TypemediaRepository = $TypemediaRepository;
    
   }
    #[Route('/partenaire', name: 'partenaire')]
    public function index(PartenaireRepository $repository , AgentRepository $AgentRepository ): Response
    {
        $agents = $AgentRepository->findAll();
        $partenaires = $repository -> findAll();
        return $this->render('partenaire/index.html.twig', [
           
            'partenaires' => $partenaires ,
            'agent' => $agents
        ]);
    }
    #[Route('/partenaire/creation', name: 'creation_partenaire')]
    public function ajout_partenaire(Partenaire $partenaire = null, ObjectManager $objectManager, Request $request)
    {
     
        if(!$partenaire){
            $partenaire = new Partenaire();
            
        }
        $om=$this->om;
    
        
        
       
        $form = $this->createForm(PartenaireType::class, $partenaire);
        
        //On recupere le partenaire
        $partenaire = $form->getData();
        
        if($partenaire != null){
        //On recupere les vendeurs liés au Partenaire
        $prtnrs = $this->AgentRepository->findVendeurbyPartenaire($partenaire->getId());
       
        //On ajoute les valeurs selected dans la select list Vendeurs
        $form->get('vendeurs')->setData($prtnrs);
        
        }
        $form -> handleRequest($request);
       
        
           
            if($form->isSubmitted() && $form->isValid()){
            $vendeurs =$form->get('vendeurs')->getData();
            
             //Ajoute la liste des vendeurs (unmapped)
             foreach ($vendeurs as $vendeur){
                $partenaire->addAgent($vendeur);
            }
            $vendeurvalue = $form->get('vendeurs')->getData();
            
            
            //Récupère l'image
            $media = $form->getData()->getMedia();
            if ($media) {
                //Récupère le fichier image
                $mediafile = $form->getData()->getMedia()->getImageFile();
                //Ajouter le nom
                $name = $mediafile->getClientOriginalName();
                //Déplacer le fichier
                $lien = '/media/logos/'.$name;
                $mediafile->move('../public/media/logos', $name);

                //Définit les valeurs
                $media->setNom($name);
                $media->setLien($lien);

                //Ajoute le type du média
                $type = $this->TypemediaRepository->gettype('photo');

                $media->setType($type);



            }
            
            
           
            $objectManager->persist($partenaire);
            $objectManager->flush();
            return $this->redirectToRoute("partenaire");
        }
        
        return $this->render('partenaire/ajoutPartenaire.html.twig', [
            'partenaires' => $partenaire,
            'form' => $form->createView(),
            'isModification' => $partenaire->getId() !== null,
            
        ]);
    }

    #[Route('/partenaire/{id}', name: 'modification_partenaire', methods:'GET|POST')]
    public function modification_partenaire(Partenaire $partenaire = null, ObjectManager $objectManager, Request $request)
    {

        if(!$partenaire){
            $partenaire = new Partenaire();

        }
        $om=$this->om;




        $form = $this->createForm(EditPartenaireType::class, $partenaire)->remove("password");

      

        //On recupere le partenaire
        $partenaire = $form->getData();

        if($partenaire != null){
            //On recupere les vendeurs liés au Partenaire
            $vendeurs= $this->AgentRepository->findVendeurbyPartenaire($partenaire->getId());

            //On ajoute les valeurs selected dans la select list Vendeurs
            $form->get('vendeurs')->setData($vendeurs);

        }
        $form -> handleRequest($request);
        // $vendeurs = $form->getData('vendeurs');
        //($vendeurs);

        // dd($vendeurs);
        if($form->isSubmitted() && $form->isValid()){
            $vendeurs =$form->get('vendeurs')->getData();
            //Ajoute la liste des vendeurs (non mapped)
            //Ajoute la liste des vendeurs (unmapped)
            foreach ($vendeurs as $vendeur){
                $partenaire->addAgent($vendeur);
            }
          /*  $vendeurvalue = $form->get('vendeurs')->getData();
            if($vendeurvalue != null){
                $ven = $this->AgentRepository->fillVendeur($vendeurvalue->getId());
                $form->get('vendeurs')->setData($ven);
            }*/
            
            
           
            //Récupère l'image
            $media = $form->getData()->getMedia();
            
            //Récupère le fichier image
            $mediafile = $form->getData()->getMedia()->getImageFile();
            
            
            if ($mediafile) {
            //Ajouter le nom
            $name = $mediafile->getClientOriginalName();
            //Déplacer le fichier
            $lien = '/media/logos/'.$name;
            $mediafile->move('../public/media/logos', $name);
            
            //Définit les valeurs
            $media->setNom($name);
            $media->setLien($lien);

            //Ajoute le type du média
           
            /* $type = 'photo';*/
            $type = $this->TypemediaRepository->gettype('photo');
           
            $media->setType($type);
}

            $objectManager->persist($partenaire);
            $objectManager->flush();
            return $this->redirectToRoute("partenaire");
        }

        return $this->render('partenaire/modificationPartenaire.html.twig', [
            'partenaire' => $partenaire,
            'form' => $form->createView(),
            'isModification' => $partenaire->getId() !== null,

        ]);
    }

    #[Route('/consulter-partenaire/{id}', name: 'consultation_partenaire', methods:'GET|POST')]
 public function consultation(Partenaire $partenaire): Response
 {
     
    
    $partenaire = $this->PartenaireRepository ->findOneById($partenaire->getId());
    $agents = $this->AgentRepository-> findAgentbyPartnaire($partenaire->getId()); 
   // dd($agents);  
    $vendeurs = $this->AgentRepository-> findVendeurbyPartenaire($partenaire->getId());                  
     return $this->render('partenaire/consultation.html.twig', [
         'partenaire' => $partenaire,
         'vendeurs' => $vendeurs,
         'agents' => $agents
      
     ]);
 }
    
 #[Route('/security-partenaires/{id}', name: 'security_partenaire', methods:'GET|POST')]
 public function secure(Partenaire $partenaire = null,UserPasswordHasherInterface $userPasswordHasher, ObjectManager $objectManager, Request $request, $id)
 {
 
             if(!$partenaire){
                 $partenaire = new Partenaire();
                 
                             }
             $partenaire = $this->PartenaireRepository->findOneById($id);
             $user= $partenaire->getUtilisateur();
        
             $form = $this->createForm(SecUtilisateurType::class,$user);
             $form -> handleRequest($request);
             

         
         
         //dd($form->getData());
         
         if($form->isSubmitted() && $form->isValid()){
            
             
                             // encode the plain password
                            
                                $user->setPassword(
                                    $userPasswordHasher->hashPassword(
                                        $user,
                                        $form->get('password')->getData()
                                    )
                                );
                             
                         
                         
                         $objectManager->persist($partenaire);
                         $objectManager->flush();
                        
                         return $this->redirectToRoute("partenaire");
                     
             
             }
             
            
             
         return $this->render('partenaire/security.html.twig', [
             'utilisateur' => $user,
             'form' => $form->createView()
             
         
         ]);
 
 }
 #[Route('/delete-partenaire/{id}', name: 'delete_partenaire')]
 public function suppression(Partenaire $partenaire, Request $request,ObjectManager $objectManager){
   //  if($this->isCsrfTokenValid("SUP". $partenaire->getId(),$request->get('_token'))){
         $objectManager->remove($partenaire);
         $objectManager->flush();
         return $this->redirectToRoute("partenaire");
   //  }
 }
}