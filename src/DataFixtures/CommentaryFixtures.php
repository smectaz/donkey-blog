<?php

namespace App\DataFixtures;

use App\Entity\Commentary;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CommentaryFixtures extends Fixture
{
    public const COMMENTARY_NAME = 'COMMENTARY_CONTENT';

    public function load(ObjectManager $manager): void
    {

        for ($i = 0; $i < 50; $i++) {
            $commentary = new Commentary();
            $commentary->setAuthor('author ' . $i);
            $commentary->setContent("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.");
            $this->setReference(self::COMMENTARY_NAME, $commentary);

            $manager->persist($commentary);

            $manager->flush();
        }
    }
}