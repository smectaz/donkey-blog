<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ArticleRepository;
use Knp\DoctrineBehaviors\Model\Sluggable\SluggableTrait;
use Knp\DoctrineBehaviors\Contract\Entity\SluggableInterface;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article implements SluggableInterface
{
    use SluggableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    private $content;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $createdDate;

    #[ORM\ManyToOne(targetEntity: author::class, inversedBy: 'articles')]
    private $author;

    #[ORM\ManyToOne(targetEntity: category::class, inversedBy: 'articles')]
    private $category;

    #[ORM\ManyToOne(targetEntity: commentary::class, inversedBy: 'articles')]
    private $commentary;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSluggableFields(): array
    {
        return ['title'];
    }

    public function generateSlugValue($values): string
    {
        return strtolower(implode('-', $values));
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->createdDate;
    }

    public function setCreatedDate(?\DateTimeInterface $createdDate): self
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getAuthor(): ?author
    {
        return $this->author;
    }

    public function setAuthor(?author $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getCategory(): ?category
    {
        return $this->category;
    }

    public function setCategory(?category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCommentary(): ?commentary
    {
        return $this->commentary;
    }

    public function setCommentary(?commentary $commentary): self
    {
        $this->commentary = $commentary;

        return $this;
    }
}
