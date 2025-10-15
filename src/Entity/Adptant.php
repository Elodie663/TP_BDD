<?php

namespace App\Entity;

use App\Repository\AdptantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdptantRepository::class)]
class Adptant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nom_adoptant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $prenom_adoptant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $adresse_adoptant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $telephone_adoptant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $genre_animal_souhaite = null;

    /**
     * @var Collection<int, Adoption>
     */
    #[ORM\OneToMany(targetEntity: Adoption::class, mappedBy: 'adoptant')]
    private Collection $adoptions;

    public function __construct()
    {
        $this->adoptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAdoptant(): ?string
    {
        return $this->nom_adoptant;
    }

    public function setNomAdoptant(string $nom_adoptant): static
    {
        $this->nom_adoptant = $nom_adoptant;

        return $this;
    }

    public function getPrenomAdoptant(): ?string
    {
        return $this->prenom_adoptant;
    }

    public function setPrenomAdoptant(string $prenom_adoptant): static
    {
        $this->prenom_adoptant = $prenom_adoptant;

        return $this;
    }

    public function getAdresseAdoptant(): ?string
    {
        return $this->adresse_adoptant;
    }

    public function setAdresseAdoptant(string $adresse_adoptant): static
    {
        $this->adresse_adoptant = $adresse_adoptant;

        return $this;
    }

    public function getTelephoneAdoptant(): ?string
    {
        return $this->telephone_adoptant;
    }

    public function setTelephoneAdoptant(string $telephone_adoptant): static
    {
        $this->telephone_adoptant = $telephone_adoptant;

        return $this;
    }

    public function getGenreAnimalSouhaite(): ?string
    {
        return $this->genre_animal_souhaite;
    }

    public function setGenreAnimalSouhaite(string $genre_animal_souhaite): static
    {
        $this->genre_animal_souhaite = $genre_animal_souhaite;

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
            $adoption->setAdoptant($this);
        }

        return $this;
    }

    public function removeAdoption(Adoption $adoption): static
    {
        if ($this->adoptions->removeElement($adoption)) {
            // set the owning side to null (unless already changed)
            if ($adoption->getAdoptant() === $this) {
                $adoption->setAdoptant(null);
            }
        }

        return $this;
    }
}
