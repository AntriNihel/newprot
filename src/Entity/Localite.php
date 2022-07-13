<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LocaliteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocaliteRepository::class)]
#[ApiResource(

    collectionOperations: [
       'get',
        'post',
    ],
    itemOperations: [
        'get',
        'put',
        'delete',
        'patch',
],
)]
class Localite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $governorat;

    #[ORM\Column(type: 'string', length: 255)]
    private $delegation;

    #[ORM\Column(type: 'string', length: 255)]
    private $codePostale;

   

    #[ORM\OneToMany(mappedBy: 'localite', targetEntity: Administrateur::class)]
    private $administrateurs;

    #[ORM\OneToMany(mappedBy: 'localite', targetEntity: Enseignant::class)]
    private $enseignants;

    #[ORM\OneToMany(mappedBy: 'localite', targetEntity: Parents::class)]
    private $parents;

    #[ORM\OneToMany(mappedBy: 'localite', targetEntity: Eleve::class)]
    private $eleves;

    #[ORM\Column(type: 'string', length: 255)]
    private $ville;

    public function __construct()
    {
        $this->administrateurs = new ArrayCollection();
        $this->enseignants = new ArrayCollection();
        $this->parents = new ArrayCollection();
        $this->eleves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getgovernorat(): ?string
    {
        return $this->governorat;
    }

    public function setgovernorat(string $governorat): self
    {
        $this->governorat = $governorat;

        return $this;
    }

    public function getDelegation(): ?string
    {
        return $this->delegation;
    }

    public function setDelegation(string $delegation): self
    {
        $this->delegation = $delegation;

        return $this;
    }

    public function getcodePostale(): ?string
    {
        return $this->codePostale;
    }

    public function setcodePostale(string $codePostale): self
    {
        $this->codePostale = $codePostale;

        return $this;
    }

    /**
     * @return Collection<int, Administrateur>
     */
    public function getAdministrateurs(): Collection
    {
        return $this->administrateurs;
    }

    public function addAdministrateur(Administrateur $administrateur): self
    {
        if (!$this->administrateurs->contains($administrateur)) {
            $this->administrateurs[] = $administrateur;
            $administrateur->setLocalite($this);
        }

        return $this;
    }

    public function removeAdministrateur(Administrateur $administrateur): self
    {
        if ($this->administrateurs->removeElement($administrateur)) {
            // set the owning side to null (unless already changed)
            if ($administrateur->getLocalite() === $this) {
                $administrateur->setLocalite(null);
            }
        }

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
            $enseignant->setLocalite($this);
        }

        return $this;
    }

    public function removeEnseignant(Enseignant $enseignant): self
    {
        if ($this->enseignants->removeElement($enseignant)) {
            // set the owning side to null (unless already changed)
            if ($enseignant->getLocalite() === $this) {
                $enseignant->setLocalite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Parents>
     */
    public function getParents(): Collection
    {
        return $this->parents;
    }

    public function addParent(Parents $parent): self
    {
        if (!$this->parents->contains($parent)) {
            $this->parents[] = $parent;
            $parent->setLocalite($this);
        }

        return $this;
    }

    public function removeParent(Parents $parent): self
    {
        if ($this->parents->removeElement($parent)) {
            // set the owning side to null (unless already changed)
            if ($parent->getLocalite() === $this) {
                $parent->setLocalite(null);
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
            $elefe->setLocalite($this);
        }

        return $this;
    }

    public function removeElefe(Eleve $elefe): self
    {
        if ($this->eleves->removeElement($elefe)) {
            // set the owning side to null (unless already changed)
            if ($elefe->getLocalite() === $this) {
                $elefe->setLocalite(null);
            }
        }

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
}
