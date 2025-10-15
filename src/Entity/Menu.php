<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $quantite_viande = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $quantite_legumes = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $type_menu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantiteViande(): ?string
    {
        return $this->quantite_viande;
    }

    public function setQuantiteViande(string $quantite_viande): static
    {
        $this->quantite_viande = $quantite_viande;

        return $this;
    }

    public function getQuantiteLegumes(): ?string
    {
        return $this->quantite_legumes;
    }

    public function setQuantiteLegumes(string $quantite_legumes): static
    {
        $this->quantite_legumes = $quantite_legumes;

        return $this;
    }

    public function getTypeMenu(): ?string
    {
        return $this->type_menu;
    }

    public function setTypeMenu(string $type_menu): static
    {
        $this->type_menu = $type_menu;

        return $this;
    }
}
