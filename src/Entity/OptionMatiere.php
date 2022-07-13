<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OptionMatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OptionMatiereRepository::class)]
#[ApiResource]
class OptionMatiere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomOptionMatiere;


    /*#[ORM\OneToMany(mappedBy: 'optionMatiere', targetEntity: Niveau::class)]
    private $niveaux;*/

    #[ORM\OneToMany(mappedBy: 'optionMatiere', targetEntity: Abonnement::class)]
    private $abonnements;

    /*public function __construct()
    {
        $this->abonnements = new ArrayCollection();
        $this->niveaux = new ArrayCollection();
    }*/

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomOptionMatiere(): ?string
    {
        return $this->nomOptionMatiere;
    }

    public function setNomOptionMatiere(string $nomOptionMatiere): self
    {
        $this->nomOptionMatiere = $nomOptionMatiere;

        return $this;
    }

   

    /*/**
     * @return Collection<int, Niveau>
     */
    /*public function getNiveaux(): Collection
    {
        return $this->niveaux;
    }

    public function addNiveau(Niveau $niveau): self
    {
        if (!$this->niveaux->contains($niveau)) {
            $this->niveaux[] = $niveau;
            $niveau->setOptionMatiere($this);
        }

        return $this;
    }

    public function removeNiveau(Niveau $niveau): self
    {
        if ($this->niveaux->removeElement($niveau)) {
            // set the owning side to null (unless already changed)
            if ($niveau->getOptionMatiere() === $this) {
                $niveau->setOptionMatiere(null);
            }
        }

        return $this;
    }*/

    /**
     * @return Collection<int, Abonnement>
     */
    public function getAbonnements(): Collection
    {
        return $this->abonnements;
    }

    public function addAbonnement(Abonnement $abonnement): self
    {
        if (!$this->abonnements->contains($abonnement)) {
            $this->abonnements[] = $abonnement;
            $abonnement->setOptionMatiere($this);
        }

        return $this;
    }

    public function removeAbonnement(Abonnement $abonnement): self
    {
        if ($this->abonnements->removeElement($abonnement)) {
            // set the owning side to null (unless already changed)
            if ($abonnement->getOptionMatiere() === $this) {
                $abonnement->setOptionMatiere(null);
            }
        }

        return $this;
    }
}
