<?php

namespace App\Controller;

use App\Entity\Modeleemail;
use App\Form\ModeleemailType;
use App\Repository\ModeleemailRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/modeleemail')]   
class ModeleemailController extends AbstractController
{
    #[Route('/', name: 'modeleemail_index', methods: ['GET'])]
    public function index(ModeleemailRepository $modeleemailRepository): Response
    {
        return $this->render('modeleemail/index.html.twig', [
            'modeleemails' => $modeleemailRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'modeleemail_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $modeleemail = new Modeleemail();
        $form = $this->createForm(ModeleemailType::class, $modeleemail);
        $form->handleRequest($request);
        $form ->get('user')->setData('agent');   
        $entityManager->persist($modeleemail);

        if ($form->isSubmitted() && $form->isValid()) {
            $form ->get('user')->setData('agent');   
            $entityManager->persist($modeleemail);
            $entityManager->flush();

            return $this->redirectToRoute('modeleemail_index', [], Response::HTTP_SEE_OTHER);
        }
         
        return $this->renderForm('modeleemail/new.html.twig', [
            'modeleemail' => $modeleemail,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'modeleemail_show', methods: ['GET'])]
    public function show(Modeleemail $modeleemail): Response
    {
        return $this->render('modeleemail/show.html.twig', [
            'modeleemail' => $modeleemail,
        ]);
    }

    #[Route('/{id}/edit', name: 'modeleemail_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Modeleemail $modeleemail, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ModeleemailType::class, $modeleemail);
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) {
           
            $entityManager->flush();

            return $this->redirectToRoute('modeleemail_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('modeleemail/edit.html.twig', [
            'modeleemail' => $modeleemail,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'modeleemail_delete', methods: ['POST'])]
    public function delete(Request $request, Modeleemail $modeleemail, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modeleemail->getId(), $request->request->get('_token'))) {
            $entityManager->remove($modeleemail);
            $entityManager->flush();
        }

        return $this->redirectToRoute('modeleemail_index', [], Response::HTTP_SEE_OTHER);
    }
}
