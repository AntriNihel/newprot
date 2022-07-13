<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ParentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParentsRepository::class)]
#[ApiResource]
class Parents
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomParent;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenomParent;

    #[ORM\Column(type: 'string', length: 255)]
    private $emailParent;

    #[ORM\Column(type: 'integer')]
    private $phoneParent;

  
    #[ORM\Column(type: 'string', length: 255)]
    private $motPasseParent;

    #[ORM\OneToMany(mappedBy: 'Parents', targetEntity: Eleve::class)]
    private $eleves;

    #[ORM\Column(type: 'string', length: 255)]
    private $loginParents;

    #[ORM\Column(type: 'string', length: 255)]
    private $fonctionParents;

    #[ORM\ManyToOne(targetEntity: Localite::class, inversedBy: 'parents')]
    #[ORM\JoinColumn(nullable: false)]
    private $localite;

    #[ORM\Column(type: 'string', length: 255)]
    private $rue;

    #[ORM\Column(type: 'string', length: 255)]
    private $civiliteParent;

    #[ORM\Column(type: 'string', length: 255)]
    private $typeParents;

    #[ORM\Column(type: 'boolean')]
    private $etatConf;

    #[ORM\Column(type: 'string', length: 255)]
    private $confirmMotPasseParent;

    public function __construct()
    {
        $this->eleves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomParent(): ?string
    {
        return $this->nomParent;
    }

    public function setNomParent(string $nomParent): self
    {
        $this->nomParent = $nomParent;

        return $this;
    }

    public function getPrenomParent(): ?string
    {
        return $this->prenomParent;
    }

    public function setPrenomParent(string $prenomParent): self
    {
        $this->prenomParent = $prenomParent;

        return $this;
    }

    public function getEmailParent(): ?string
    {
        return $this->emailParent;
    }

    public function setEmailParent(string $emailParent): self
    {
        $this->emailParent = $emailParent;

        return $this;
    }

    public function getPhoneParent(): ?int
    {
        return $this->phoneParent;
    }

    public function setPhoneParent(int $phoneParent): self
    {
        $this->phoneParent = $phoneParent;

        return $this;
    }

    
    public function getMotPasseParent(): ?string
    {
        return $this->motPasseParent;
    }

    public function setMotPasseParent(string $motPasseParent): self
    {
        $this->motPasseParent = $motPasseParent;

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
            $elefe->setParents($this);
        }

        return $this;
    }

    public function removeElefe(Eleve $elefe): self
    {
        if ($this->eleves->removeElement($elefe)) {
            // set the owning side to null (unless already changed)
            if ($elefe->getParents() === $this) {
                $elefe->setParents(null);
            }
        }

        return $this;
    }

    public function getLoginParents(): ?string
    {
        return $this->loginParents;
    }

    public function setLoginParents(string $loginParents): self
    {
        $this->loginParents = $loginParents;

        return $this;
    }

    public function getFonctionParents(): ?string
    {
        return $this->fonctionParents;
    }

    public function setFonctionParents(string $fonctionParents): self
    {
        $this->fonctionParents = $fonctionParents;

        return $this;
    }

    public function getLocalite(): ?Localite
    {
        return $this->localite;
    }

    public function setLocalite(?Localite $localite): self
    {
        $this->localite = $localite;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getCiviliteParent(): ?string
    {
        return $this->civiliteParent;
    }

    public function setCiviliteParent(string $civiliteParent): self
    {
        $this->civiliteParent = $civiliteParent;

        return $this;
    }

    public function getTypeParents(): ?string
    {
        return $this->typeParents;
    }

    public function setTypeParents(string $typeParents): self
    {
        $this->typeParents = $typeParents;

        return $this;
    }

    public function isEtatConf(): ?bool
    {
        return $this->etatConf;
    }

    public function setEtatConf(bool $etatConf): self
    {
        $this->etatConf = $etatConf;

        return $this;
    }

    public function getConfirmMotPasseParent(): ?string
    {
        return $this->confirmMotPasseParent;
    }

    public function setConfirmMotPasseParent(string $confirmMotPasseParent): self
    {
        $this->confirmMotPasseParent = $confirmMotPasseParent;

        return $this;
    }
}
