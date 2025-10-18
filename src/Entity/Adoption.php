<?php

namespace App\Entity;

use App\Repository\AdoptionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdoptionRepository::class)]
class Adoption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_adoption = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2, nullable: true)]
    private ?string $prix_adoption = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $statut = null;

    #[ORM\ManyToOne(inversedBy: 'adoptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adptant $adoptant = null;

    #[ORM\ManyToOne(inversedBy: 'adoptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $animal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAdoption(): ?\DateTime
    {
        return $this->date_adoption;
    }

    public function setDateAdoption(\DateTime $date_adoption): static
    {
        $this->date_adoption = $date_adoption;

        return $this;
    }

    public function getPrixAdoption(): ?string
    {
        return $this->prix_adoption;
    }

    public function setPrixAdoption(?string $prix_adoption): static
    {
        $this->prix_adoption = $prix_adoption;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getAdoptant(): ?Adptant
    {
        return $this->adoptant;
    }

    public function setAdoptant(?Adptant $adoptant): static
    {
        $this->adoptant = $adoptant;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): static
    {
        $this->animal = $animal;

        return $this;
    }
}
