<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findAll(): array
    {
        return $this->createQueryBuilder('user')
            // ->select($this->fieldsList())
            ->where('user.isActive = :active')
            // ->andWhere('animal.isVisible = :visible')
            ->setParameter('active', true)
            // ->setParameter('visible', true)
            ->orderBy('user.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findById(int $id): User
    {
        return $this->createQueryBuilder('user')
            ->where('user.id = ::id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

    public function login(string $email, string $password): mixed
    {

        $result  = $this->createQueryBuilder('user')
            ->where('user.email = :email')
            ->andWhere('user.password = :password')
            ->setParameter('email', $email)
            ->setParameter('password', $password)
            ->getQuery()
            ->getResult();

        return $result ?? ['message' => 'Invalid credentials'];
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }
}
