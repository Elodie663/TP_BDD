<?php
namespace App\DataFixtures;

use App\Entity\Adoption;
use App\Entity\Adptant;
use App\Entity\Animal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AdoptionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Adoption 1
        /** @var Animal $animal1 */
        $animal1 = $this->getReference(AnimalFixtures::ANIMAL_1, Animal::class);
        /** @var Adptant $adptant1 */
        $adptant1 = $this->getReference(AdptantFixtures::ADPTANT_1, Adptant::class);
        
        $adoption1 = new Adoption();
        $adoption1->setDateAdoption(new \DateTime('16/10/2025'))
                  ->setPrixAdoption('150')
                  ->setStatut('Confirmée')
                  ->setAnimal($animal1)
                  ->setAdoptant($adptant1);
        $manager->persist($adoption1);
        
        // Adoption 2
        /** @var Animal $animal2 */
        $animal2 = $this->getReference(AnimalFixtures::ANIMAL_2);
        /** @var Adptant $adptant2 */
        $adptant2 = $this->getReference(AdptantFixtures::ADPTANT_2);
        
        $adoption2 = new Adoption();
        $adoption2->setDateAdoption(new \DateTime('15/10/2025'))
                  ->setPrixAdoption('200')
                  ->setStatut('Confirmée')
                  ->setAnimal($animal2)
                  ->setAdoptant($adptant2);
        $manager->persist($adoption2);
        
        // Adoption 3
        /** @var Animal $animal3 */
        $animal3 = $this->getReference(AnimalFixtures::ANIMAL_3);
        /** @var Adptant $adptant3 */
        $adptant3 = $this->getReference(AdptantFixtures::ADPTANT_3);
        
        $adoption3 = new Adoption();
        $adoption3->setDateAdoption(new \DateTime('10/10/2025'))
                  ->setPrixAdoption('180')
                  ->setStatut('En cours')
                  ->setAnimal($animal3)
                  ->setAdoptant($adptant3);
        $manager->persist($adoption3);
        
        $manager->flush();
        
        echo "3 adoptions créées !\n";
    }
    
    public function getDependencies(): array
    {
        return [
            AnimalFixtures::class,
            AdptantFixtures::class,
        ];
    }
}