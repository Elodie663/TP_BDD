<?php

namespace App\Entity;

use App\Repository\CarnetSanteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarnetSanteRepository::class)]
class CarnetSante
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_creation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observations_generales = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreation(): ?\DateTime
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTime $date_creation): static
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getObservationsGenerales(): ?string
    {
        return $this->observations_generales;
    }

    public function setObservationsGenerales(?string $observations_generales): static
    {
        $this->observations_generales = $observations_generales;

        return $this;
    }
}
