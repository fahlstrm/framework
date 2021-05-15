<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use PHPUnit\Framework\TestCase;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ControllerTwentyOneTest extends WebTestCase   
{
    // protected function setUp(): void
    // {
    //     $this->session = new Session(new MockArraySessionStorage());
    //     $callable = new GameYatzy(new DiceHand(5, new GameDice()));

    //     $this->session->set("yatzyObject", $callable);
    // }

    public function testStart(): void 
    {
        $client = static::createClient();
        $client->request('GET', '/twentyone');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
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
