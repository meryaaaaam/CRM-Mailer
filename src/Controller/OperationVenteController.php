<?php

namespace App\Controller;

use App\Entity\OperationVente;
use App\Form\OperationVenteType;
use App\Repository\OperationVenteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/operation/vente')]
class OperationVenteController extends AbstractController
{
    #[Route('/', name: 'operation_vente_index', methods: ['GET'])]
    public function index(OperationVenteRepository $operationVenteRepository): Response
    {
        return $this->render('operation_vente/index.html.twig', [
            'operation_ventes' => $operationVenteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'operation_vente_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $operationVente = new OperationVente();
        $form = $this->createForm(OperationVenteType::class, $operationVente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($operationVente);
            $entityManager->flush();

            return $this->redirectToRoute('operation_vente_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('operation_vente/new.html.twig', [
            'operation_vente' => $operationVente,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'operation_vente_show', methods: ['GET'])]
    public function show(OperationVente $operationVente): Response
    {
        return $this->render('operation_vente/show.html.twig', [
            'operation_vente' => $operationVente,
        ]);
    }

    #[Route('/{id}/edit', name: 'operation_vente_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OperationVente $operationVente, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OperationVenteType::class, $operationVente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('operation_vente_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('operation_vente/edit.html.twig', [
            'operation_vente' => $operationVente,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'operation_vente_delete', methods: ['POST'])]
    public function delete(Request $request, OperationVente $operationVente, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$operationVente->getId(), $request->request->get('_token'))) {
            $entityManager->remove($operationVente);
            $entityManager->flush();
        }

        return $this->redirectToRoute('operation_vente_index', [], Response::HTTP_SEE_OTHER);
    }
}
