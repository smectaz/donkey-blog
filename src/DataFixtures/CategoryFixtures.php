<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{

    public const CATEGORY_NAME = 'CATEGORY_NAME';

    public function load(ObjectManager $manager): void
    {
        $categories = [
            'actualité',
            'sport',
            'informatique',
            'fait divers',
            'divertissement',
            'people',
        ];

        foreach ($categories as $value) {
            $category = new Category();
            $category->setName($value);
            $this->setReference(self::CATEGORY_NAME, $category);
            $manager->persist($category);
        }

        $manager->flush();
    }
}