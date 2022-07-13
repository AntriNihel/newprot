<?php
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EleveRepository::class)]
#[ApiResource]
class Eleve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomEleve;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenomEleve;

    #[ORM\Column(type: 'string', length: 255)]
    private $loginEleve;

    #[ORM\Column(type: 'string', length: 255)]
    private $emailEleve;

    #[ORM\Column(type: 'integer')]
    private $phoneEleve;

    #[ORM\Column(type: 'date')]
    private $dateNaissanceEleve;

    #[ORM\Column(type: 'string', length: 255)]
    private $sexeEleve;

    #[ORM\Column(type: 'string', length: 255)]
    private $etatEleve;

   
    #[ORM\Column(type: 'string', length: 255)]
    private $motPasseEleve;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $photoEleve;

    #[ORM\Column(type: 'float')]
    private $soldeEleve;

    #[ORM\ManyToOne(targetEntity: Parents::class, inversedBy: 'eleves')]
    #[ORM\JoinColumn(nullable: false)]
    private $Parents;

    #[ORM\ManyToOne(targetEntity: Localite::class, inversedBy: 'eleves')]
    #[ORM\JoinColumn(nullable: false)]
    private $localite;

    #[ORM\OneToMany(mappedBy: 'eleve', targetEntity: Abonnement::class)]
    private $abonnement;

    #[ORM\Column(type: 'string', length: 255)]
    private $rue;

    #[ORM\Column(type: 'string', length: 255)]
    private $acteNaissance;

    #[ORM\Column(type: 'boolean')]
    private $etatConfirmation;

    #[ORM\Column(type: 'string', length: 255)]
    private $dateConfirmation;

    #[ORM\Column(type: 'string', length: 255)]
    private $confirmMotPasseEleve;


    public function __construct()
    {
        $this->abonnement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEleve(): ?string
    {
        return $this->nomEleve;
    }

    public function setNomEleve(string $nomEleve): self
    {
        $this->nomEleve = $nomEleve;

        return $this;
    }

    public function getPrenomEleve(): ?string
    {
        return $this->prenomEleve;
    }

    public function setPrenomEleve(string $prenomEleve): self
    {
        $this->prenomEleve = $prenomEleve;

        return $this;
    }

    public function getLoginEleve(): ?string
    {
        return $this->loginEleve;
    }

    public function setLoginEleve(string $loginEleve): self
    {
        $this->loginEleve = $loginEleve;

        return $this;
    }

    public function getEmailEleve(): ?string
    {
        return $this->emailEleve;
    }

    public function setEmailEleve(string $emailEleve): self
    {
        $this->emailEleve = $emailEleve;

        return $this;
    }

    public function getPhoneEleve(): ?int
    {
        return $this->phoneEleve;
    }

    public function setPhoneEleve(int $phoneEleve): self
    {
        $this->phoneEleve = $phoneEleve;

        return $this;
    }

    public function getDateNaissanceEleve(): ?\DateTimeInterface
    {
        return $this->dateNaissanceEleve;
    }

    public function setDateNaissanceEleve(\DateTimeInterface $dateNaissanceEleve): self
    {
        $this->dateNaissanceEleve = $dateNaissanceEleve;

        return $this;
    }

    public function getSexeEleve(): ?string
    {
        return $this->sexeEleve;
    }

    public function setSexeEleve(string $sexeEleve): self
    {
        $this->sexeEleve = $sexeEleve;

        return $this;
    }

    public function getEtatEleve(): ?string
    {
        return $this->etatEleve;
    }

    public function setEtatEleve(string $etatEleve): self
    {
        $this->etatEleve = $etatEleve;

        return $this;
    }

    public function getMotPasseEleve(): ?string
    {
        return $this->motPasseEleve;
    }

    public function setMotPasseEleve(string $motPasseEleve): self
    {
        $this->motPasseEleve = $motPasseEleve;

        return $this;
    }


    public function getPhotoEleve(): ?string
    {
        return $this->photoEleve;
    }

    public function setPhotoEleve(?string $photoEleve): self
    {
        $this->photoEleve = $photoEleve;

        return $this;
    }

    public function getSoldeEleve(): ?float
    {
        return $this->soldeEleve;
    }

    public function setSoldeEleve(float $soldeEleve): self
    {
        $this->soldeEleve = $soldeEleve;

        return $this;
    }

    public function getParents(): ?Parents
    {
        return $this->Parents;
    }

    public function setParents(?Parents $Parents): self
    {
        $this->Parents = $Parents;

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

    /**
     * @return Collection<int, Abonnement>
     */
    public function getAbonnement(): Collection
    {
        return $this->abonnement;
    }

    public function addAbonnement(Abonnement $Abonnement): self
    {
        if (!$this->abonnement->contains($abonnement)) {
            $this->abonnement[] = $abonnement;
            $abonnement->setEleve($this);
        }

        return $this;
    }

    public function removeAbonnement(Abonnement $abonnement): self
    {
        if ($this->abonnement->removeElement($abonnement)) {
            // set the owning side to null (unless already changed)
            if ($abonnement->getEleve() === $this) {
                $abonnement->setEleve(null);
            }
        }

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

    public function getActeNaissance(): ?string
    {
        return $this->acteNaissance;
    }

    public function setActeNaissance(string $acteNaissance): self
    {
        $this->acteNaissance = $acteNaissance;

        return $this;
    }

    public function isEtatConfirmation(): ?bool
    {
        return $this->etatConfirmation;
    }

    public function setEtatConfirmation(bool $etatConfirmation): self
    {
        $this->etatConfirmation = $etatConfirmation;

        return $this;
    }

    public function getDateConfirmation(): ?string
    {
        return $this->dateConfirmation;
    }

    public function setDateConfirmation(string $dateConfirmation): self
    {
        $this->dateConfirmation = $dateConfirmation;

        return $this;
    }

    public function getConfirmMotPasseEleve(): ?string
    {
        return $this->confirmMotPasseEleve;
    }

    public function setConfirmMotPasseEleve(string $confirmMotPasseEleve): self
    {
        $this->confirmMotPasseEleve = $confirmMotPasseEleve;

        return $this;
    }

 

}
