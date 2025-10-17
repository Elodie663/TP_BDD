<?php
namespace App\DataFixtures;

use App\Entity\Allee;
use App\Entity\Employe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AlleeFixtures extends Fixture implements DependentFixtureInterface
{
    public const ALLEE_A = 'allee_a';

    public function load(ObjectManager $manager): void
    {
        /** @var Employe $employe */
        $employe = $this->getReference(EmployeFixtures::EMPLOYE_SOIGNEUR, Employe::class);
        
        $allee = new Allee();
        $allee->setNumeroAllee('Allée A')
              ->setEmploye($employe);
        
        $manager->persist($allee);
        $this->addReference(self::ALLEE_A, $allee);
        
        $manager->flush();
        
        echo "1 allée créée !\n";
    }
    
    public function getDependencies(): array
    {
        return [
            EmployeFixtures::class,
        ];
    }
}