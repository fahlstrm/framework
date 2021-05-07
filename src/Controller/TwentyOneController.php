<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\TwentyOne;
use App\Controller\TwentyOne\GameTwentyOne;
use App\Controller\TwentyOne\DiceHand;
use App\Controller\TwentyOne\GameDice;
use App\Controller\Functions;

class TwentyOneController extends AbstractController
{
    public function start(SessionInterface $session): Response
    {
        $callable = new GameTwentyOne();
        $session->clear();
        $session->set("twentyOneObject", $callable);

        $data = $callable->startGame();

        $session->set("continue", "play");
        $session->set("newGame", null);

        return $this->render('twentyone.twig', [
            'title' => 'TwentyOne',
            'nav' => Functions::$nav,
            'data' => $data
            ]);
    }

    public function play(SessionInterface $session, Request $request): Response
    {
        $callable = $this->get("session")->get("twentyOneObject");
        $session->set("newGame", null);
        $session->set("continue", "ongoing");
        $callable->createDices(intval($request->request->get("amount")));

        $data = $callable->playGamePlayer();

        return $this->render('twentyone.twig', [
            'title' => 'TwentyOne',
            'nav' => Functions::$nav,
            'data' => $data
            ]);
    }

    public function continue(Request $request): Response
    {
        $callable = $this->get("session")->get("twentyOneObject");
        $result = null;

        if (null !== $request->get("ongoing")) {
            $result = $callable->playGamePlayer();
        } else if (null !== $request->get("stop")) {
            $result = $callable->playGameComputer();
        } else if ($request->get("ongoing") == null && $request->get("stop") == null) {
            $result = [];
        }

        return $this->render('twentyone.twig', [
            'title' => 'TwentyOne',
            'nav' => Functions::$nav,
            'data' => $result,
            'result' => $result
            ]);
    }

    public function reset(): Response
    {
        $data = [
            "header" => "Spelet 21",
            "message" => "Välj antal tärningar",
        ];
        $callable = $this->get("session")->get("twentyOneObject");

        $callable->resetScore();
        $data = $callable->resetGame();

        return $this->render('twentyone.twig', [
            'title' => 'TwentyOne',
            'nav' => Functions::$nav,
            'data' => $data
            ]);
    }
}
