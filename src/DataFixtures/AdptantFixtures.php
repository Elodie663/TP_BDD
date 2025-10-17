<?php
namespace App\DataFixtures;

use App\Entity\Adptant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AdptantFixtures extends Fixture
{
    public const ADPTANT_1 = 'adptant_1';
    public const ADPTANT_2 = 'adptant_2';
    public const ADPTANT_3 = 'adptant_3';
    public const ADPTANT_4 = 'adptant_4';
    public const ADPTANT_5 = 'adptant_5';

    public function load(ObjectManager $manager): void
    {
        // Adoptant 1
        $adptant1 = new Adptant();
        $adptant1->setNomAdoptant('Molieres')
                 ->setPrenomAdoptant('Elodie')
                 ->setAdresseAdoptant('12 rue des Fleurs, 75001 Paris')
                 ->setTelephoneAdoptant('0612345678')
                 ->setGenreAnimalSouhaite('Chien');
        $manager->persist($adptant1);
        $this->addReference(self::ADPTANT_1, $adptant1);
        
        // Adoptant 2
        $adptant2 = new Adptant();
        $adptant2->setNomAdoptant('Dijoux')
                 ->setPrenomAdoptant('Chloe')
                 ->setAdresseAdoptant('123 rue des Jonquilles, 34000 Montpellier')
                 ->setTelephoneAdoptant('0612345678')
                 ->setGenreAnimalSouhaite('Chat');
        $manager->persist($adptant2);
        $this->addReference(self::ADPTANT_2, $adptant2);
        
        // Adoptant 3
        $adptant3 = new Adptant();
        $adptant3->setNomAdoptant('Bali')
                 ->setPrenomAdoptant('Eszter')
                  ->setAdresseAdoptant('25 avenue de la Liberté, 69000 Lyon')
                 ->setTelephoneAdoptant('0623456789')
                 ->setGenreAnimalSouhaite('Chien');
        $manager->persist($adptant3);
        $this->addReference(self::ADPTANT_3, $adptant3);
        
        // Adoptant 4
        $adptant4 = new Adptant();
        $adptant4->setNomAdoptant('Carrere')
                 ->setPrenomAdoptant('Damien')
                 ->setAdresseAdoptant('8 place du Marché, 33000 Bordeaux')
                 ->setTelephoneAdoptant('0634567890')
                 ->setGenreAnimalSouhaite('Lapin');
        $manager->persist($adptant4);
        $this->addReference(self::ADPTANT_4, $adptant4);
        
        // Adoptant 5
        $adptant5 = new Adptant();
        $adptant5->setNomAdoptant('Muller')
                 ->setPrenomAdoptant('Valentin')
                ->setAdresseAdoptant('18 rue Pasteur, 59000 Lille')
                 ->setTelephoneAdoptant('0656789012')
                 ->setGenreAnimalSouhaite('Chien');
        $manager->persist($adptant5);
        $this->addReference(self::ADPTANT_5, $adptant5);
        
        $manager->flush();
        
    }
}