<?php

namespace App\Entity;
use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;
use App\Repository\MatieresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

use ApiPlatform\Core\Annotation\ApiResource;
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
      'get_nomMatiere' => [ 'route_name' => 'nom_get_Matiere',
        'openapi_context' => [
          "parameters" => [
          "id" => [
          "name" => "id",
          "in" => "path",
          "required" => false,
          ],               
          "nomMatiere"=> [
          "name" => "nomMatiere",
          "in" => "path",
          "description" => "The nomMatiere of your Matiere",
          "type" => "string",
          "required" => true,
          
    ],
   ],
 ],
],
],
)]
 
/*#[ApiFilter(SearchFilter::class, properties: ['nomMatiere' => 'exact' , 
    'Niveau.idNiveau' => SearchFilter::STRATEGY_EXACT    
])]*/

#[ORM\Entity(repositoryClass: MatieresRepository::class)]
class Matieres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomMatiere;

    #[ORM\Column(type: 'text')]
    private $descriptionMatiere;

    /*#[ORM\ManyToOne(targetEntity: Niveau::class, inversedBy: 'matieres')]
    private $niveau;*/

    #[ORM\Column(type: 'boolean')]
    private $etatMatiere;

    #[ORM\Column(type: 'string', length: 255)]
    private $imageMatiere;

    #[ORM\OneToMany(mappedBy: 'matiere', targetEntity: FichierMatiere::class)]
    private $fichierMatieres;

    #[ORM\OneToMany(mappedBy: 'matiereChapitre', targetEntity: Chapitres::class)]
    private $chapitres;

    #[ORM\ManyToOne(targetEntity: SectionNiveau::class, inversedBy: 'matieres')]
    private $sectionNiveau;

    public function __construct()
    {
        $this->fichierMatieres = new ArrayCollection();
        $this->chapitres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMatiere(): ?string
    {
        return $this->nomMatiere;
    }

    public function setNomMatiere(string $nomMatiere): self
    {
        $this->nomMatiere = $nomMatiere;

        return $this;
    }

    public function getDescriptionMatiere(): ?string
    {
        return $this->descriptionMatiere;
    }

    public function setDescriptionMatiere(string $descriptionMatiere): self
    {
        $this->descriptionMatiere = $descriptionMatiere;

        return $this;
    }

    /*public function getIdNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setIdNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }
*/
    public function isEtatMatiere(): ?bool
    {
        return $this->etatMatiere;
    }

    public function setEtatMatiere(bool $etatMatiere): self
    {
        $this->etatMatiere = $etatMatiere;

        return $this;
    }

    public function getImageMatiere(): ?string
    {
        return $this->imageMatiere;
    }

    public function setImageMatiere(string $imageMatiere): self
    {
        $this->imageMatiere = $imageMatiere;

        return $this;
    }

    public function __toString()
    {
        $matiere = "Matiere (id: %s, nomMatiere: %s)\n";
        return sprintf($matiere, $this->id, $this->nomMatiere);
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
            $fichierMatiere->setMatiere($this);
        }

        return $this;
    }

    public function removeFichierMatiere(FichierMatiere $fichierMatiere): self
    {
        if ($this->fichierMatieres->removeElement($fichierMatiere)) {
            // set the owning side to null (unless already changed)
            if ($fichierMatiere->getMatiere() === $this) {
                $fichierMatiere->setMatiere(null);
            }
        }

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
            $chapitre->setMatiereChapitre($this);
        }

        return $this;
    }

    public function removeChapitre(Chapitres $chapitre): self
    {
        if ($this->chapitres->removeElement($chapitre)) {
            // set the owning side to null (unless already changed)
            if ($chapitre->getMatiereChapitre() === $this) {
                $chapitre->setMatiereChapitre(null);
            }
        }
        return $this;
    }

    public function getSectionNiveau(): ?SectionNiveau
    {
        return $this->sectionNiveau;
    }

    public function setSectionNiveau(?SectionNiveau $sectionNiveau): self
    {
        $this->sectionNiveau = $sectionNiveau;

        return $this;
    }


    
}
