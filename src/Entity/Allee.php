<?php

namespace App\Entity;

use App\Repository\AlleeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?Employe $employe = null;

    /**
     * @var Collection<int, Cage>
     */
    #[ORM\OneToMany(targetEntity: Cage::class, mappedBy: 'allee')]
    private Collection $cages;

    public function __construct()
    {
        $this->cages = new ArrayCollection();
    }


    /**
     * @var Collection<int, Cage>
     */
    #[ORM\OneToMany(targetEntity: Cage::class, mappedBy: 'allee')]
    private Collection $cages;

    public function __construct()
    {
        $this->cages = new ArrayCollection();
    }


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
        return $this->employe;
    }

    public function setEmploye(?Employe $employe): static
    {
        $this->Employe = $employe;
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
            $cage->setAllee($this);
        }

        return $this;
    }

    public function removeCage(Cage $cage): static
    {
        if ($this->cages->removeElement($cage)) {
            // set the owning side to null (unless already changed)
            if ($cage->getAllee() === $this) {
                $cage->setAllee(null);
            }
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
            $cage->setAllee($this);
        }

        return $this;
    }

    public function removeCage(Cage $cage): static
    {
        if ($this->cages->removeElement($cage)) {
            // set the owning side to null (unless already changed)
            if ($cage->getAllee() === $this) {
                $cage->setAllee(null);
            }
        }


        return $this;
    }
}
