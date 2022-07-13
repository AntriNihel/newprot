<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CodePostalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CodePostalRepository::class)]
#[ApiResource]
class CodePostal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $codePostal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }
}
