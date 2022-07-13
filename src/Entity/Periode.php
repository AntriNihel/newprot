<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PeriodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeriodeRepository::class)]
#[ApiResource]
class Periode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomPeriode;

    #[ORM\OneToMany(mappedBy: 'periode', targetEntity: Chapitres::class)]
    private $chapitres;

    public function __construct()
    {
        $this->chapitres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPeriode(): ?string
    {
        return $this->nomPeriode;
    }

    public function setNomPeriode(string $nomPeriode): self
    {
        $this->nomPeriode = $nomPeriode;

        return $this;
    }

    /**
     * @return Collection<int, Chapitres>
     */
    public function getChapitres(): Collection
    {
        return $this->chapitres;
    }

    public function addChapitre(Chapitres $chapitre): self
    {
        if (!$this->chapitres->contains($chapitre)) {
            $this->chapitres[] = $chapitre;
            $chapitre->setPeriode($this);
        }

        return $this;
    }

    public function removeChapitre(Chapitres $chapitre): self
    {
        if ($this->chapitres->removeElement($chapitre)) {
            // set the owning side to null (unless already changed)
            if ($chapitre->getPeriode() === $this) {
                $chapitre->setPeriode(null);
            }
        }

        return $this;
    }
}
