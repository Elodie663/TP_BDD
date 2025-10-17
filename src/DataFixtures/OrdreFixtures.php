<?php
namespace App\DataFixtures;

use App\Entity\Classe;
use App\Entity\Ordre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OrdreFixtures extends Fixture implements DependentFixtureInterface
{
    public const ORDRE_OMNIVORE = 'ordre_omnivore';

    public function load(ObjectManager $manager): void
    {
        // Récupérer la classe créée précédemment
        echo "DÉBUT OrdreFixtures\n"; 

$classe = $this->getReference(ClasseFixtures::CLASSE_MAMMIFERE);
        echo "Classe récupérée\n";
        // Créer un seul ordre pour tous les animaux
        $ordre = new Ordre();
        $ordre->setNom('Omnivore')
              ->setClasse($classe);
        
echo "Ordre créé\n"; 



        $manager->persist($ordre);
        $this->addReference(self::ORDRE_OMNIVORE, $ordre);
        
            echo "Référence ajoutée: " . self::ORDRE_OMNIVORE . "\n";
        $manager->flush();
        
        echo "1 ordre créé (Carnivora) !\n";
    }
    
    public function getDependencies(): array
    {
        return [
            ClasseFixtures::class,
        ];
    }
}