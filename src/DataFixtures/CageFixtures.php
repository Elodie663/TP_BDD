<?php
namespace App\DataFixtures;

use App\Entity\Allee;
use App\Entity\Cage;
use App\Entity\Fonctionnalite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CageFixtures extends Fixture implements DependentFixtureInterface
{
    public const CAGE_1 = 'cage_1';

    public function load(ObjectManager $manager): void
    {
        /** @var Fonctionnalite $fonctionnalite */
        $fonctionnalite = $this->getReference(FonctionnaliteFixtures::FONCTIONNALITE_STANDARD, Fonctionnalite::class);
        
        /** @var Allee $allee */
        $allee = $this->getReference(AlleeFixtures::ALLEE_A, Allee::class);
        
        $cage = new Cage();
        $cage->setNumeroCage('Cage 1')
             ->setFonctionnalite($fonctionnalite)
             ->setAllee($allee);
        
        $manager->persist($cage);
        $this->addReference(self::CAGE_1, $cage);
        
        $manager->flush();
        
        echo "1 cage créée !\n";
    }
    
    public function getDependencies(): array
    {
        return [
            FonctionnaliteFixtures::class,
            AlleeFixtures::class,
        ];
    }
}