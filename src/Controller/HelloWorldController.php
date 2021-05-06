<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorldController extends AbstractController
{
    public function helloMessage(): Response
    {
        return new Response(
            "Hello world, message only"
        );
    }

    public function helloMessageView(): Response
    {
        return $this->render('message.html.twig', [
            'message' => "Hello World in view",
        ]);
    }

    /**
     * @Route("/hello")
    */
    public function hello(): Response
    {
        $data = [
            "header" => "Spelet 21",
            // "message" => "Välj antal tärningar",
            // "playerScore" => $callable->getPlayerScore(),
            // "computerScore" => $callable->getComputerScore()
        ];

        return $this->render('message.html.twig', [
            'data' => $data,
            'message' => "Hello World as controller annotation",
        ]);
    }

    /**
     * @Route("/hello/{message}")
    */
    public function helloWithArgument(string $message): Response
    {
        return $this->render('message.html.twig', [
            'message' => $message,
        ]);
    }
}
