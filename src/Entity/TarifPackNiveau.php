<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TarifPackNiveauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TarifPackNiveauRepository::class)]
#[ApiResource]
class TarifPackNiveau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'float')]
    private $prix;

    /*#[ORM\ManyToOne(targetEntity: Niveau::class, inversedBy: 'tarifPackNiveaux')]
    #[ORM\JoinColumn(nullable: false)]
    private $niveau;*/

    #[ORM\ManyToOne(targetEntity: TypeAbonnement::class, inversedBy: 'tarifPackNiveaux')]
    #[ORM\JoinColumn(nullable: false)]
    private $typeAbonnement;

    #[ORM\ManyToOne(targetEntity: SectionNiveau::class, inversedBy: 'tarifPackNiveaux')]
    private $sectionNiveau;

   

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /*public function getNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }*/

    public function getTypeAbonnement(): ?TypeAbonnement
    {
        return $this->typeAbonnement;
    }

    public function setTypeAbonnement(?TypeAbonnement $typeAbonnement): self
    {
        $this->typeAbonnement = $typeAbonnement;

        return $this;
    }

    public function getSectionNiveau(): ?SectionNiveau
    {
        return $this->sectionNiveau;
    }

    public function setSectionNiveau(?SectionNiveau $sectionNiveau): self
    {
        $this->sectionNiveau = $sectionNiveau;

        return $this;
    }

}
