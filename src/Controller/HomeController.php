<?php

namespace App\Controller;

use App\Repository\AnimalRepository;
use App\Repository\AdoptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
 AnimalRepository $animalRepository,
 AdoptionRepository $adoptionRepository

    ): Response
//récupérer tous les animaux adoptables
{
$animaux = $animalRepository->findBy(['adoptable' => true]);

    {
        return $this->render('home/index.html.twig', [
            // 'controller_name' => 'HomeController',
            'animaux' => $animaux
        ]);
    }
}
}