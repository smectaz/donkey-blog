<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ArticleFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 100; $i++) {
            $article = new Article();
            $article->setTitle('title ' . $i);
            $article->setContent("It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).");

            $article->setAuthor($this->getReference(AuthorFixtures::AUTHOR_NAME));
            $article->setCategory($this->getReference(CategoryFixtures::CATEGORY_NAME));
            $article->setCommentary($this->getReference(CommentaryFixtures::COMMENTARY_NAME));

            $manager->persist($article);
        }
        $manager->flush();

    }

    public function getDependencies()
    {
        return [
            AuthorFixtures::class,
            CategoryFixtures::class,
            CommentaryFixtures::class,
        ];
    }
}