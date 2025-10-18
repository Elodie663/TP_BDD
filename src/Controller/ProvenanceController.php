<?php

namespace App\Controller;

use App\Entity\Provenance;
use App\Form\ProvenanceType;
use App\Repository\ProvenanceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/provenance')]
final class ProvenanceController extends AbstractController
{
    #[Route(name: 'app_provenance_index', methods: ['GET'])]
    public function index(ProvenanceRepository $provenanceRepository): Response
    {
        return $this->render('provenance/index.html.twig', [
            'provenances' => $provenanceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_provenance_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $provenance = new Provenance();
        $form = $this->createForm(ProvenanceType::class, $provenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($provenance);
            $entityManager->flush();

            return $this->redirectToRoute('app_provenance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('provenance/new.html.twig', [
            'provenance' => $provenance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_provenance_show', methods: ['GET'])]
    public function show(Provenance $provenance): Response
    {
        return $this->render('provenance/show.html.twig', [
            'provenance' => $provenance,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_provenance_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Provenance $provenance, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProvenanceType::class, $provenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_provenance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('provenance/edit.html.twig', [
            'provenance' => $provenance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_provenance_delete', methods: ['POST'])]
    public function delete(Request $request, Provenance $provenance, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$provenance->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($provenance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_provenance_index', [], Response::HTTP_SEE_OTHER);
    }
}
