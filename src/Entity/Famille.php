<?php

namespace App\Entity;

use App\Repository\FamilleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FamilleRepository::class)]
class Famille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nom_famille = null;

    #[ORM\OneToOne(inversedBy: 'famille', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ordre $Ordre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFamille(): ?string
    {
        return $this->nom_famille;
    }

    public function setNomFamille(string $nom_famille): static
    {
        $this->nom_famille = $nom_famille;

        return $this;
    }

    public function getOrdre(): ?Ordre
    {
        return $this->Ordre;
    }

    public function setOrdre(Ordre $Ordre): static
    {
        $this->Ordre = $Ordre;

        return $this;
    }
}
