<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    public const AUTHOR_NAME = 'AUTHOR_MARIE';

    public function load(ObjectManager $manager): void
    {
        $nameAuthor = [
            "tintin" => "et milou",
            "asterix" => "le gaulois",
            "obelix" => "je suis pas gros",
            "christine" => "lagarde",
            "marie" => "curie",
            "martine" => "va a a la plage",
        ];

        foreach ($nameAuthor as $key => $value) {
            $author = new Author();
            $author->setFirstName($key);
            $author->setLastName($value);
            $this->setReference(self::AUTHOR_NAME, $author);

            $manager->persist($author);
        }
        $manager->flush();
    }
}