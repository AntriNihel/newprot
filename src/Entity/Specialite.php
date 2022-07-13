<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SpecialiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialiteRepository::class)]
#[ApiResource]
class Specialite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomSpecialite;

    #[ORM\OneToMany(mappedBy: 'specialite', targetEntity: Enseignant::class)]
    private $enseignants;

    public function __construct()
    {
        $this->enseignants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSpecialite(): ?string
    {
        return $this->nomSpecialite;
    }

    public function setNomSpecialite(string $nomSpecialite): self
    {
        $this->nomSpecialite = $nomSpecialite;

        return $this;
    }

    /**
     * @return Collection<int, Enseignant>
     */
    public function getEnseignants(): Collection
    {
        return $this->enseignants;
    }

    public function addEnseignant(Enseignant $enseignant): self
    {
        if (!$this->enseignants->contains($enseignant)) {
            $this->enseignants[] = $enseignant;
            $enseignant->setSpecialite($this);
        }

        return $this;
    }

    public function removeEnseignant(Enseignant $enseignant): self
    {
        if ($this->enseignants->removeElement($enseignant)) {
            // set the owning side to null (unless already changed)
            if ($enseignant->getSpecialite() === $this) {
                $enseignant->setSpecialite(null);
            }
        }

        return $this;
    }
}
