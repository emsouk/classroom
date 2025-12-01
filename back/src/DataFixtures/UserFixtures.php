<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Role;
use App\Entity\User;
use App\Entity\Course;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public const USER_REFERENCE = 'user_';

    public function getDependencies(): array
    {
        return [
            RoleFixtures::class,
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        
        // ✅ Récupérer les rôles avec la bonne référence
        /** @var Role $roleUser */
        $roleUser = $this->getReference(RoleFixtures::ROLE_USER, Role::class);

        /** @var Role $roleAdmin */
        $roleAdmin = $this->getReference(RoleFixtures::ROLE_ADMIN, Role::class);

        /** @var Role $roleModerator */
        $roleModerator = $this->getReference(RoleFixtures::ROLE_MODERATOR, Role::class);



        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setEmail($faker->unique()->email());  // ✅ unique() pour éviter les doublons
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setRole(
                $faker->randomElement([$roleUser, $roleAdmin, $roleModerator])
            );

            // ✅ Utiliser password_hash pour un vrai mot de passe
            $user->setPassword(password_hash('password123', PASSWORD_BCRYPT));

            $user->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->dateTime()));
            $user->setUpdatedAt(\DateTimeImmutable::createFromMutable($faker->dateTime()));
            $user->setIsActive($faker->boolean(80));  // 80% de chance d'être actif

            $manager->persist($user);
            $this->addReference(self::USER_REFERENCE . $i, $user);
        }

        $manager->flush();
    }
}
