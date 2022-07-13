<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EnseignantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnseignantRepository::class)]
#[ApiResource]
class Enseignant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomEnseignant;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenomEnseignant;

    #[ORM\Column(type: 'string', length: 255)]
    private $emailEnseignant;

    #[ORM\Column(type: 'integer')]
    private $phoneEnseignant;

    #[ORM\Column(type: 'string', length: 255)]
    private $sexeEnseignant;
      
    #[ORM\Column(type: 'string', length: 255)]
    private $motPasseEnseignant;

    #[ORM\Column(type: 'string', length: 255)]
    private $photoEnseignant;

    #[ORM\OneToMany(mappedBy: 'enseignant', targetEntity: Cours::class)]
    private $cours;

    #[ORM\ManyToOne(targetEntity: Specialite::class, inversedBy: 'enseignants')]
    #[ORM\JoinColumn(nullable: false)]
    private $specialite;

    #[ORM\Column(type: 'string', length: 255)]
    private $loginEnseignant;

    #[ORM\Column(type: 'string', length: 255)]
    private $dateNaissanceEnseignant;

    #[ORM\ManyToOne(targetEntity: Localite::class, inversedBy: 'enseignants')]
    #[ORM\JoinColumn(nullable: false)]
    private $localite;

    #[ORM\Column(type: 'string', length: 255)]
    private $rue;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEnseignant(): ?string
    {
        return $this->nomEnseignant;
    }

    public function setNomEnseignant(string $nomEnseignant): self
    {
        $this->nomEnseignant = $nomEnseignant;

        return $this;
    }

    public function getPrenomEnseignant(): ?string
    {
        return $this->prenomEnseignant;
    }

    public function setPrenomEnseignant(string $prenomEnseignant): self
    {
        $this->prenomEnseignant = $prenomEnseignant;

        return $this;
    }

    public function getEmailEnseignant(): ?string
    {
        return $this->emailEnseignant;
    }

    public function setEmailEnseignant(string $emailEnseignant): self
    {
        $this->emailEnseignant = $emailEnseignant;

        return $this;
    }

    public function getPhoneEnseignant(): ?int
    {
        return $this->phoneEnseignant;
    }

    public function setPhoneEnseignant(int $phoneEnseignant): self
    {
        $this->phoneEnseignant = $phoneEnseignant;

        return $this;
    }

    public function getSexeEnseignant(): ?string
    {
        return $this->sexeEnseignant;
    }

    public function setSexeEnseignant(string $sexeEnseignant): self
    {
        $this->sexeEnseignant = $sexeEnseignant;
        return $this;
    }

    public function getMotPasseEnseignant(): ?string
    {
        return $this->motPasseEnseignant;
    }

    public function setMotPasseEnseignant(string $motPasseEnseignant): self
    {
        $this->motPasseEnseignant = $motPasseEnseignant;

        return $this;
    }

    public function getPhotoEnseignant(): ?string
    {
        return $this->photoEnseignant;
    }

    public function setPhotoEnseignant(string $photoEnseignant): self
    {
        $this->photoEnseignant = $photoEnseignant;

        return $this;
    }

    /**
     * @return Collection<int, Cours>
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cours $cour): self
    {
        if (!$this->cours->contains($cour)) {
            $this->cours[] = $cour;
            $cour->setEnseignant($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getEnseignant() === $this) {
                $cour->setEnseignant(null);
            }
        }

        return $this;
    }

    public function getSpecialite(): ?Specialite
    {
        return $this->specialite;
    }

    public function setSpecialite(?Specialite $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getLoginEnseignant(): ?string
    {
        return $this->loginEnseignant;
    }

    public function setLoginEnseignant(string $loginEnseignant): self
    {
        $this->loginEnseignant = $loginEnseignant;

        return $this;
    }

    public function getDateNaissanceEnseignant(): ?string
    {
        return $this->dateNaissanceEnseignant;
    }

    public function setDateNaissanceEnseignant(string $dateNaissanceEnseignant): self
    {
        $this->dateNaissanceEnseignant = $dateNaissanceEnseignant;

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
}
