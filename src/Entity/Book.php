<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
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
     * @ORM\Column(type="string", length=15)
     */
    protected $isbn;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $author;

    /**
     * @ORM\Column(type="string", length=250)
     */
    protected $image;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

}