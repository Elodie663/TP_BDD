<?php

namespace App\Entity;

use App\Repository\VaccinationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VaccinationRepository::class)]
class Vaccination
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_vaccination = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $date_prochaine_vaccination = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateVaccination(): ?\DateTime
    {
        return $this->date_vaccination;
    }

    public function setDateVaccination(\DateTime $date_vaccination): static
    {
        $this->date_vaccination = $date_vaccination;

        return $this;
    }

    public function getDateProchaineVaccination(): ?\DateTime
    {
        return $this->date_prochaine_vaccination;
    }

    public function setDateProchaineVaccination(?\DateTime $date_prochaine_vaccination): static
    {
        $this->date_prochaine_vaccination = $date_prochaine_vaccination;

        return $this;
    }
}
