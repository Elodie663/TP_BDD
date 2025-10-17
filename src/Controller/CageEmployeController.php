<?php

namespace App\Controller;

use App\Entity\CageEmploye;
use App\Form\CageEmployeType;
use App\Repository\CageEmployeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/cage/employe')]
final class CageEmployeController extends AbstractController
{
    #[Route(name: 'app_cage_employe_index', methods: ['GET'])]
    public function index(CageEmployeRepository $cageEmployeRepository): Response
    {
        return $this->render('cage_employe/index.html.twig', [
            'cage_employes' => $cageEmployeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cage_employe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cageEmploye = new CageEmploye();
        $form = $this->createForm(CageEmployeType::class, $cageEmploye);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cageEmploye);
            $entityManager->flush();

            return $this->redirectToRoute('app_cage_employe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cage_employe/new.html.twig', [
            'cage_employe' => $cageEmploye,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cage_employe_show', methods: ['GET'])]
    public function show(CageEmploye $cageEmploye): Response
    {
        return $this->render('cage_employe/show.html.twig', [
            'cage_employe' => $cageEmploye,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cage_employe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CageEmploye $cageEmploye, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CageEmployeType::class, $cageEmploye);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cage_employe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cage_employe/edit.html.twig', [
            'cage_employe' => $cageEmploye,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cage_employe_delete', methods: ['POST'])]
    public function delete(Request $request, CageEmploye $cageEmploye, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cageEmploye->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($cageEmploye);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cage_employe_index', [], Response::HTTP_SEE_OTHER);
    }
}
