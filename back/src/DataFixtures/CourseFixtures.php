<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Course;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CourseFixtures extends Fixture implements DependentFixtureInterface
{


    public const COURSE_REFERENCE = 'course_';
    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
            UserFixtures::class,
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $course = new Course();
            $course->setTitle($faker->sentence(3));

            // ✅ Récupérer une catégorie aléatoire (0 à 9)
            $categoryIndex = $faker->numberBetween(0, 9);
            $category = $this->getReference(CategoryFixtures::CATEGORY_REFERENCE . $categoryIndex, Category::class);
            
            // ✅ Récupérer un utilisateur aléatoire comme enseignant (0 à 19)
            $teacherIndex = $faker->numberBetween(0, 19);
            $teacher = $this->getReference(UserFixtures::USER_REFERENCE . $teacherIndex, \App\Entity\User::class);
            
            $course->setTeacherId($teacher);
            $course->setCategory($category);
            $course->setContent($faker->paragraphs(3, true));
            $course->setIsActive($faker->boolean(90));
            

            $course->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->dateTime()));
            $course->setUpdatedAt(\DateTimeImmutable::createFromMutable($faker->dateTime()));

            $manager->persist($course);
            $this->addReference(self::COURSE_REFERENCE . $i, $course);
        }

        $manager->flush();
    }
}
