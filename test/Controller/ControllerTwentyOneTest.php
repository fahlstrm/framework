<?php

declare(strict_types=1);

namespace App\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\TwentyOneController;

class ControllerTwentyOneTest extends TestCase
{
    public function testCreateTheControllerClass()
    {
        $controller = new TwentyOneController();
        $this->assertInstanceOf("\App\Controller\TwentyOneController", $controller);
    }

    public function testTwentyOneControllerReturnsResponse()
    {
        $controller = new TwentyOneController();

        $exp = "\Symfony\Component\HttpFoundation\Response";
        $res = $controller->start();
        $this->assertInstanceOf($exp, $res);

        $res = $controller->play();
        $this->assertInstanceOf($exp, $res);

        $res = $controller->continue();
        $this->assertInstanceOf($exp, $res);

        $res = $controller->reset();
        $this->assertInstanceOf($exp, $res);
    }

    public function testContinueTwentyOne()
    {
        $game = new TwentyOneController();
        $exp = "\Symfony\Component\HttpFoundation\Response";

        $_POST["ongoing"] = 1;
        $res = $game->continue();
        $this->assertInstanceOf($exp, $res);

        $_POST["ongoing"] = null;

        $_POST["stop"] = 1;
        $res = $game->continue();
        $this->assertInstanceOf($exp, $res);
    }
}
