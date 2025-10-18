<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nom_classe = null;

    #[ORM\OneToOne(mappedBy: 'classe', cascade: ['persist', 'remove'])]
    private ?Ordre $ordre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomClasse(): ?string
    {
        return $this->nom_classe;
    }

    public function setNomClasse(string $nom_classe): static
    {
        $this->nom_classe = $nom_classe;
        return $this;
    }

    public function getOrdre(): ?Ordre
    {
        return $this->ordre;
    }

    public function setOrdre(Ordre $ordre): static
    {
        if ($ordre->getClasse() !== $this) {
            $ordre->setClasse($this);
        }
        $this->ordre = $ordre;
        return $this;
    }
}
