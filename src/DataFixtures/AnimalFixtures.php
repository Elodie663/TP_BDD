<?php
namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Cage;
use App\Entity\CarnetSante;
use App\Entity\Famille;
use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AnimalFixtures extends Fixture implements DependentFixtureInterface
{
    public const ANIMAL_1 = 'animal_1';
    public const ANIMAL_2 = 'animal_2';
    public const ANIMAL_3 = 'animal_3';
    public const ANIMAL_4 = 'animal_4';
    public const ANIMAL_5 = 'animal_5';
    public const ANIMAL_6 = 'animal_6';
    public function load(ObjectManager $manager): void
    {
        // Récupérer les références
        /** @var Famille $famille */
        $famille = $this->getReference(FamilleFixtures::FAMILLE_FELIN, Famille::class);
        
        /** @var Menu $menu */
        $menu = $this->getReference(MenuFixtures::MENU_OMNIVORE, Menu::class);
        
        /** @var Cage $cage */
        $cage = $this->getReference(CageFixtures::CAGE_1, Cage::class);
        
        /** @var CarnetSante $carnetSante */
        $carnetSante = $this->getReference(CarnetSanteFixtures::CARNET_SANTE, CarnetSante::class);
        
        // Animal 1 - Adoptable
        $animal1 = new Animal();
        $animal1->setNomAnimal('Simba')
                ->setRace('Chat')
                ->setSexe('M')
                ->setDateNaissance(new \DateTime('20/01/2020'))
                ->setDateArrivee(new \DateTime('16/10/2025'))
                ->setDomestiqueSauvage('domestique')
                ->setAdoptable(true)
                ->setFamille($famille)
                ->setMenu($menu)
                ->setCage($cage)
                ->setCarnetDeSante($carnetSante);
        $manager->persist($animal1);
        $this->addReference(self::ANIMAL_1, $animal1);
        
        // Animal 2 - NON Adoptable
        $animal2 = new Animal();
        $animal2->setNomAnimal('Nala')
                ->setRace('Lionne')
                ->setSexe('F')
                ->setDateNaissance(new \DateTime('01/01/2015'))
                ->setDateArrivee(new \DateTime('01/10/2025'))
                ->setDomestiqueSauvage('Sauvage')
                ->setAdoptable(false)
                ->setFamille($famille)
                ->setMenu($menu)
                ->setCage($cage)
                ->setCarnetDeSante($carnetSante);
        $manager->persist($animal2);
        $this->addReference(self::ANIMAL_2, $animal2);
        
        // Animal 3 - Adoptable
        $animal3 = new Animal();
        $animal3->setNomAnimal('Rex')
                ->setRace('Chien')
                ->setSexe('M')
                ->setDateNaissance(new \DateTime('15/05/2022'))
                ->setDateArrivee(new \DateTime('01/09/2025'))
                ->setDomestiqueSauvage('domestique')
                ->setAdoptable(true)
                ->setFamille($famille)
                ->setMenu($menu)
                ->setCage($cage)
                ->setCarnetDeSante($carnetSante);
        $manager->persist($animal3);
        $this->addReference(self::ANIMAL_3, $animal3);
        
        // Animal 4 - Adoptable
        $animal4 = new Animal();
        $animal4->setNomAnimal('Luna')
                ->setRace('Chat')
                ->setSexe('F')
                ->setDateNaissance(new \DateTime('24/11/2023'))
                ->setDateArrivee(new \DateTime('15/09/2025'))
                ->setDomestiqueSauvage('Sauvage')
                ->setAdoptable(true)
                ->setFamille($famille)
                ->setMenu($menu)
                ->setCage($cage)
                ->setCarnetDeSante($carnetSante);
        $manager->persist($animal4);
        $this->addReference(self::ANIMAL_4, $animal4);
        
        // Animal 5 - Adoptable
        $animal5 = new Animal();
        $animal5->setNomAnimal('Max')
                ->setRace('Lapin')
                ->setSexe('M')
                ->setDateNaissance(new \DateTime('22/08/2024'))
                ->setDateArrivee(new \DateTime('15/09/2025'))
                ->setDomestiqueSauvage('domestique')
                ->setAdoptable(true)
                ->setFamille($famille)
                ->setMenu($menu)
                ->setCage($cage)
                ->setCarnetDeSante($carnetSante);
        $manager->persist($animal5);
        $this->addReference(self::ANIMAL_5, $animal5);



 // Animal 6 - Adoptable
                $animal6 = new Animal();
        $animal6->setNomAnimal('Truc')
                ->setRace('Chat')
                ->setSexe('M')
                ->setDateNaissance(new \DateTime('27/08/2024'))
                ->setDateArrivee(new \DateTime('15/09/2025'))
                ->setDomestiqueSauvage('domestique')
                ->setAdoptable(true)
                ->setFamille($famille)
                ->setMenu($menu)
                ->setCage($cage)
                ->setCarnetDeSante($carnetSante);
        $manager->persist($animal5);
        $this->addReference(self::ANIMAL_6, $animal6);
        
        $manager->flush();
        
        echo "6 animaux créés !\n";
    }
    
    public function getDependencies(): array
    {
        return [
            FamilleFixtures::class,
            MenuFixtures::class,
            CageFixtures::class,
            CarnetSanteFixtures::class,
        ];
    }
}