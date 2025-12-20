<?php

namespace App\Entity;

use App\Repository\ExerciceRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ExerciceRepository::class)]
#[ApiResource(
    operations: [
        new Get(
            normalizationContext: ['groups' => ['exercice:read']],
            uriTemplate: '/exercices/{id}',
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['exercice:read']],
            uriTemplate: '/exercices',
        ),
        new Post(
            normalizationContext: ['groups' => ['exercice:read']],
            denormalizationContext: ['groups' => ['exercice:create']],
            uriTemplate: '/exercices',
        ),
        new Put(
            normalizationContext: ['groups' => ['exercice:read']],
            denormalizationContext: ['groups' => ['exercice:create']],
            uriTemplate: '/exercices/{id}',
        ),
        new Delete(
            uriTemplate: '/exercices/{id}',
        ),
    ],
    normalizationContext: ['groups' => ['exercice:read']],
    denormalizationContext: ['groups' => ['exercice:write']],
)]
class Exercice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['exercice:read', 'course:read:exercices'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['exercice:read', 'exercice:create', 'course:read:exercices'])]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'exercices')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['exercice:read'])]
    private ?Course $course = null;

    #[ORM\Column]
    #[Groups(['exercice:read'])]
    private ?bool $isActive = null;

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

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): static
    {
        $this->course = $course;

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
