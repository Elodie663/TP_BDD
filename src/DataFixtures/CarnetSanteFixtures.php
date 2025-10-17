<?php
namespace App\DataFixtures;

use App\Entity\CarnetSante;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarnetSanteFixtures extends Fixture
{
    public const CARNET_SANTE = 'carnet_sante';

    public function load(ObjectManager $manager): void
    {
        $carnet = new CarnetSante();
        $carnet->setDateCreation(new \DateTime())
               ->setObservationsGenerales('RAS');
        
        $manager->persist($carnet);
        $this->addReference(self::CARNET_SANTE, $carnet);
        
        $manager->flush();
        
        echo " 1 carnet de santé créé !\n";
    }
}