<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdministrateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdministrateurRepository::class)]
#[ApiResource]
class Administrateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomAdministrateur;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenomAdministrateur;

    #[ORM\Column(type: 'string', length: 255)]
    private $emailAdministrateur;

    #[ORM\Column(type: 'string', length: 255)]
    private $motPasseAdministrateur;

    #[ORM\Column(type: 'string', length: 255)]
    private $loginAdministrateur;

    #[ORM\Column(type: 'string', length: 255)]
    private $roleAdministrateur;

    #[ORM\Column(type: 'string', length: 255)]
    private $civiliteAdministrateur;

    #[ORM\ManyToOne(targetEntity: Localite::class, inversedBy: 'administrateurs')]
    #[ORM\JoinColumn(nullable: false)]
    private $localite;

    #[ORM\Column(type: 'string', length: 255)]
    private $rue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAdministrateur(): ?string
    {
        return $this->nomAdministrateur;
    }

    public function setNomAdministrateur(string $nomAdministrateur): self
    {
        $this->nomAdministrateur = $nomAdministrateur;

        return $this;
    }

    public function getPrenomAdministrateur(): ?string
    {
        return $this->prenomAdministrateur;
    }

    public function setPrenomAdministrateur(string $prenomAdministrateur): self
    {
        $this->prenomAdministrateur = $prenomAdministrateur;

        return $this;
    }

    public function getEmailAdministrateur(): ?string
    {
        return $this->emailAdministrateur;
    }

    public function setEmailAdministrateur(string $emailAdministrateur): self
    {
        $this->emailAdministrateur = $emailAdministrateur;

        return $this;
    }

    public function getMotPasseAdministrateur(): ?string
    {
        return $this->motPasseAdministrateur;
    }

    public function setMotPasseAdministrateur(string $motPasseAdministrateur): self
    {
        $this->motPasseAdministrateur = $motPasseAdministrateur;

        return $this;
    }

    public function getLoginAdministrateur(): ?string
    {
        return $this->loginAdministrateur;
    }

    public function setLoginAdministrateur(string $loginAdministrateur): self
    {
        $this->loginAdministrateur = $loginAdministrateur;

        return $this;
    }

    public function getRoleAdministrateur(): ?string
    {
        return $this->roleAdministrateur;
    }

    public function setRoleAdministrateur(string $roleAdministrateur): self
    {
        $this->roleAdministrateur = $roleAdministrateur;

        return $this;
    }

    public function getCiviliteAdministrateur(): ?string
    {
        return $this->civiliteAdministrateur;
    }

    public function setCiviliteAdministrateur(string $civiliteAdministrateur): self
    {
        $this->civiliteAdministrateur = $civiliteAdministrateur;

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
