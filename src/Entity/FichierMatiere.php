<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FichierMatiereRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FichierMatiereRepository::class)]
#[ApiResource]
class FichierMatiere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomFichierMatiere;

    #[ORM\Column(type: 'string', length: 255)]
    private $descriptionFichier;

    #[ORM\Column(type: 'string', length: 255)]
    private $formatFichier;

    #[ORM\Column(type: 'string', length: 255)]
    private $lienFichier;

    #[ORM\ManyToOne(targetEntity: TypeFichierMatiere::class, inversedBy: 'fichierMatieres')]
    private $typeFichier;

    #[ORM\ManyToOne(targetEntity: Matieres::class, inversedBy: 'fichierMatieres')]
    private $matiere;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $dureeVideo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $imageFichier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFichierMatiere(): ?string
    {
        return $this->nomFichierMatiere;
    }

    public function setNomFichierMatiere(string $nomFichierMatiere): self
    {
        $this->nomFichierMatiere = $nomFichierMatiere;

        return $this;
    }

    public function getDescriptionFichier(): ?string
    {
        return $this->descriptionFichier;
    }

    public function setDescriptionFichier(string $descriptionFichier): self
    {
        $this->descriptionFichier = $descriptionFichier;

        return $this;
    }

    public function getFormatFichier(): ?string
    {
        return $this->formatFichier;
    }

    public function setFormatFichier(string $formatFichier): self
    {
        $this->formatFichier = $formatFichier;

        return $this;
    }

    public function getLienFichier(): ?string
    {
        return $this->lienFichier;
    }

    public function setLienFichier(string $lienFichier): self
    {
        $this->lienFichier = $lienFichier;

        return $this;
    }

    public function getTypeFichier(): ?TypeFichierMatiere
    {
        return $this->typeFichier;
    }

    public function setTypeFichier(?TypeFichierMatiere $typeFichier): self
    {
        $this->typeFichier = $typeFichier;

        return $this;
    }

    public function getMatiere(): ?Matieres
    {
        return $this->matiere;
    }

    public function setMatiere(?Matieres $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }

    public function getDureeVideo(): ?string
    {
        return $this->dureeVideo;
    }

    public function setDureeVideo(string $dureeVideo): self
    {
        $this->dureeVideo = $dureeVideo;

        return $this;
    }

    public function getImageFichier(): ?string
    {
        return $this->imageFichier;
    }

    public function setImageFichier(?string $imageFichier): self
    {
        $this->imageFichier = $imageFichier;

        return $this;
    }
}
