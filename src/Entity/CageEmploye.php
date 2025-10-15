<?php

namespace App\Entity;

use App\Repository\CageEmployeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CageEmployeRepository::class)]
class CageEmploye
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_debut = null;

    #[ORM\ManyToOne(inversedBy: 'cageEmployes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cage $Cage = null;

    #[ORM\ManyToOne(inversedBy: 'cageEmployes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Employe $Employe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTime
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTime $date_debut): static
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getCage(): ?Cage
    {
        return $this->Cage;
    }

    public function setCage(?Cage $Cage): static
    {
        $this->Cage = $Cage;

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
