<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Course;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserCourseFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            CourseFixtures::class,
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Ajouter des cours favoris aux utilisateurs
        for ($i = 0; $i < 20; $i++) {
            /** @var User $user */
            $user = $this->getReference(UserFixtures::USER_REFERENCE . $i, User::class);

            // Ajouter 0 à 5 cours favoris par utilisateur
            $numberOfFavorites = $faker->numberBetween(0, 5);
            
            if ($numberOfFavorites > 0) {
                $courseIndexes = $faker->randomElements(range(0, 49), $numberOfFavorites);

                foreach ($courseIndexes as $courseIndex) {
                    /** @var Course $course */
                    $course = $this->getReference(
                        CourseFixtures::COURSE_REFERENCE . $courseIndex,
                        Course::class
                    );
                    $user->addFavoriteCourse($course);
                }
            }
        }

        $manager->flush();
    }
}
