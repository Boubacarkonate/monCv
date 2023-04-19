<?php

namespace App\Entity;

use App\Repository\FormuleRecruteurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormuleRecruteurRepository::class)]
class FormuleRecruteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $forfait = null;

    #[ORM\Column]
    private ?int $nombre_annonce = null;

    #[ORM\Column(nullable: true)]
    private ?int $nombre_cv = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $prix = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getForfait(): ?string
    {
        return $this->forfait;
    }

    public function setForfait(string $forfait): self
    {
        $this->forfait = $forfait;

        return $this;
    }

    public function getNombreAnnonce(): ?int
    {
        return $this->nombre_annonce;
    }

    public function setNombreAnnonce(int $nombre_annonce): self
    {
        $this->nombre_annonce = $nombre_annonce;

        return $this;
    }

    public function getNombreCv(): ?int
    {
        return $this->nombre_cv;
    }

    public function setNombreCv(?int $nombre_cv): self
    {
        $this->nombre_cv = $nombre_cv;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}
