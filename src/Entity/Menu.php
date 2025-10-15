<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $quantite_viande = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $quantite_legumes = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $type_menu = null;

    /**
     * @var Collection<int, Animal>
     */
    #[ORM\OneToMany(targetEntity: Animal::class, mappedBy: 'menu')]
    private Collection $animals;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantiteViande(): ?string
    {
        return $this->quantite_viande;
    }

    public function setQuantiteViande(string $quantite_viande): static
    {
        $this->quantite_viande = $quantite_viande;

        return $this;
    }

    public function getQuantiteLegumes(): ?string
    {
        return $this->quantite_legumes;
    }

    public function setQuantiteLegumes(string $quantite_legumes): static
    {
        $this->quantite_legumes = $quantite_legumes;

        return $this;
    }

    public function getTypeMenu(): ?string
    {
        return $this->type_menu;
    }

    public function setTypeMenu(string $type_menu): static
    {
        $this->type_menu = $type_menu;

        return $this;
    }

    /**
     * @return Collection<int, Animal>
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal): static
    {
        if (!$this->animals->contains($animal)) {
            $this->animals->add($animal);
            $animal->setMenu($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): static
    {
        if ($this->animals->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getMenu() === $this) {
                $animal->setMenu(null);
            }
        }

        return $this;
    }
}
