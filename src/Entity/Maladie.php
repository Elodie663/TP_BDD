<?php

namespace App\Entity;

use App\Repository\MaladieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaladieRepository::class)]
class Maladie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nom_maladie = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $type_maladie = null;

    #[ORM\Column]
    private ?bool $contagiosite = null;

    /**
     * @var Collection<int, Contraction>
     */
    #[ORM\OneToMany(targetEntity: Contraction::class, mappedBy: 'Maladie')]
    private Collection $contractions;

    public function __construct()
    {
        $this->contractions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMaladie(): ?string
    {
        return $this->nom_maladie;
    }

    public function setNomMaladie(string $nom_maladie): static
    {
        $this->nom_maladie = $nom_maladie;

        return $this;
    }

    public function getTypeMaladie(): ?string
    {
        return $this->type_maladie;
    }

    public function setTypeMaladie(string $type_maladie): static
    {
        $this->type_maladie = $type_maladie;

        return $this;
    }

    public function isContagiosite(): ?bool
    {
        return $this->contagiosite;
    }

    public function setContagiosite(bool $contagiosite): static
    {
        $this->contagiosite = $contagiosite;

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
            $contraction->setMaladie($this);
        }

        return $this;
    }

    public function removeContraction(Contraction $contraction): static
    {
        if ($this->contractions->removeElement($contraction)) {
            // set the owning side to null (unless already changed)
            if ($contraction->getMaladie() === $this) {
                $contraction->setMaladie(null);
            }
        }

        return $this;
    }
}
