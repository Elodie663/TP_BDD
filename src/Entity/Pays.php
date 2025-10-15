<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaysRepository::class)]
class Pays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_pays = null;

    #[ORM\Column(length: 100)]
    private ?string $continent = null;

    /**
     * @var Collection<int, Provenance>
     */
    #[ORM\OneToMany(targetEntity: Provenance::class, mappedBy: 'pays')]
    private Collection $provenances;

    public function __construct()
    {
        $this->provenances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPays(): ?string
    {
        return $this->nom_pays;
    }

    public function setNomPays(string $nom_pays): static
    {
        $this->nom_pays = $nom_pays;

        return $this;
    }

    public function getContinent(): ?string
    {
        return $this->continent;
    }

    public function setContinent(string $continent): static
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * @return Collection<int, Provenance>
     */
    public function getProvenances(): Collection
    {
        return $this->provenances;
    }

    public function addProvenance(Provenance $provenance): static
    {
        if (!$this->provenances->contains($provenance)) {
            $this->provenances->add($provenance);
            $provenance->setPays($this);
        }

        return $this;
    }

    public function removeProvenance(Provenance $provenance): static
    {
        if ($this->provenances->removeElement($provenance)) {
            // set the owning side to null (unless already changed)
            if ($provenance->getPays() === $this) {
                $provenance->setPays(null);
            }
        }

        return $this;
    }
}
