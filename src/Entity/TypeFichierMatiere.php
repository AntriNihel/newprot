<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TypeFichierMatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeFichierMatiereRepository::class)]
#[ApiResource]
class TypeFichierMatiere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomTypeFichier;

    #[ORM\OneToMany(mappedBy: 'typeFichier', targetEntity: FichierMatiere::class)]
    private $fichierMatieres;

    public function __construct()
    {
        $this->fichierMatieres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeFichier(): ?string
    {
        return $this->nomTypeFichier;
    }

    public function setNomTypeFichier(string $nomTypeFichier): self
    {
        $this->nomTypeFichier = $nomTypeFichier;

        return $this;
    }

    /**
     * @return Collection<int, FichierMatiere>
     */
    public function getFichierMatieres(): Collection
    {
        return $this->fichierMatieres;
    }

    public function addFichierMatiere(FichierMatiere $fichierMatiere): self
    {
        if (!$this->fichierMatieres->contains($fichierMatiere)) {
            $this->fichierMatieres[] = $fichierMatiere;
            $fichierMatiere->setTypeFichier($this);
        }

        return $this;
    }

    public function removeFichierMatiere(FichierMatiere $fichierMatiere): self
    {
        if ($this->fichierMatieres->removeElement($fichierMatiere)) {
            // set the owning side to null (unless already changed)
            if ($fichierMatiere->getTypeFichier() === $this) {
                $fichierMatiere->setTypeFichier(null);
            }
        }

        return $this;
    }
}
