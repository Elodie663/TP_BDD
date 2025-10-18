<?php
namespace App\DataFixtures;

use App\Entity\VilleResidence;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VilleResidenceFixtures extends Fixture
{
    public const VILLE_MONTPELLIER = 'ville_montpellier';

    public function load(ObjectManager $manager): void
    {
        $ville = new VilleResidence();
        $ville->setNomVille('Montpellier')
              ->setCodePostal('34000')
              ->setPays('France');
        
        $manager->persist($ville);
        $this->addReference(self::VILLE_MONTPELLIER, $ville);
        
        $manager->flush();
        
        echo "1 ville créée !\n";
    }
}