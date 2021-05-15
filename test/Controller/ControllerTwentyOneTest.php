<?php

declare(strict_types=1);

namespace App\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Functions;
use App\Controller\TwentyOneController;

class ControllerTwentyOneTest extends TestCase
{
    // protected function setUp(): void
    // {
    //     $this->session = new Session(new MockArraySessionStorage());
    //     $callable = new GameYatzy(new DiceHand(5, new GameDice()));

    //     $this->session->set("yatzyObject", $callable);
    // }

    public function testCreateTheControllerClass()
    {
        $controller = new TwentyOneController();
        $this->assertInstanceOf("\App\Controller\TwentyOneController", $controller);
        // $this->assertInstanceOf("Symfony\Bundle\FrameworkBundle\Controller\AbstractController", $controller);
    }

    // public function testTwentyOneControllerReturnsResponse()
    // {
    //     $controller = new TwentyOneController();

    //     $exp = "Symfony\Component\HttpFoundation\Response";
    //     $res = $controller->start($this->session);
    //     $this->assertInstanceOf($exp, $res);

    //     $res = $controller->play();
    //     $this->assertInstanceOf($exp, $res);

    //     $res = $controller->continue();
    //     $this->assertInstanceOf($exp, $res);

    //     $res = $controller->reset();
    //     $this->assertInstanceOf($exp, $res);
    // }

    // public function testContinueTwentyOne()
    // {
    //     $game = new TwentyOneController();
    //     $exp = "\Symfony\Component\HttpFoundation\Response";

    //     $_POST["ongoing"] = 1;
    //     $res = $game->continue();
    //     $this->assertInstanceOf($exp, $res);

    //     $_POST["ongoing"] = null;

    //     $_POST["stop"] = 1;
    //     $res = $game->continue();
    //     $this->assertInstanceOf($exp, $res);
    // }
}
