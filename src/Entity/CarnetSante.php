<?php

namespace App\Entity;

use App\Repository\CarnetSanteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Vaccination>
     */
    #[ORM\OneToMany(targetEntity: Vaccination::class, mappedBy: 'carnetDeSante')]
    private Collection $vaccinations;

    /**
     * @var Collection<int, Contraction>
     */
    #[ORM\OneToMany(targetEntity: Contraction::class, mappedBy: 'CarnetSante')]
    private Collection $contractions;

    public function __construct()
    {
        $this->vaccinations = new ArrayCollection();
        $this->contractions = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Vaccination>
     */
    public function getVaccinations(): Collection
    {
        return $this->vaccinations;
    }

    public function addVaccination(Vaccination $vaccination): static
    {
        if (!$this->vaccinations->contains($vaccination)) {
            $this->vaccinations->add($vaccination);
            $vaccination->setCarnetDeSante($this);
        }

        return $this;
    }

    public function removeVaccination(Vaccination $vaccination): static
    {
        if ($this->vaccinations->removeElement($vaccination)) {
            // set the owning side to null (unless already changed)
            if ($vaccination->getCarnetDeSante() === $this) {
                $vaccination->setCarnetDeSante(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Contraction>
     */
    public function getContractions(): Collection
    {
        return $this->contractions;
    }

    public function addContraction(Contraction $contraction): static
    {
        if (!$this->contractions->contains($contraction)) {
            $this->contractions->add($contraction);
            $contraction->setCarnetSante($this);
        }

        return $this;
    }

    public function removeContraction(Contraction $contraction): static
    {
        if ($this->contractions->removeElement($contraction)) {
            // set the owning side to null (unless already changed)
            if ($contraction->getCarnetSante() === $this) {
                $contraction->setCarnetSante(null);
            }
        }

        return $this;
    }
}
