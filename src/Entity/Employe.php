<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_employe = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom_employe = null;

    #[ORM\Column(nullable: true)]
    private ?int $age = null;

    #[ORM\Column(length: 1)]
    private ?string $sexe = null;

    #[ORM\Column(length: 50)]
    private ?string $poste = null;

    #[ORM\ManyToOne(inversedBy: 'employes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?VilleResidence $VilleResidence = null;

    /**
     * @var Collection<int, Allee>
     */
    #[ORM\OneToMany(targetEntity: Allee::class, mappedBy: 'Employe')]
    private Collection $allees;

    /**
     * @var Collection<int, CageEmploye>
     */
    #[ORM\OneToMany(targetEntity: CageEmploye::class, mappedBy: 'Employe')]
    private Collection $cageEmployes;

    public function __construct()
    {
        $this->allees = new ArrayCollection();
        $this->cageEmployes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEmploye(): ?string
    {
        return $this->nom_employe;
    }

    public function setNomEmploye(string $nom_employe): static
    {
        $this->nom_employe = $nom_employe;

        return $this;
    }

    public function getPrenomEmploye(): ?string
    {
        return $this->prenom_employe;
    }

    public function setPrenomEmploye(string $prenom_employe): static
    {
        $this->prenom_employe = $prenom_employe;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): static
    {
        $this->age = $age;

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

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): static
    {
        $this->poste = $poste;

        return $this;
    }

    public function getVilleResidence(): ?VilleResidence
    {
        return $this->VilleResidence;
    }

    public function setVilleResidence(?VilleResidence $VilleResidence): static
    {
        $this->VilleResidence = $VilleResidence;

        return $this;
    }

    /**
     * @return Collection<int, Allee>
     */
    public function getAllees(): Collection
    {
        return $this->allees;
    }

    public function addAllee(Allee $allee): static
    {
        if (!$this->allees->contains($allee)) {
            $this->allees->add($allee);
            $allee->setEmploye($this);
        }

        return $this;
    }

    public function removeAllee(Allee $allee): static
    {
        if ($this->allees->removeElement($allee)) {
            // set the owning side to null (unless already changed)
            if ($allee->getEmploye() === $this) {
                $allee->setEmploye(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CageEmploye>
     */
    public function getCageEmployes(): Collection
    {
        return $this->cageEmployes;
    }

    public function addCageEmploye(CageEmploye $cageEmploye): static
    {
        if (!$this->cageEmployes->contains($cageEmploye)) {
            $this->cageEmployes->add($cageEmploye);
            $cageEmploye->setEmploye($this);
        }

        return $this;
    }

    public function removeCageEmploye(CageEmploye $cageEmploye): static
    {
        if ($this->cageEmployes->removeElement($cageEmploye)) {
            // set the owning side to null (unless already changed)
            if ($cageEmploye->getEmploye() === $this) {
                $cageEmploye->setEmploye(null);
            }
        }

        return $this;
    }
}
