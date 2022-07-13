<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AbonnementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbonnementRepository::class)]
#[ApiResource]
class Abonnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $dateAbonnement;

    #[ORM\Column(type: 'date')]
    private $dateExpiration;


    #[ORM\Column(type: 'float')]
    private $montant;

    

    #[ORM\ManyToOne(targetEntity: Eleve::class, inversedBy: 'abonnements')]
    #[ORM\JoinColumn(nullable: false)]
    private $eleve;

    #[ORM\ManyToOne(targetEntity: TypeAbonnement::class, inversedBy: 'abonnements')]
    #[ORM\JoinColumn(nullable: false)]
    private $typeAbonnement;

    #[ORM\ManyToOne(targetEntity: OptionMatiere::class, inversedBy: 'abonnements')]
    #[ORM\JoinColumn(nullable: false)]
    private $optionMatiere;

    #[ORM\ManyToMany(targetEntity: SectionNiveau::class, inversedBy: 'abonnements')]
    private $sectionNiveau;

    #[ORM\Column(type: 'float', nullable: true)]
    private $solde;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $etatAbonnement;

    public function __construct()
    {
        $this->sectionNiveau = new ArrayCollection();
    }

  

    /*public function __construct()
    {
        $this->abonnementNiveaux = new ArrayCollection();
        $this->niveaux = new ArrayCollection();
    }*/


    public function getId(): ?int
    {
        return $this->id;
    }

    
    public function getDateAbonnement(): ?\DateTimeInterface
    {
        return $this->dateAbonnement;
    }

    public function setDateAbonnement(\DateTimeInterface $dateAbonnement): self
    {
        $this->dateAbonnement = $dateAbonnement;

        return $this;
    }

    public function getDateExpiration(): ?\DateTimeInterface
    {
        return $this->dateExpiration;
    }

    public function setDateExpiration(\DateTimeInterface $dateExpiration): self
    {
        $this->dateExpiration = $dateExpiration;

        return $this;
    }

   
    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

   

    public function getEleve(): ?Eleve
    {
        return $this->eleve;
    }

    public function setEleve(?Eleve $eleve): self
    {
        $this->eleve = $eleve;

        return $this;
    }

    public function getTypeAbonnement(): ?TypeAbonnement
    {
        return $this->typeAbonnement;
    }

    public function setTypeAbonnement(?TypeAbonnement $typeAbonnement): self
    {
        $this->typeAbonnement = $typeAbonnement;

        return $this;
    }

    public function getOptionMatiere(): ?OptionMatiere
    {
        return $this->optionMatiere;
    }

    public function setOptionMatiere(?OptionMatiere $optionMatiere): self
    {
        $this->optionMatiere = $optionMatiere;

        return $this;
    }

    /**
     * @return Collection<int, SectionNiveau>
     */
    public function getSectionNiveau(): Collection
    {
        return $this->sectionNiveau;
    }

    public function addSectionNiveau(SectionNiveau $sectionNiveau): self
    {
        if (!$this->sectionNiveau->contains($sectionNiveau)) {
            $this->sectionNiveau[] = $sectionNiveau;
        }

        return $this;
    }

    public function removeSectionNiveau(SectionNiveau $sectionNiveau): self
    {
        $this->sectionNiveau->removeElement($sectionNiveau);

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(?float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function isEtatAbonnement(): ?bool
    {
        return $this->etatAbonnement;
    }

    public function setEtatAbonnement(?bool $etatAbonnement): self
    {
        $this->etatAbonnement = $etatAbonnement;

        return $this;
    }

  
}
