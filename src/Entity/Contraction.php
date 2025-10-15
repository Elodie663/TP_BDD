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
    private ?\DateTime $date_contraction = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateContraction(): ?\DateTime
    {
        return $this->date_contraction;
    }

    public function setDateContraction(\DateTime $date_contraction): static
    {
        $this->date_contraction = $date_contraction;

        return $this;
    }
}
