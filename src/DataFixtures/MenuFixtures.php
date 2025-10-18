<?php
namespace App\DataFixtures;

use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MenuFixtures extends Fixture
{
    public const MENU_OMNIVORE = 'menu_omnivore';

    public function load(ObjectManager $manager): void
    {
        // Créer un seul menu pour tous les animaux
        $menu = new Menu();
        $menu->setQuantiteViande('2.50')
             ->setQuantiteLegumes('2.00')
             ->setTypeMenu('Omnivore');
        
        $manager->persist($menu);
        $this->addReference(self::MENU_OMNIVORE, $menu);
        
        $manager->flush();
        
        echo "1 menu omnivore créé !\n";
    }
}