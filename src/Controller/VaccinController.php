<?php

namespace App\Controller;

use App\Entity\Vaccin;
use App\Form\VaccinType;
use App\Repository\VaccinRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/vaccin')]
final class VaccinController extends AbstractController
{
    #[Route(name: 'app_vaccin_index', methods: ['GET'])]
    public function index(VaccinRepository $vaccinRepository): Response
    {
        return $this->render('vaccin/index.html.twig', [
            'vaccins' => $vaccinRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_vaccin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $vaccin = new Vaccin();
        $form = $this->createForm(VaccinType::class, $vaccin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($vaccin);
            $entityManager->flush();

            return $this->redirectToRoute('app_vaccin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('vaccin/new.html.twig', [
            'vaccin' => $vaccin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vaccin_show', methods: ['GET'])]
    public function show(Vaccin $vaccin): Response
    {
        return $this->render('vaccin/show.html.twig', [
            'vaccin' => $vaccin,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_vaccin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Vaccin $vaccin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VaccinType::class, $vaccin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_vaccin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('vaccin/edit.html.twig', [
            'vaccin' => $vaccin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vaccin_delete', methods: ['POST'])]
    public function delete(Request $request, Vaccin $vaccin, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vaccin->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($vaccin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_vaccin_index', [], Response::HTTP_SEE_OTHER);
    }
}
