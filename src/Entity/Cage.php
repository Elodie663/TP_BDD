<?php

namespace App\Entity;

use App\Repository\CageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

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
}
