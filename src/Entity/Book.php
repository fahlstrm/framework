<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

class Book
{
    protected $id;
    protected $title;
    protected $isbn;
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