<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Book
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $title;

    /**
     * @ORM\Column(type="integer")
     */
    protected $isbn;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $author;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getIsbn(): ?int
    {
        return $this->isbn;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setIbsn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

}