<?php
namespace App\DataFixtures;

use App\Entity\Fonctionnalite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FonctionnaliteFixtures extends Fixture
{
    public const FONCTIONNALITE_STANDARD = 'fonctionnalite_standard';

    public function load(ObjectManager $manager): void
    {
        // Créer une seule fonctionnalité pour toutes les cages
        $fonctionnalite = new Fonctionnalite();
        $fonctionnalite->setNom('Enclos standard')
                       ->setDescription('Enclos sécurisé avec abri');
        
        $manager->persist($fonctionnalite);
        $this->addReference(self::FONCTIONNALITE_STANDARD, $fonctionnalite);
        
        $manager->flush();
        
        echo "1 fonctionnalité créée !\n";
    }
}