<?php

namespace App\Entity;

use App\Repository\ContractionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContractionRepository::class)]
class Contraction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateContraction = null;

    #[ORM\ManyToOne(inversedBy: 'contractions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CarnetSante $carnetSante = null;

    #[ORM\ManyToOne(inversedBy: 'contractions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Maladie $maladie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateContraction(): ?\DateTime
    {
        return $this->dateContraction;
    }

    public function setDateContraction(\DateTime $dateContraction): static
    {
        $this->dateContraction = $dateContraction;
        return $this;
    }

    public function getCarnetSante(): ?CarnetSante
    {
        return $this->carnetSante;
    }

    public function setCarnetSante(?CarnetSante $carnetSante): static
    {
        $this->carnetSante = $carnetSante;
        return $this;
    }

    public function getMaladie(): ?Maladie
    {
        return $this->maladie;
    }

    public function setMaladie(?Maladie $maladie): static
    {
        $this->maladie = $maladie;
        return $this;
    }
}
