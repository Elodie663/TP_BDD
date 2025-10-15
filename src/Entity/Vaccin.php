<?php

namespace App\Entity;

use App\Repository\VaccinRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VaccinRepository::class)]
class Vaccin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nom_vaccin = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $type_vaccin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomVaccin(): ?string
    {
        return $this->nom_vaccin;
    }

    public function setNomVaccin(string $nom_vaccin): static
    {
        $this->nom_vaccin = $nom_vaccin;

        return $this;
    }

    public function getTypeVaccin(): ?string
    {
        return $this->type_vaccin;
    }

    public function setTypeVaccin(string $type_vaccin): static
    {
        $this->type_vaccin = $type_vaccin;

        return $this;
    }
}
