<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Famille;


#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom_animal = null;

    #[ORM\Column(length: 50)]
    private ?string $race = null;

    #[ORM\Column(length: 1)]
    private ?string $sexe = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $date_naissance = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_arrivee = null;

    #[ORM\Column(length: 100)]
    private ?string $domestique_sauvage = null;

    #[ORM\Column]
    private ?bool $adoptable = null;

    /**
     * @var Collection<int, Provenance>
     */
    #[ORM\OneToMany(targetEntity: Provenance::class, mappedBy: 'animal')]
    private Collection $provenances;

    /**
     * @var Collection<int, Adoption>
     */
    #[ORM\OneToMany(targetEntity: Adoption::class, mappedBy: 'animal')]
    private Collection $adoptions;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Famille $famille = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CarnetSante $carnetDeSante = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Menu $menu = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cage $cage = null;

    public function __construct()
    {
        $this->provenances = new ArrayCollection();
        $this->adoptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAnimal(): ?string
    {
        return $this->nom_animal;
    }

    public function setNomAnimal(string $nom_animal): static
    {
        $this->nom_animal = $nom_animal;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): static
    {
        $this->race = $race;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateNaissance(): ?\DateTime
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(?\DateTime $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getDateArrivee(): ?\DateTime
    {
        return $this->date_arrivee;
    }

    public function setDateArrivee(\DateTime $date_arrivee): static
    {
        $this->date_arrivee = $date_arrivee;

        return $this;
    }

    public function getDomestiqueSauvage(): ?string
    {
        return $this->domestique_sauvage;
    }

    public function setDomestiqueSauvage(string $domestique_sauvage): static
    {
        $this->domestique_sauvage = $domestique_sauvage;

        return $this;
    }

    public function isAdoptable(): ?bool
    {
        return $this->adoptable;
    }

    public function setAdoptable(bool $adoptable): static
    {
        $this->adoptable = $adoptable;

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
            $provenance->setAnimal($this);
        }

        return $this;
    }

    public function removeProvenance(Provenance $provenance): static
    {
        if ($this->provenances->removeElement($provenance)) {
            // set the owning side to null (unless already changed)
            if ($provenance->getAnimal() === $this) {
                $provenance->setAnimal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Adoption>
     */
    public function getAdoptions(): Collection
    {
        return $this->adoptions;
    }

    public function addAdoption(Adoption $adoption): static
    {
        if (!$this->adoptions->contains($adoption)) {
            $this->adoptions->add($adoption);
            $adoption->setAnimal($this);
        }

        return $this;
    }

    public function removeAdoption(Adoption $adoption): static
    {
        if ($this->adoptions->removeElement($adoption)) {
            // set the owning side to null (unless already changed)
            if ($adoption->getAnimal() === $this) {
                $adoption->setAnimal(null);
            }
        }

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): static
    {
        $this->famille = $famille;

        return $this;
    }

    public function getCarnetDeSante(): ?CarnetSante
    {
        return $this->carnetDeSante;
    }

    public function setCarnetDeSante(?CarnetSante $carnetDeSante): static
    {
        $this->carnetDeSante = $carnetDeSante;

        return $this;
    }

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): static
    {
        $this->menu = $menu;

        return $this;
    }

    public function getCage(): ?Cage
    {
        return $this->cage;
    }

    public function setCage(?Cage $cage): static
    {
        $this->cage = $cage;

        return $this;
    }
}
