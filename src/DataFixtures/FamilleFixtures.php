<?php
namespace App\DataFixtures;

use App\Entity\Famille;
use APP\Entity\Ordre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FamilleFixtures extends Fixture implements DependentFixtureInterface
{
    public const FAMILLE_FELIN = 'famille_felin';

    public function load(ObjectManager $manager): void
    {
        // Récupérer l'ordre créé précédemment
        $ordre = $this->getReference('ordre_omnivore');
        
        // Créer une seule famille pour tous les animaux
        $famille = new Famille();
        $famille->setNomFamille('Felin')
                ->setOrdre($ordre);
        
        $manager->persist($famille);
        $this->addReference(self::FAMILLE_FELIN, $famille);
        
        $manager->flush();
        
        echo "1 famille Felin créée !\n";
    }
    
    public function getDependencies(): array
    {
        return [
            OrdreFixtures::class,
        ];
    }
}