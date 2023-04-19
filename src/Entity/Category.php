<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $encadrement = null;

    #[ORM\Column(length: 255)]
    private ?string $aide_conseil = null;

    #[ORM\Column(length: 255)]
    private ?string $education_animation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEncadrement(): ?string
    {
        return $this->encadrement;
    }

    public function setEncadrement(string $encadrement): self
    {
        $this->encadrement = $encadrement;

        return $this;
    }

    public function getAideConseil(): ?string
    {
        return $this->aide_conseil;
    }

    public function setAideConseil(string $aide_conseil): self
    {
        $this->aide_conseil = $aide_conseil;

        return $this;
    }

    public function getEducationAnimation(): ?string
    {
        return $this->education_animation;
    }

    public function setEducationAnimation(string $education_animation): self
    {
        $this->education_animation = $education_animation;

        return $this;
    }
}
