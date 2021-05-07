<?php

declare(strict_types=1);

namespace App\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\YatzyController;

class ControllerYatzyTest extends TestCase
{
    protected function setUp(): void
    {
        $this->session = new Session(new MockArraySessionStorage());
        $this->request = new Request();
    }

    public function testCreateTheControllerClass()
    {
        $controller = new YatzyController();
        $this->assertInstanceOf("\App\Controller\YatzyController", $controller);
    }

    // public function testYatzyControllerReturnsResponse()
    // {
    //     $controller = new YatzyController();
        // $exp = "\Symfony\Component\HttpFoundation\Response";
    //     $res = $controller->start($this->session);
    //     $this->assertInstanceOf($exp, $res);

    //     $res = $controller->roll($this->request);
    //     $this->assertInstanceOf($exp, $res);

    //     $res = $controller->save($this->request);
    //     $this->assertInstanceOf($exp, $res);

    //     $res = $controller->reset();
    //     $this->assertInstanceOf($exp, $res);
    // }
}
