<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    // Constantes pour les références
    public const ROLE_USER = 'role-user';
    public const ROLE_ADMIN = 'role-admin';
    public const ROLE_MODERATOR = 'role-moderator';

    public function load(ObjectManager $manager): void
    {
        // Créer les 3 rôles
        $roles = [
            ['name' => 'ROLE_USER', 'ref' => self::ROLE_USER],
            ['name' => 'ROLE_ADMIN', 'ref' => self::ROLE_ADMIN],
            ['name' => 'ROLE_MODERATOR', 'ref' => self::ROLE_MODERATOR],
        ];

        foreach ($roles as $roleData) {
            $role = new Role();
            $role->setName($roleData['name']);

            $manager->persist($role);

            // Créer une référence pour l'utiliser dans UserFixtures
            $this->addReference($roleData['ref'], $role);
        }

        $manager->flush();
    }
}
