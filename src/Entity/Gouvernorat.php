<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GouvernoratRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GouvernoratRepository::class)]
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
      'get_governoat' => [ 'route_name' => 'get_gouvernoat',
      'openapi_context' => [
        "parameters" => [
        "id" => [
        "name" => "id",
        "in" => "path",
        "required" => false,
        ],     
        ],
        ],



],
],
)]
class Gouvernorat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $gouvernorat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGouvernorat(): ?string
    {
        return $this->gouvernorat;
    }

    public function setGouvernorat(string $gouvernorat): self
    {
        $this->gouvernorat = $gouvernorat;

        return $this;
    }
}
