<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\Yatzy\GameYatzy;
use App\Controller\Yatzy\DiceHand;
use App\Controller\Yatzy\GameDice;
use App\Controller\Functions;

class YatzyController extends AbstractController
{
    public function start(SessionInterface $session): Response
    {
        $callable = new GameYatzy(new DiceHand(5, new GameDice()));
        $session->set("yatzyObject", $callable);
        $data = $callable->startGame();

        return $this->render('yatzy.twig', [
            'title' => 'Yatzy',
            'nav' => Functions::$nav,
            'data' => $data
            ]);
    }

    public function roll(Request $request): Response
    {
        $callable = $this->get("session")->get("yatzyObject");
        $data = $callable->rollAgain($request->request->all(), $callable->diceHand->getLastRoll());

        return $this->render('yatzy.twig', [
            'title' => 'Yatzy',
            'nav' => Functions::$nav,
            'data' => $data
            ]);
    }

    public function save(Request $request): Response
    {
        $callable = $this->get("session")->get("yatzyObject");
        $data = $callable->updateScoreBoard($request->request->get("values") ?? null);

        return $this->render('yatzy.twig', [
            'title' => 'Yatzy',
            'nav' => Functions::$nav,
            'data' => $data
            ]);
    }

    public function reset(): Response
    {
        $callable = $this->get("session")->get("yatzyObject");
        $data = $callable->resetGame();

        return $this->render('yatzy.twig', [
            'title' => 'Yatzy',
            'nav' => Functions::$nav,
            'data' => $data
            ]);
    }
}
