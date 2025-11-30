<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['user:read', 'course:read', 'session:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    #[Groups(['user:read'])]
    private ?string $email = null;

    #[ORM\Column]
    // ⚠️ NE JAMAIS exposer le mot de passe dans l'API
    private ?string $password = null;

    #[ORM\Column(length: 50)]
    #[Groups(['user:read', 'course:read', 'session:read'])]
    private ?string $firstname = null;

    #[ORM\Column(length: 50)]
    #[Groups(['user:read', 'course:read', 'session:read'])]
    private ?string $lastname = null;

    #[ORM\Column]
    #[Groups(['user:read'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    #[Groups(['user:read'])]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column]
    #[Groups(['user:read'])]
    private ?bool $isActive = null;

    #[ORM\ManyToOne(inversedBy: 'users', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['user:read'])]
    private ?Role $role = null;

    /**
     * @var Collection<int, Course>
     */
    #[ORM\OneToMany(targetEntity: Course::class, mappedBy: 'teacherId')]
    #[Groups(['user:read:courses'])] // ← Groupe séparé pour éviter la circularité
    private Collection $courses;

    /**
     * @var Collection<int, Session>
     */
    #[ORM\ManyToMany(targetEntity: Session::class, mappedBy: 'students')]
    #[Groups(['user:read:sessions'])] // ← Groupe séparé pour éviter la circularité
    private Collection $sessions;

    /**
     * @var Collection<int, Course>
     */
    #[Groups(['user:read:courses'])]
    #[ORM\ManyToMany(targetEntity: Course::class, inversedBy: 'users')]
    private Collection $favoriteCourses;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
        $this->sessions = new ArrayCollection();
        $this->favoriteCourses = new ArrayCollection();
    }

    // ... (tous vos getters/setters restent identiques)

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): array
    {
        $roles = [];
        if ($this->role !== null) {
            $roles[] = $this->role->getName();
        }
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): static
    {
        $this->role = $role;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

    public function __serialize(): array
    {
        $data = (array) $this;
        $data["\0" . self::class . "\0password"] = hash('crc32c', $this->password);
        return $data;
    }

    public function eraseCredentials(): void
    {
        // Nothing to do
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;
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



    /**
     * @return Collection<int, Course>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): static
    {
        if (!$this->courses->contains($course)) {
            $this->courses->add($course);
            $course->setTeacherId($this);
        }
        return $this;
    }

    public function removeCourse(Course $course): static
    {
        if ($this->courses->removeElement($course)) {
            if ($course->getTeacherId() === $this) {
                $course->setTeacherId(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, Session>
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): static
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions->add($session);
            $session->addStudent($this);
        }
        return $this;
    }

    public function removeSession(Session $session): static
    {
        if ($this->sessions->removeElement($session)) {
            $session->removeStudent($this);
        }
        return $this;
    }

    /**
     * @return Collection<int, Course>
     */
    public function getFavoriteCourses(): Collection
    {
        return $this->favoriteCourses;
    }

    public function addFavoriteCourse(Course $favoriteCourse): static
    {
        if (!$this->favoriteCourses->contains($favoriteCourse)) {
            $this->favoriteCourses->add($favoriteCourse);
        }

        return $this;
    }

    public function removeFavoriteCourse(Course $favoriteCourse): static
    {
        $this->favoriteCourses->removeElement($favoriteCourse);

        return $this;
    }
}
