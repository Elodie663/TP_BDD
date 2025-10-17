<?php

namespace App\Controller;

use App\Entity\Fonctionnalite;
use App\Form\FonctionnaliteType;
use App\Repository\FonctionnaliteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/fonctionnalite')]
final class FonctionnaliteController extends AbstractController
{
    #[Route(name: 'app_fonctionnalite_index', methods: ['GET'])]
    public function index(FonctionnaliteRepository $fonctionnaliteRepository): Response
    {
        return $this->render('fonctionnalite/index.html.twig', [
            'fonctionnalites' => $fonctionnaliteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_fonctionnalite_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fonctionnalite = new Fonctionnalite();
        $form = $this->createForm(FonctionnaliteType::class, $fonctionnalite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fonctionnalite);
            $entityManager->flush();

            return $this->redirectToRoute('app_fonctionnalite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fonctionnalite/new.html.twig', [
            'fonctionnalite' => $fonctionnalite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fonctionnalite_show', methods: ['GET'])]
    public function show(Fonctionnalite $fonctionnalite): Response
    {
        return $this->render('fonctionnalite/show.html.twig', [
            'fonctionnalite' => $fonctionnalite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_fonctionnalite_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fonctionnalite $fonctionnalite, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FonctionnaliteType::class, $fonctionnalite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_fonctionnalite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fonctionnalite/edit.html.twig', [
            'fonctionnalite' => $fonctionnalite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fonctionnalite_delete', methods: ['POST'])]
    public function delete(Request $request, Fonctionnalite $fonctionnalite, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fonctionnalite->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($fonctionnalite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_fonctionnalite_index', [], Response::HTTP_SEE_OTHER);
    }
}
