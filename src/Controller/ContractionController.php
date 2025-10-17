<?php

namespace App\Controller;

use App\Entity\Contraction;
use App\Form\ContractionType;
use App\Repository\ContractionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contraction')]
final class ContractionController extends AbstractController
{
    #[Route(name: 'app_contraction_index', methods: ['GET'])]
    public function index(ContractionRepository $contractionRepository): Response
    {
        return $this->render('contraction/index.html.twig', [
            'contractions' => $contractionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_contraction_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contraction = new Contraction();
        $form = $this->createForm(ContractionType::class, $contraction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contraction);
            $entityManager->flush();

            return $this->redirectToRoute('app_contraction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contraction/new.html.twig', [
            'contraction' => $contraction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contraction_show', methods: ['GET'])]
    public function show(Contraction $contraction): Response
    {
        return $this->render('contraction/show.html.twig', [
            'contraction' => $contraction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_contraction_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contraction $contraction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContractionType::class, $contraction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_contraction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contraction/edit.html.twig', [
            'contraction' => $contraction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contraction_delete', methods: ['POST'])]
    public function delete(Request $request, Contraction $contraction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contraction->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($contraction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_contraction_index', [], Response::HTTP_SEE_OTHER);
    }
}
