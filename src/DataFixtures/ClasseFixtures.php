<?php
namespace App\DataFixtures;

use App\Entity\Classe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClasseFixtures extends Fixture
{
    public const CLASSE_MAMMIFERE = 'classe_mammifere';

    public function load(ObjectManager $manager): void
    {
        // Créer une seule classe pour tous les animaux
        $classe = new Classe();
        $classe->setNomClasse('Mammifère');
        
        $manager->persist($classe);
        $this->addReference(self::CLASSE_MAMMIFERE, $classe);
        
        $manager->flush();
        
        echo "une classe créée : mammifère !\n";
    }
}