<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Repository\RoleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserRepository $userRepository,
        private RoleRepository $roleRepository,
        private UserPasswordHasherInterface $passwordHasher
    ) {}

    public function createUser(array $data): User
    {
        $this->validateUserData($data);

        if ($this->userRepository->findOneBy(['email' => $data['email']])) {
            throw new \InvalidArgumentException('Email already exists');
        }

        $role = $this->roleRepository->findOneBy(['name' => $data['role'] ?? 'ROLE_USER']);
        if (!$role) {
            throw new \InvalidArgumentException('Role not found');
        }

        $user = new User();
        $user->setEmail($data['email']);
        $user->setFirstname($data['firstname']);
        $user->setLastname($data['lastname']);
        $user->setPassword($this->passwordHasher->hashPassword($user, $data['password']));
        $user->setRole($role);
        $user->setCreatedAt(new \DateTimeImmutable());
        $user->setUpdatedAt(new \DateTimeImmutable());
        $user->setIsActive(true);


        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }


    public function updateUser(User $user, array $data): User
    {
        if (isset($data['email'])) {
            $existingUser = $this->userRepository->findOneBy(['email' => $data['email']]);
            if ($existingUser && $existingUser->getId() !== $user->getId()) {
                throw new \InvalidArgumentException('Email already exists');
            }
            $user->setEmail($data['email']);
        }

        if (isset($data['firstname'])) {
            $user->setFirstname($data['firstname']);
        }

        if (isset($data['lastname'])) {
            $user->setLastname($data['lastname']);
        }

        if (isset($data['password'])) {
            $user->setPassword($this->passwordHasher->hashPassword($user, $data['password']));
        }

        if (isset($data['role'])) {
            $role = $this->roleRepository->findOneBy(['name' => $data['role']]);
            if (!$role) {
                throw new \InvalidArgumentException('Role not found');
            }
            $user->setRole($role);
        }

        if (isset($data['isActive'])) {
            $user->setIsActive($data['isActive']);
        }

        $user->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->flush();

        return $user;
    }


    public function deleteUser(User $user): void
    {
        $user->setIsActive(false);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }


    public function getAllActiveUsers(): array
    {
        return $this->userRepository->findAllActive();
    }


    public function getUserByEmail(string $email): ?User
    {
        return $this->userRepository->findOneBy(['email' => $email]);
    }

    public function verifyUserCredentials(string $email, string $password): ?User
    {
        $user = $this->getUserByEmail($email);
        if ($user && $this->passwordHasher->isPasswordValid($user, $password)) {
            return $user;
        }
        return null;
    }


    private function validateUserData(array $data): void
    {
        $required = ['email', 'firstname', 'lastname', 'password'];
        foreach ($required as $field) {
            if (empty($data[$field])) {
                throw new \InvalidArgumentException("Field '$field' is required");
            }
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Invalid email format');
        }
    }
}
