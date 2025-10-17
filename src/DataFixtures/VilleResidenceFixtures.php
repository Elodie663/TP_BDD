<?php

namespace App\DataFixtures;

use App\Entity\VilleResidence;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VilleResidenceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $ville1 = new VilleResidence();
        $ville1->setNomVille("Paris");
        $ville1->setCodePostal("75001");
        $ville1->setPays("France");
        $manager->persist($ville1);

        $ville2 = new VilleResidence();
        $ville2->setNomVille("Lyon");
        $ville2->setCodePostal("69001");
        $ville2->setPays("France");
        $manager->persist($ville2);

        $ville3 = new VilleResidence();
        $ville3->setNomVille("Marseille");
        $ville3->setCodePostal("13001");
        $ville3->setPays("France");
        $manager->persist($ville3);

        $ville4 = new VilleResidence();
        $ville4->setNomVille("Toulouse");
        $ville4->setCodePostal("31000");
        $ville4->setPays("France");
        $manager->persist($ville4);

        $ville5 = new VilleResidence();
        $ville5->setNomVille("Nice");
        $ville5->setCodePostal("06000");
        $ville5->setPays("France");
        $manager->persist($ville5);

        $manager->flush();
    }
}
