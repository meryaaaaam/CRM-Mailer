<?php

namespace App\Controller;

use App\Entity\Modelesms;
use App\Form\ModelesmsType;
use App\Repository\ModelesmsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/modelesms')]
class ModelesmsController extends AbstractController
{
    #[Route('/', name: 'modelesms_index', methods: ['GET'])]
    public function index(ModelesmsRepository $modelesmsRepository): Response
    {
        return $this->render('modelesms/index.html.twig', [
            'modelesms' => $modelesmsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'modelesms_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $modelesm = new Modelesms();
        $form = $this->createForm(ModelesmsType::class, $modelesm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($modelesm);
            $entityManager->flush();

            return $this->redirectToRoute('modelesms_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('modelesms/new.html.twig', [
            'modelesm' => $modelesm,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'modelesms_show', methods: ['GET'])]
    public function show(Modelesms $modelesm): Response
    {
        return $this->render('modelesms/show.html.twig', [
            'modelesm' => $modelesm,
        ]);
    }

    #[Route('/{id}/edit', name: 'modelesms_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Modelesms $modelesm, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ModelesmsType::class, $modelesm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('modelesms_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('modelesms/edit.html.twig', [
            'modelesm' => $modelesm,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'modelesms_delete', methods: ['POST'])]
    public function delete(Request $request, Modelesms $modelesm, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modelesm->getId(), $request->request->get('_token'))) {
            $entityManager->remove($modelesm);
            $entityManager->flush();
        }

        return $this->redirectToRoute('modelesms_index', [], Response::HTTP_SEE_OTHER);
    }
}
