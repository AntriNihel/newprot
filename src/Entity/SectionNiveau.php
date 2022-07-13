<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SectionNiveauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionNiveauRepository::class)]
#[ApiResource(

    collectionOperations: [
       'get',
        'post',
    ],
    itemOperations: [
        'get',
        'get_All'=> [ 'route_name' => 'get_All_sectionniveau',
    ],
        'put',
        'delete',
        'patch',

],
)]
class SectionNiveau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Niveau::class, inversedBy: 'sectionNiveaux')]
    private $niveau;

    #[ORM\ManyToOne(targetEntity: Section::class, inversedBy: 'sectionNiveaux')]
    private $section;


    #[ORM\OneToMany(mappedBy: 'sectionNiveau', targetEntity: Matieres::class)]
    private $matieres;

   /* #[ORM\ManyToOne(targetEntity: TarifPackNiveau::class, inversedBy: 'sectionNiveau')]
    private $tarifPackNiveau;*/

   /*#[ORM\OneToMany(mappedBy: 'sectionNiveau', targetEntity: TarifPackNiveau::class)]
    private $tarifPackNiveaux;*/

    #[ORM\ManyToMany(targetEntity: Abonnement::class, mappedBy: 'sectionNiveau')]
    private $abonnements;

    public function __construct()
    {
        $this->matieres = new ArrayCollection();
        $this->tarifPackNiveaux = new ArrayCollection();
        $this->abonnements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveau $nivea): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): self
    {
        $this->section = $section;

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
            $matiere->setSectionNiveau($this);
        }

        return $this;
    }

    public function removeMatiere(Matieres $matiere): self
    {
        if ($this->matieres->removeElement($matiere)) {
            // set the owning side to null (unless already changed)
            if ($matiere->getSectionNiveau() === $this) {
                $matiere->setSectionNiveau(null);
            }
        }

        return $this;
    }

   /* public function getTarifPackNiveau(): ?TarifPackNiveau
    {
        return $this->tarifPackNiveau;
    }

    public function setTarifPackNiveau(?TarifPackNiveau $tarifPackNiveau): self
    {
        $this->tarifPackNiveau = $tarifPackNiveau;

        return $this;
    }*/

    /**
     * @return Collection<int, TarifPackNiveau>
     */
  /*  public function getTarifPackNiveaux(): Collection
    {
        return $this->tarifPackNiveaux;
    }

    public function addTarifPackNiveau(TarifPackNiveau $tarifPackNiveau): self
    {
        if (!$this->tarifPackNiveaux->contains($tarifPackNiveau)) {
            $this->tarifPackNiveaux[] = $tarifPackNiveau;
            $tarifPackNiveau->setSectionNiveau($this);
        }

        return $this;
    }

    public function removeTarifPackNiveau(TarifPackNiveau $tarifPackNiveau): self
    {
        if ($this->tarifPackNiveaux->removeElement($tarifPackNiveau)) {
            // set the owning side to null (unless already changed)
            if ($tarifPackNiveau->getSectionNiveau() === $this) {
                $tarifPackNiveau->setSectionNiveau(null);
            }
        }

        return $this;
    } */

    /**
     * @return Collection<int, abonnement>
     */
    public function getAbonnements(): Collection
    {
        return $this->abonnements;
    }

    public function addAbonnement(Abonnement $abonnement): self
    {
        if (!$this->abonnements->contains($abonnement)) {
            $this->abonnements[] = $abonnement;
            $abonnement->addSectionNiveau($this);
        }

        return $this;
    }

    public function removeAbonnement(Abonnement $abonnement): self
    {
        if ($this->abonnements->removeElement($abonnement)) {
            $abonnement->removeSectionNiveau($this);
        }

        return $this;
    }
}
