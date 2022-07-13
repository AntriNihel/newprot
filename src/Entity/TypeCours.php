<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;

use App\Repository\TypeCoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
#[ApiResource]
#[ORM\Entity(repositoryClass: TypeCoursRepository::class)]
class TypeCours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomTypeCours;

    #[ORM\OneToMany(mappedBy: 'typeCours', targetEntity: Cours::class)]
    private $cours;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeCours(): ?string
    {
        return $this->nomTypeCours;
    }

    public function setNomTypeCours(string $nomTypeCours): self
    {
        $this->nomTypeCours = $nomTypeCours;

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
            $cour->setTypeCours($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getTypeCours() === $this) {
                $cour->setTypeCours(null);
            }
        }

        return $this;
    }
}
