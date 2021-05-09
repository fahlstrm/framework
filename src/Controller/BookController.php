<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class BookController extends AbstractController
{

    public function __invoke(): Response
    {

    }

    
    public function createBook(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $book = new Book();
        $book->setTitle()
    }

}