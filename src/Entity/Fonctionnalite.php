<?php

namespace App\Entity;

use App\Repository\FonctionnaliteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FonctionnaliteRepository::class)]
class Fonctionnalite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    /**
     * @var Collection<int, Cage>
     */
    #[ORM\OneToMany(targetEntity: Cage::class, mappedBy: 'fonctionnalite')]
    private Collection $cages;

    public function __construct()
    {
        $this->cages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Cage>
     */
    public function getCages(): Collection
    {
        return $this->cages;
    }

    public function addCage(Cage $cage): static
    {
        if (!$this->cages->contains($cage)) {
            $this->cages->add($cage);
            $cage->setFonctionnalite($this);
        }

        return $this;
    }

    public function removeCage(Cage $cage): static
    {
        if ($this->cages->removeElement($cage)) {
            // set the owning side to null (unless already changed)
            if ($cage->getFonctionnalite() === $this) {
                $cage->setFonctionnalite(null);
            }
        }

        return $this;
    }
}
