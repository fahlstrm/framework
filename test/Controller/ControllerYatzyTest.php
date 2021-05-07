<?php

declare(strict_types=1);

namespace App\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\YatzyController;


class ControllerYatzyTest extends TestCase
{
    public function testCreateTheControllerClass()
    {
        $controller = new YatzyController();
        $this->assertInstanceOf("\App\Controller\YatzyController", $controller);
    }

    public function testYatzyControllerReturnsResponse()
    {
        $controller = new YatzyController();
        $exp = "\Symfony\Component\HttpFoundation\Response";
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
