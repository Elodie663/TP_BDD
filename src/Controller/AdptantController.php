<?php

namespace App\Controller;

use App\Entity\Adptant;
use App\Form\AdptantType;
use App\Repository\AdptantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/adptant')]
final class AdptantController extends AbstractController
{
    #[Route(name: 'app_adptant_index', methods: ['GET'])]
    public function index(AdptantRepository $adptantRepository): Response
    {
        return $this->render('adptant/index.html.twig', [
            'adptants' => $adptantRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_adptant_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $adptant = new Adptant();
        $form = $this->createForm(AdptantType::class, $adptant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($adptant);
            $entityManager->flush();

            return $this->redirectToRoute('app_adptant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('adptant/new.html.twig', [
            'adptant' => $adptant,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adptant_show', methods: ['GET'])]
    public function show(Adptant $adptant): Response
    {
        return $this->render('adptant/show.html.twig', [
            'adptant' => $adptant,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_adptant_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Adptant $adptant, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AdptantType::class, $adptant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_adptant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('adptant/edit.html.twig', [
            'adptant' => $adptant,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adptant_delete', methods: ['POST'])]
    public function delete(Request $request, Adptant $adptant, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adptant->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($adptant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_adptant_index', [], Response::HTTP_SEE_OTHER);
    }
}
