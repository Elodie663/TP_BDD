<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom_animal = null;

    #[ORM\Column(length: 50)]
    private ?string $race = null;

    #[ORM\Column(length: 1)]
    private ?string $sexe = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $date_naissance = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_arrivee = null;

    #[ORM\Column(length: 100)]
    private ?string $domestique_sauvage = null;

    #[ORM\Column]
    private ?bool $adoptable = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAnimal(): ?string
    {
        return $this->nom_animal;
    }

    public function setNomAnimal(string $nom_animal): static
    {
        $this->nom_animal = $nom_animal;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): static
    {
        $this->race = $race;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateNaissance(): ?\DateTime
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(?\DateTime $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getDateArrivee(): ?\DateTime
    {
        return $this->date_arrivee;
    }

    public function setDateArrivee(\DateTime $date_arrivee): static
    {
        $this->date_arrivee = $date_arrivee;

        return $this;
    }

    public function getDomestiqueSauvage(): ?string
    {
        return $this->domestique_sauvage;
    }

    public function setDomestiqueSauvage(string $domestique_sauvage): static
    {
        $this->domestique_sauvage = $domestique_sauvage;

        return $this;
    }

    public function isAdoptable(): ?bool
    {
        return $this->adoptable;
    }

    public function setAdoptable(bool $adoptable): static
    {
        $this->adoptable = $adoptable;

        return $this;
    }
}
