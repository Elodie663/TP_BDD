<?php
namespace App\DataFixtures;

use App\Entity\Employe;
use App\Entity\VilleResidence;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EmployeFixtures extends Fixture implements DependentFixtureInterface
{
    public const EMPLOYE_SOIGNEUR = 'employe_soigneur';

    public function load(ObjectManager $manager): void
    {
        /** @var VilleResidence $ville */
        $ville = $this->getReference(VilleResidenceFixtures::VILLE_MONTPELLIER, VilleResidence::class);
        
        $employe = new Employe();
        $employe->setNomEmploye('Dupont')
                ->setPrenomEmploye('Jean')
                ->setAge(35)
                ->setSexe('M')
                ->setPoste('Soigneur')
                ->setVilleResidence($ville);
        
        $manager->persist($employe);
        $this->addReference(self::EMPLOYE_SOIGNEUR, $employe);
        
        $manager->flush();
        
        echo "1 employé créé !\n";
    }
    
    public function getDependencies(): array
    {
        return [
            VilleResidenceFixtures::class,
        ];
    }
}