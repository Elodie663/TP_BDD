<?php

namespace App\Entity;

use App\Repository\ProvenanceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProvenanceRepository::class)]
class Provenance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_arrivee_pays = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_depart_pays = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $motif_transfert = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateArriveePays(): ?\DateTime
    {
        return $this->date_arrivee_pays;
    }

    public function setDateArriveePays(\DateTime $date_arrivee_pays): static
    {
        $this->date_arrivee_pays = $date_arrivee_pays;

        return $this;
    }

    public function getDateDepartPays(): ?\DateTime
    {
        return $this->date_depart_pays;
    }

    public function setDateDepartPays(\DateTime $date_depart_pays): static
    {
        $this->date_depart_pays = $date_depart_pays;

        return $this;
    }

    public function getMotifTransfert(): ?string
    {
        return $this->motif_transfert;
    }

    public function setMotifTransfert(?string $motif_transfert): static
    {
        $this->motif_transfert = $motif_transfert;

        return $this;
    }
}
