<?php

namespace App\Repository;

use App\Entity\Role;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Role>
 */
class RoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Role::class);
    }


    public function findAllOrdered(): array
    {
        return $this->createQueryBuilder('r')
            ->orderBy('r.name', 'ASC')
            ->getQuery()
            ->getResult();
    }


    public function findByName(string $name): ?Role
    {
        return $this->createQueryBuilder('r')
            ->where('r.name = :name')
            ->setParameter('name', $name)
            ->getQuery()
            ->getOneOrNullResult();
    }


    public function countUsersByRole(Role $role): int
    {
        return $this->createQueryBuilder('r')
            ->select('COUNT(u.id)')
            ->leftJoin('r.users', 'u')
            ->where('r.id = :roleId')
            ->setParameter('roleId', $role->getId())
            ->getQuery()
            ->getSingleScalarResult();
    }
}
