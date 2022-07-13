<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
#[ApiResource]
class Section
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomSection;

    #[ORM\OneToMany(mappedBy: 'section', targetEntity: SectionNiveau::class)]
    private $sectionNiveaux;

    public function __construct()
    {
        $this->niveauSections = new ArrayCollection();
        $this->sectionNiveaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSection(): ?string
    {
        return $this->nomSection;
    }

    public function setNomSection(string $nomSection): self
    {
        $this->nomSection = $nomSection;

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
            $sectionNiveau->setSection($this);
        }

        return $this;
    }

    public function removeSectionNiveau(SectionNiveau $sectionNiveau): self
    {
        if ($this->sectionNiveaux->removeElement($sectionNiveau)) {
            // set the owning side to null (unless already changed)
            if ($sectionNiveau->getSection() === $this) {
                $sectionNiveau->setSection(null);
            }
        }

        return $this;
    }

   

    

   

     
   
}
