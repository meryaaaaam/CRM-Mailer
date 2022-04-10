<?php

namespace App\Controller;

use App\Entity\FilesLead;
use App\Form\FilesLeadType;
use App\Repository\FilesLeadRepository;
use App\Repository\LeadsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/files/lead')]
class FilesLeadController extends AbstractController
{
    #[Route('/', name: 'files_lead_index', methods: ['GET'])]
    public function index(FilesLeadRepository $filesLeadRepository): Response
    {
        return $this->render('files_lead/index.html.twig', [
            'files_leads' => $filesLeadRepository->findAll(),
        ]);
    }



    #[Route('/filess/{idlead}', name: 'files_index', methods: ['GET', 'POST'])]
    public function listfiles(Request $request, EntityManagerInterface $entityManager,FilesleadRepository $files,LeadsRepository $leadsRepository): Response
    {
        $question_id = $request->query->get('idlead');
       $data= $request->getPathInfo();
       //dd($data);die;
       $res= explode('/',$data,5);
     
        $param=$res[4];
       $paranfinal= intval($param);
       // dd($paranfinal);die;
       // dd($question_id);die;
        $result= $files->findNotesByLead($paranfinal );
        $fille = new Fileslead();
        $form = $this->createForm(FilesLeadType::class, $fille);
       
        //dd($files);die();

      

    

        $onelead=$leadsRepository->findOneById($paranfinal);
       // dd($onelead);die;
       //$request->get('lead')->setId(2); 
       $form->get('lead')->setData($onelead);

        
        $form->handleRequest($request);
      
        $files = $request->files;
       // dd($files);die;

   
      
        if ($form->isSubmitted() ) {
         //   dd('helo');die;
         
           
          
          //  $media = $form->getData()->getNom();
          //  dd($media);die;
       
          $fdataile = $form['nom']->getData();
          $name = $fdataile->getClientOriginalName();

          $lien = '/media/files/'.$name;

            


          //dd($lien);die;
        

       
       //  $form->get('nom')->setData($name);
         //$form->get('lien')->setData($lien);
       

         $fille->setNom($name);
         $fille->setLien($lien);





        

        $entityManager->persist($fille);
        $entityManager->flush();

         
            return $this->redirectToRoute('files_index',array('idlead' => $paranfinal));
        }
       // $form->get('lead')->setData($onelead); 

        return $this->renderForm('files_lead/index.html.twig', [
            'file' => $fille,
            'form' => $form,
            'files' => $result,
            'lead' => $leadsRepository->findAll(),
            'question_id' => $paranfinal,
        ]);
    
    }

    #[Route('/new', name: 'files_lead_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $filesLead = new FilesLead();
        $form = $this->createForm(FilesLeadType::class, $filesLead);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($filesLead);
            $entityManager->flush();

            return $this->redirectToRoute('files_lead_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('files_lead/new.html.twig', [
            'files_lead' => $filesLead,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'files_lead_show', methods: ['GET'])]
    public function show(FilesLead $filesLead): Response
    {
        return $this->render('files_lead/show.html.twig', [
            'files_lead' => $filesLead,
        ]);
    }

    #[Route('/{id}/edit', name: 'files_lead_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FilesLead $filesLead, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FilesLeadType::class, $filesLead);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('files_lead_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('files_lead/edit.html.twig', [
            'files_lead' => $filesLead,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/{idlead}', name: 'files_lead_delete', methods: ['GET', 'POST'])]
    public function delete(Request $request, FilesLead $filesLead, EntityManagerInterface $entityManager): Response
    {
        $idlead = $request->get('idlead');
        //($id);die;
            $entityManager->remove($filesLead);
            $entityManager->flush();
        

        return $this->redirectToRoute('files_index',array('idlead' => $idlead));
    }
}
