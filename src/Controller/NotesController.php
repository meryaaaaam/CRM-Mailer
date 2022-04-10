<?php

namespace App\Controller;

use App\Entity\Notes;
use App\Form\NotesType;
use App\Repository\LeadsRepository;
use App\Repository\NotesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/notes')]
class NotesController extends AbstractController
{
    #[Route('/new', name: 'test', methods: ['GET'])]
    public function index(NotesRepository $notesRepository,Request $request,NotesRepository $notes,LeadsRepository $leadsRepository): Response
    { 
        $question_id = $request->query->get('id');
        $result= $notes->findNotesByLead($question_id );
      //  dd($result);die();

        return $this->render('notes/index.html.twig', [
            'notes' => $result,
            'leads' => $leadsRepository->findAll(),
        ]);
    }

    #[Route('/notess/{idlead}', name: 'notes_index', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager,NotesRepository $notes,LeadsRepository $leadsRepository): Response
    {
        $question_id = $request->query->get('idlead');
       $data= $request->getPathInfo();

       $res= explode('/',$data,4);
     
        $param=$res[3];
       $paranfinal= intval($param);
       // dd($paranfinal);die;
       // dd($question_id);die;
        $result= $notes->findNotesByLead($paranfinal );
        $note = new Notes();
        $form = $this->createForm(NotesType::class, $note);
        $onelead=$leadsRepository->findOneById($paranfinal);
       // dd($onelead);die;
       //$request->get('lead')->setId(2); 
    
        $form->get('lead')->setData($onelead);  
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($note);
            $entityManager->flush();
           
            $uri = $request->getUri();
          
            

          
            return $this->redirectToRoute('notes_index',array('idlead' => $paranfinal));
        }

        return $this->renderForm('notes/index.html.twig', [
            'note' => $note,
            'form' => $form,
            'notes' => $result,
            'lead' => $leadsRepository->findAll(),
            'question_id' => $paranfinal,
        ]);
    }

    #[Route('/{id}', name: 'notes_show', methods: ['GET'])]
    public function show(Notes $note): Response
    {
        return $this->render('notes/show.html.twig', [
            'note' => $note,
        ]);
    }

    #[Route('/{id}/edit', name: 'notes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Notes $note, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NotesType::class, $note);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('notes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('notes/edit.html.twig', [
            'note' => $note,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/{idlead}', name: 'notes_delete', methods: ['GET', 'POST'])]
    public function delete(Request $request, Notes $note, EntityManagerInterface $entityManager): Response
    {
        $idlead = $request->get('idlead');
            $entityManager->remove($note);
            $entityManager->flush();
        
          
            return $this->redirectToRoute('notes_index',array('idlead' => $idlead));
    }

}
