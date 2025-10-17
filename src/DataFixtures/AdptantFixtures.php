<?php

namespace App\DataFixtures;

use App\Entity\Adptant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AdptantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $adptant1 = new Adptant();
        $adptant1->setNomAdoptant('Dupont');
        $adptant1->setPrenomAdoptant('Julie');
        $adptant1->setAdresseAdoptant('12 rue de la Paix, Paris');
        $adptant1->setTelephoneAdoptant('0601020304');
        $adptant1->setGenreAnimalSouhaite('Chien');
        $manager->persist($adptant1);

        $adptant2 = new Adptant();
        $adptant2->setNomAdoptant('Martin');
        $adptant2->setPrenomAdoptant('Sophie');
        $adptant2->setAdresseAdoptant('45 avenue Victor Hugo, Lyon');
        $adptant2->setTelephoneAdoptant('0612345678');
        $adptant2->setGenreAnimalSouhaite('Chat');
        $manager->persist($adptant2);

        $adptant3 = new Adptant();
        $adptant3->setNomAdoptant('Leroy');
        $adptant3->setPrenomAdoptant('Claire');
        $adptant3->setAdresseAdoptant('78 boulevard Saint-Michel, Marseille');
        $adptant3->setTelephoneAdoptant('0698765432');
        $adptant3->setGenreAnimalSouhaite('Lapin');
        $manager->persist($adptant3);

        $manager->flush();
    }
}
