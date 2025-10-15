<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_employe = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom_employe = null;

    #[ORM\Column(nullable: true)]
    private ?int $age = null;

    #[ORM\Column(length: 1)]
    private ?string $sexe = null;

    #[ORM\Column(length: 50)]
    private ?string $poste = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEmploye(): ?string
    {
        return $this->nom_employe;
    }

    public function setNomEmploye(string $nom_employe): static
    {
        $this->nom_employe = $nom_employe;

        return $this;
    }

    public function getPrenomEmploye(): ?string
    {
        return $this->prenom_employe;
    }

    public function setPrenomEmploye(string $prenom_employe): static
    {
        $this->prenom_employe = $prenom_employe;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): static
    {
        $this->age = $age;

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

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): static
    {
        $this->poste = $poste;

        return $this;
    }
}
