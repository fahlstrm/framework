<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Functions;

class HomeController extends AbstractController
{
    public array $nav =  [
        '21' => [
            'name' => '21',
            'url' => 'hello'
        ],
        'yatzy' => [
            'name' => 'Yatzy',
            'url' => 'yatzy'
        ],
        'session' => [
            'name' => "Session",
            'url' => 'session'
        ]
        ];
    /**
     * @Route("/")
    */
    public function __invoke(): Response
    {

        return $this->render('index.twig', [
            'title' => 'Spel i Symfony',
            'message' => "Välj spel i navbaren",
            'nav' => Functions::$nav
            ]);
    }
}
