<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Controller\Functions;

class HighScoreController extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->render('highscore.twig', [
            'title' => 'HighScore',
            'message' => "För de två olika spelen",
            'nav' => Functions::$nav
            ]);
    }
}
