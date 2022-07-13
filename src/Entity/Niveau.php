<?php

namespace App\Entity;

use App\Repository\NiveauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
#[ApiResource]


#[ORM\Entity(repositoryClass: NiveauRepository::class)]
class Niveau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomNiveau;

    #[ORM\OneToMany(mappedBy: 'niveau', targetEntity: Matieres::class)]
    private $matieres;

    #[ORM\OneToMany(mappedBy: 'Niveau', targetEntity: Eleve::class)]
    private $eleves;

   

    #[ORM\OneToMany(mappedBy: 'niveau', targetEntity: TarifPackNiveau::class)]
    private $tarifPackNiveaux;

    #[ORM\ManyToMany(targetEntity: Abonnement::class, inversedBy: 'niveaux')]
    private $abonnementNiveau;

    #[ORM\OneToMany(mappedBy: 'nivea', targetEntity: SectionNiveau::class)]
    private $sectionNiveaux;

   

    public function __construct()
    {
        $this->matieres = new ArrayCollection();
        $this->eleves = new ArrayCollection();
        $this->tarifPackNiveaux = new ArrayCollection();
        $this->abonnementNiveaux = new ArrayCollection();
        $this->abonnementNiveau = new ArrayCollection();
        $this->sectionNiveaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomNiveau(): ?string
    {
        return $this->nomNiveau;
    }

    public function setNomNiveau(string $nomNiveau): self
    {
        $this->nomNiveau = $nomNiveau;

        return $this;
    }

    /**
     * @return Collection<int, Matieres>
     */
    public function getMatieres(): Collection
    {
        return $this->matieres;
    }

    public function addMatiere(Matieres $matiere): self
    {
        if (!$this->matieres->contains($matiere)) {
            $this->matieres[] = $matiere;
            $matiere->setIdNiveau($this);
        }

        return $this;
    }

    public function removeMatiere(Matieres $matiere): self
    {
        if ($this->matieres->removeElement($matiere)) {
            // set the owning side to null (unless already changed)
            if ($matiere->getIdNiveau() === $this) {
                $matiere->setIdNiveau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Eleve>
     */
    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function addElefe(Eleve $elefe): self
    {
        if (!$this->eleves->contains($elefe)) {
            $this->eleves[] = $elefe;
            $elefe->setNiveau($this);
        }

        return $this;
    }

    public function removeElefe(Eleve $elefe): self
    {
        if ($this->eleves->removeElement($elefe)) {
            // set the owning side to null (unless already changed)
            if ($elefe->getNiveau() === $this) {
                $elefe->setNiveau(null);
            }
        }

        return $this;
    }

   

    /**
     * @return Collection<int, TarifPackNiveau>
     */
    public function getTarifPackNiveaux(): Collection
    {
        return $this->tarifPackNiveaux;
    }

    public function addTarifPackNiveau(TarifPackNiveau $tarifPackNiveau): self
    {
        if (!$this->tarifPackNiveaux->contains($tarifPackNiveau)) {
            $this->tarifPackNiveaux[] = $tarifPackNiveau;
            $tarifPackNiveau->setNiveau($this);
        }

        return $this;
    }

    public function removeTarifPackNiveau(TarifPackNiveau $tarifPackNiveau): self
    {
        if ($this->tarifPackNiveaux->removeElement($tarifPackNiveau)) {
            // set the owning side to null (unless already changed)
            if ($tarifPackNiveau->getNiveau() === $this) {
                $tarifPackNiveau->setNiveau(null);
            }
        }

        return $this;
    }

   

    

   

    /**
     * @return Collection<int, SectionNiveau>
     */
    public function getSectionNiveaux(): Collection
    {
        return $this->sectionNiveaux;
    }

    public function addSectionNiveau(SectionNiveau $sectionNiveau): self
    {
        if (!$this->sectionNiveaux->contains($sectionNiveau)) {
            $this->sectionNiveaux[] = $sectionNiveau;
            $sectionNiveau->setNivea($this);
        }

        return $this;
    }

    public function removeSectionNiveau(SectionNiveau $sectionNiveau): self
    {
        if ($this->sectionNiveaux->removeElement($sectionNiveau)) {
            // set the owning side to null (unless already changed)
            if ($sectionNiveau->getNivea() === $this) {
                $sectionNiveau->setNivea(null);
            }
        }

        return $this;
    }

   

}
