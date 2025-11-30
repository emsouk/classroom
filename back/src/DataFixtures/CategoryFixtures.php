<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends Fixture
{
    // ✅ Constante pour les références
    public const CATEGORY_REFERENCE = 'category_';

    public function load(ObjectManager $manager): void
    {
        $categories = [
            'Php',
            'Javascript',
            'NodeJS',
            'MySQL',
            'React',
            'Angular',
            'Symfony',
            'Laravel',
            'Docker',
            'DevOps'
        ];

        foreach ($categories as $index => $categoryName) {
            $category = new Category();
            $category->setName($categoryName);
            $category->setIsActive(true);

            $manager->persist($category);

            // ✅ Ajouter la référence
            $this->addReference(self::CATEGORY_REFERENCE . $index, $category);
        }

        $manager->flush();
    }
}
