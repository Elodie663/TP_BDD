<?php

namespace App\Entity;

use App\Repository\CageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Animal;
use App\Entity\CageEmploye;
use App\Entity\Fonctionnalite;
use App\Entity\Allee;

#[ORM\Entity(repositoryClass: CageRepository::class)]
class Cage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $numero_cage = null;

    #[ORM\ManyToOne(inversedBy: 'cages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fonctionnalite $fonctionnalite = null;

    #[ORM\ManyToOne(inversedBy: 'cages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Allee $allee = null;

    /**
     * @var Collection<int, CageEmploye>
     */
    #[ORM\OneToMany(targetEntity: CageEmploye::class, mappedBy: 'cage')]
    private Collection $cageEmployes;

    /**
     * @var Collection<int, Animal>
     */
    #[ORM\OneToMany(targetEntity: Animal::class, mappedBy: 'cage')]
    private Collection $animals;

    public function __construct()
    {
        $this->cageEmployes = new ArrayCollection();
        $this->animals = new ArrayCollection();
    }

    // Getters & setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCage(): ?string
    {
        return $this->numero_cage;
    }

    public function setNumeroCage(string $numero_cage): static
    {
        $this->numero_cage = $numero_cage;
        return $this;
    }

    public function getFonctionnalite(): ?Fonctionnalite
    {
        return $this->fonctionnalite;
    }

    public function setFonctionnalite(?Fonctionnalite $fonctionnalite): static
    {
        $this->fonctionnalite = $fonctionnalite;
        return $this;
    }

    public function getAllee(): ?Allee
    {
        return $this->allee;
    }

    public function setAllee(?Allee $allee): static
    {
        $this->allee = $allee;
        return $this;
    }

    // CageEmployes
    public function getCageEmployes(): Collection
    {
        return $this->cageEmployes;
    }

    public function addCageEmploye(CageEmploye $cageEmploye): static
    {
        if (!$this->cageEmployes->contains($cageEmploye)) {
            $this->cageEmployes->add($cageEmploye);
            $cageEmploye->setCage($this);
        }
        return $this;
    }

    public function removeCageEmploye(CageEmploye $cageEmploye): static
    {
        if ($this->cageEmployes->removeElement($cageEmploye)) {
            if ($cageEmploye->getCage() === $this) {
                $cageEmploye->setCage(null);
            }
        }
        return $this;
    }

    // Animals
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal): static
    {
        if (!$this->animals->contains($animal)) {
            $this->animals->add($animal);
            $animal->setCage($this);
        }
        return $this;
    }

    public function removeAnimal(Animal $animal): static
    {
        if ($this->animals->removeElement($animal)) {
            if ($animal->getCage() === $this) {
                $animal->setCage(null);
            }
        }
        return $this;
    }
}
