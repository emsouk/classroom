<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Role;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class UserFixtures extends Fixture
{


    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $roleUser = $this->getReference(RoleFixtures::ROLE_USER, Role::class);
        $roleAdmin = $this->getReference(RoleFixtures::ROLE_ADMIN, Role::class);
        $roleModerator = $this->getReference(RoleFixtures::ROLE_MODERATOR, Role::class);

        $manager->flush();

        for ($i = 0; $i < 20; $i++) {



            $user = new User();
            $user->setEmail($faker->email());
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setRole(
                $faker->randomElement([$roleUser, $roleAdmin, $roleModerator])
            );

            $user->setPassword($faker->password(10, 20));
            $user->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->dateTime()));
            $user->setUpdatedAt(\DateTimeImmutable::createFromMutable($faker->dateTime()));
            $user->setIsActive($faker->boolean());
            $user->setFavoriteCourses($faker->randomElements(range(1, 50), $faker->numberBetween(0, 5)));



            $manager->persist($user);
        }

        $manager->flush();
    }
}
