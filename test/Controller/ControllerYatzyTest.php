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

class ControllerYatzyTest extends WebTestCase
{
    // protected function setUp(): void
    // {
       
    //     // $this->callable = new GameYatzy(new DiceHand(5, new GameDice()));
    //     $this->callable = $this
    //         ->getMockBuilder('GameYatzy')
    //         ->getMock();
    // }

    public function testStart(): void 
    {
        $client = static::createClient();
        $client->request('GET', '/yatzy');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    // public function testRoll(): void 
    // {
    //     $client = static::createClient();
    //     $client->request('POST', '/yatzy/roll');
    //     var_dump($client->getResponse());
    //     $this->assertEquals(200, $client->getResponse()->getStatusCode());
    // }

    // public function testReset():void 
    // {
    //     $client = static::createClient();
    //     $client->request('POST', '/yatzy/reset');
    
    //     $this->assertEquals(200, $client->getResponse()->getStatusCode());
    // }
}