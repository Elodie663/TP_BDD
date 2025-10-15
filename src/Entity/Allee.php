<?php

namespace App\Entity;

use App\Repository\AlleeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlleeRepository::class)]
class Allee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $numero_allee = null;

    #[ORM\ManyToOne(inversedBy: 'allees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Employe $Employe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroAllee(): ?string
    {
        return $this->numero_allee;
    }

    public function setNumeroAllee(string $numero_allee): static
    {
        $this->numero_allee = $numero_allee;

        return $this;
    }

    public function getEmploye(): ?Employe
    {
        return $this->Employe;
    }

    public function setEmploye(?Employe $Employe): static
    {
        $this->Employe = $Employe;

        return $this;
    }
}
