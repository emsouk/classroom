<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
#[ApiResource(
    operations: [
        new Get(
            normalizationContext: ['groups' => ['session:read']],
            uriTemplate: '/session/{id}',
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['session:read']],
            uriTemplate: '/session',
        ),
        new Post(
            normalizationContext: ['groups' => ['session:read']],
            denormalizationContext: ['groups' => ['session:create']],
            uriTemplate: '/session',
        ),
        new Put(
            normalizationContext: ['groups' => ['session:read']],
            denormalizationContext: ['groups' => ['session:create']],
            uriTemplate: '/session/{id}',
        ),
        new Delete(
            uriTemplate: '/session/{id}',
        ),
    ],
    normalizationContext: ['groups' => ['session:read']],
    denormalizationContext: ['groups' => ['session:write']],
)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['session:read', 'user:read:sessions'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['session:read', 'session:create', 'user:read:sessions'])]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['session:read', 'session:create', 'user:read:sessions'])]
    private ?\DateTime $startingDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['session:read', 'session:create', 'user:read:sessions'])]
    private ?\DateTime $endingDate = null;

    #[ORM\Column(length: 20)]
    #[Groups(['session:read', 'session:create', 'user:read:sessions'])]
    private ?string $level = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'sessions')]
    #[Groups(['session:read:students'])]
    private Collection $students;

    #[ORM\ManyToOne(inversedBy: 'pizza')]
    #[Groups(['session:read'])]
    private ?User $referentTeacher = null;

    #[ORM\Column]
    #[Groups(['session:read'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    #[Groups(['session:read'])]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column]
    #[Groups(['session:read'])]
    private ?bool $isActive = null;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

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

    public function getStartingDate(): ?\DateTime
    {
        return $this->startingDate;
    }

    public function setStartingDate(\DateTime $startingDate): static
    {
        $this->startingDate = $startingDate;

        return $this;
    }

    public function getEndingDate(): ?\DateTime
    {
        return $this->endingDate;
    }

    public function setEndingDate(\DateTime $endingDate): static
    {
        $this->endingDate = $endingDate;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): static
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(User $student): static
    {
        if (!$this->students->contains($student)) {
            $this->students->add($student);
        }

        return $this;
    }

    public function removeStudent(User $student): static
    {
        $this->students->removeElement($student);

        return $this;
    }

    public function getReferentTeacher(): ?User
    {
        return $this->referentTeacher;
    }

    public function setReferentTeacher(?User $referentTeacher): static
    {
        $this->referentTeacher = $referentTeacher;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

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
