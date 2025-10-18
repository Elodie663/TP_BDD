<?php

namespace App\Controller;

use App\Entity\VilleResidence;
use App\Form\VilleResidenceType;
use App\Repository\VilleResidenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ville/residence')]
final class VilleResidenceController extends AbstractController
{
    #[Route(name: 'app_ville_residence_index', methods: ['GET'])]
    public function index(VilleResidenceRepository $villeResidenceRepository): Response
    {
        return $this->render('ville_residence/index.html.twig', [
            'ville_residences' => $villeResidenceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ville_residence_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $villeResidence = new VilleResidence();
        $form = $this->createForm(VilleResidenceType::class, $villeResidence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($villeResidence);
            $entityManager->flush();

            return $this->redirectToRoute('app_ville_residence_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ville_residence/new.html.twig', [
            'ville_residence' => $villeResidence,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ville_residence_show', methods: ['GET'])]
    public function show(VilleResidence $villeResidence): Response
    {
        return $this->render('ville_residence/show.html.twig', [
            'ville_residence' => $villeResidence,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ville_residence_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, VilleResidence $villeResidence, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VilleResidenceType::class, $villeResidence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ville_residence_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ville_residence/edit.html.twig', [
            'ville_residence' => $villeResidence,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ville_residence_delete', methods: ['POST'])]
    public function delete(Request $request, VilleResidence $villeResidence, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$villeResidence->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($villeResidence);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ville_residence_index', [], Response::HTTP_SEE_OTHER);
    }
}
