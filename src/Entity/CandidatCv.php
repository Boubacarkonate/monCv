<?php

namespace App\Entity;

use App\Repository\CandidatCvRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatCvRepository::class)]
class CandidatCv
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $imagecv = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImagecv(): ?string
    {
        return $this->imagecv;
    }

    public function setImagecv(string $imagecv): self
    {
        $this->imagecv = $imagecv;

        return $this;
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
}
