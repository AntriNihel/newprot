<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TypeAbonnementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeAbonnementRepository::class)]
#[ApiResource]
class TypeAbonnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomTypeAbonnement;

    #[ORM\OneToMany(mappedBy: 'typeAbonnement', targetEntity: Abonnement::class)]
    private $abonnements;

    #[ORM\OneToMany(mappedBy: 'typeAbonnement', targetEntity: TarifPackNiveau::class)]
    private $tarifPackNiveaux;

    public function __construct()
    {
        $this->abonnements = new ArrayCollection();
        $this->tarifPackNiveaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeAbonnement(): ?string
    {
        return $this->nomTypeAbonnement;
    }

    public function setNomTypeAbonnement(string $nomTypeAbonnement): self
    {
        $this->nomTypeAbonnement = $nomTypeAbonnement;

        return $this;
    }

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
            $abonnement->setTypeAbonnement($this);
        }

        return $this;
    }

    public function removeAbonnement(Abonnement $abonnement): self
    {
        if ($this->abonnements->removeElement($abonnement)) {
            // set the owning side to null (unless already changed)
            if ($abonnement->getTypeAbonnement() === $this) {
                $abonnement->setTypeAbonnement(null);
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
            $tarifPackNiveau->setTypeAbonnement($this);
        }

        return $this;
    }

    public function removeTarifPackNiveau(TarifPackNiveau $tarifPackNiveau): self
    {
        if ($this->tarifPackNiveaux->removeElement($tarifPackNiveau)) {
            // set the owning side to null (unless already changed)
            if ($tarifPackNiveau->getTypeAbonnement() === $this) {
                $tarifPackNiveau->setTypeAbonnement(null);
            }
        }

        return $this;
    }
}
