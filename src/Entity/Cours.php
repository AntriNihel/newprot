<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CoursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
#[ApiResource]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomCours;

    #[ORM\Column(type: 'string', length: 255)]
    private $formatCours;

    #[ORM\Column(type: 'string', length: 255)]
    private $lienCours;

    #[ORM\Column(type: 'string', length: 255)]
    private $dureeVideoCours;

    #[ORM\ManyToOne(targetEntity: TypeCours::class, inversedBy: 'cours')]
    private $typeCours;

    #[ORM\ManyToOne(targetEntity: Chapitres::class, inversedBy: 'cours')]
    private $chapitre;

    #[ORM\ManyToOne(targetEntity: Enseignant::class, inversedBy: 'cours')]
    private $enseignant;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $imageCours;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCours(): ?string
    {
        return $this->nomCours;
    }

    public function setNomCours(string $nomCours): self
    {
        $this->nomCours = $nomCours;

        return $this;
    }

    public function getFormatCours(): ?string
    {
        return $this->formatCours;
    }

    public function setFormatCours(string $formatCours): self
    {
        $this->formatCours = $formatCours;

        return $this;
    }

    public function getLienCours(): ?string
    {
        return $this->lienCours;
    }

    public function setLienCours(string $lienCours): self
    {
        $this->lienCours = $lienCours;

        return $this;
    }

    public function getDureeVideoCours(): ?string
    {
        return $this->dureeVideoCours;
    }

    public function setDureeVideoCours(string $dureeVideoCours): self
    {
        $this->dureeVideoCours = $dureeVideoCours;

        return $this;
    }

    public function getTypeCours(): ?TypeCours
    {
        return $this->typeCours;
    }

    public function setTypeCours(?TypeCours $typeCours): self
    {
        $this->typeCours = $typeCours;

        return $this;
    }

    public function getChapitre(): ?Chapitres
    {
        return $this->chapitre;
    }

    public function setChapitre(?Chapitres $chapitre): self
    {
        $this->chapitre = $chapitre;

        return $this;
    }

    public function getEnseignant(): ?Enseignant
    {
        return $this->enseignant;
    }

    public function setEnseignant(?Enseignant $enseignant): self
    {
        $this->enseignant = $enseignant;

        return $this;
    }

    public function getImageCours(): ?string
    {
        return $this->imageCours;
    }

    public function setImageCours(?string $imageCours): self
    {
        $this->imageCours = $imageCours;

        return $this;
    }
}
