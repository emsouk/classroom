<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
#[ApiResource(
    operations: [
        new Get(
            normalizationContext: ['groups' => ['module:read']],
            uriTemplate: '/module/{id}',
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['module:read']],
            uriTemplate: '/module',
        ),
        new Post(
            normalizationContext: ['groups' => ['module:read']],
            denormalizationContext: ['groups' => ['module:create']],
            uriTemplate: '/module',
        ),
        new Put(
            normalizationContext: ['groups' => ['module:read']],
            denormalizationContext: ['groups' => ['module:create']],
            uriTemplate: '/module/{id}',
        ),
        new Delete(
            uriTemplate: '/module/{id}',
        ),
    ],
    normalizationContext: ['groups' => ['module:read']],
    denormalizationContext: ['groups' => ['module:write']],
)]
class Module
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['module:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['module:read', 'module:create'])]
    private ?string $name = null;

    #[ORM\Column]
    #[Groups(['module:read'])]
    private ?bool $isActive = null;



    public function __construct() {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }
}
