<?php

declare(strict_types=1);

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use PHPUnit\Framework\TestCase;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Symfony\Component\HttpFoundation\Session\Session;

use App\Controller\Yatzy\GameDice;
use App\Controller\Yatzy\DiceHand;
use App\Controller\Yatzy\GameYatzy;

class ControllerYatzyTest extends WebTestCase extends TestCase
{
    private object $callable;
    protected $session;

    protected function setUp(): void
    {
        $this->session = new Session(new MockArraySessionStorage());
        $this->callable = new GameYatzy(new DiceHand(5, new GameDice()));
        $this->session->set("yatzyObject", $this->callable);
    }

    public function testStart(): void 
    {

        $client = static::createClient();
        $client->request('GET', '/yatzy');
    
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testRoll(): void 
    {
        $client = static::createClient();
        $client->request('POST', '/yatzy/roll');
        echo($this->session);
        $this->assertResponseIsSuccessful();
    }

    // public function testSave():void 
    // {
    //     $client = static::createClient();
    //     $client->request('POST', '/yatzy/reset');
    
    //     $this->assertEquals(200, $client->getResponse()->getStatusCode());
    // }
}