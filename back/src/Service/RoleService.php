<?php

namespace App\Service;

use App\Entity\Role;
use App\Repository\RoleRepository;
use Doctrine\ORM\EntityManagerInterface;

class RoleService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private RoleRepository $roleRepository
    ) {}


    public function getAllRoles(): array
    {
        return $this->roleRepository->findAll();
    }

    public function getRoleById(int $id): ?Role
    {
        return $this->roleRepository->find($id);
    }

    public function getRoleByName(string $name): ?Role
    {
        return $this->roleRepository->findOneBy(['name' => $name]);
    }


    public function createRole(string $name): Role
    {
        if ($this->roleRepository->findOneBy(['name' => $name])) {
            throw new \InvalidArgumentException('Role already exists');
        }

        $role = new Role();
        $role->setName($name);

        $this->entityManager->persist($role);
        $this->entityManager->flush();

        return $role;
    }

    public function updateRole(Role $role, array $data): Role
    {


        if (isset($data['name'])) {
            $role->setName($data['name']);
        }

        $this->entityManager->persist($role);
        $this->entityManager->flush();

        return $role;
    }



    public function deleteRole(Role $role): void
    {
        if ($role->getUsers()->count() > 0) {
            throw new \InvalidArgumentException('Cannot delete role with associated users');
        }

        $this->entityManager->remove($role);
        $this->entityManager->flush();
    }
}
