<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DelegationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DelegationRepository::class)]
#[ApiResource]
class Delegation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $delegation;

    public function getId(): ?int
    {
        return $this->id;
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
}
