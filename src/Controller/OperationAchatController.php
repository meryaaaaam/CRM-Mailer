<?php

namespace App\Controller;

use App\Entity\OperationAchat;
use App\Form\OperationAchatType;
use App\Repository\OperationAchatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/operation/achat')]
class OperationAchatController extends AbstractController
{
    #[Route('/', name: 'operation_achat_index', methods: ['GET'])]
    public function index(OperationAchatRepository $operationAchatRepository): Response
    {
        return $this->render('operation_achat/index.html.twig', [
            'operation_achats' => $operationAchatRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'operation_achat_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $operationAchat = new OperationAchat();
        $form = $this->createForm(OperationAchatType::class, $operationAchat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($operationAchat);
            $entityManager->flush();

            return $this->redirectToRoute('operation_achat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('operation_achat/new.html.twig', [
            'operation_achat' => $operationAchat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'operation_achat_show', methods: ['GET'])]
    public function show(OperationAchat $operationAchat): Response
    {
        return $this->render('operation_achat/show.html.twig', [
            'operation_achat' => $operationAchat,
        ]);
    }

    #[Route('/{id}/edit', name: 'operation_achat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OperationAchat $operationAchat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OperationAchatType::class, $operationAchat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('operation_achat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('operation_achat/edit.html.twig', [
            'operation_achat' => $operationAchat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'operation_achat_delete', methods: ['POST'])]
    public function delete(Request $request, OperationAchat $operationAchat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$operationAchat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($operationAchat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('operation_achat_index', [], Response::HTTP_SEE_OTHER);
    }
}
