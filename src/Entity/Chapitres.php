<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ChapitresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChapitresRepository::class)]
#[ApiResource]
class Chapitres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomChapitre;

    #[ORM\Column(type: 'string', length: 255)]
    private $descriptionChapitre;

    

    #[ORM\ManyToOne(targetEntity: Matieres::class, inversedBy: 'chapitres')]
    private $matiereChapitre;

    #[ORM\OneToMany(mappedBy: 'chapitre', targetEntity: Cours::class)]
    private $cours;

    #[ORM\ManyToOne(targetEntity: Periode::class, inversedBy: 'chapitres')]
    #[ORM\JoinColumn(nullable: false)]
    private $periode;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $imageChapitre;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomChapitre(): ?string
    {
        return $this->nomChapitre;
    }

    public function setNomChapitre(string $nomChapitre): self
    {
        $this->nomChapitre = $nomChapitre;

        return $this;
    }

    public function getDescriptionChapitre(): ?string
    {
        return $this->descriptionChapitre;
    }

    public function setDescriptionChapitre(string $descriptionChapitre): self
    {
        $this->descriptionChapitre = $descriptionChapitre;

        return $this;
    }

   
    public function getMatiereChapitre(): ?Matieres
    {
        return $this->matiereChapitre;
    }

    public function setMatiereChapitre(?Matieres $matiereChapitre): self
    {
        $this->matiereChapitre = $matiereChapitre;

        return $this;
    }

    /**
     * @return Collection<int, Cours>
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cours $cour): self
    {
        if (!$this->cours->contains($cour)) {
            $this->cours[] = $cour;
            $cour->setChapitre($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getChapitre() === $this) {
                $cour->setChapitre(null);
            }
        }

        return $this;
    }

    public function getPeriode(): ?Periode
    {
        return $this->periode;
    }

    public function setPeriode(?Periode $periode): self
    {
        $this->periode = $periode;

        return $this;
    }

    public function getImageChapitre(): ?string
    {
        return $this->imageChapitre;
    }

    public function setImageChapitre(?string $imageChapitre): self
    {
        $this->imageChapitre = $imageChapitre;

        return $this;
    }
}
