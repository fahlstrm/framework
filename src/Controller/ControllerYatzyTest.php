<?php 

declare(strict_types=1);

namespace App\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use \Frah\YatzyGame;

class ControllerYatzyTest extends TestCase
{
    public function testCreateTheControllerClass()
    {
        $controller = new Yatzy();
        $this->assertInstanceOf("\Mos\Controller\Yatzy", $controller);
    }

    public function testYatzyControllerReturnsResponse()
    {
        $controller = new Yatzy();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->start();
        $this->assertInstanceOf($exp, $res);

        $res = $controller->roll();
        $this->assertInstanceOf($exp, $res);

        
        $res = $controller->save();
        $this->assertInstanceOf($exp, $res);

        
        $res = $controller->reset();
        $this->assertInstanceOf($exp, $res);
    }
}