<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ControllerTwentyOneTest extends WebTestCase 
{
    public function testStart(): void
    {
        $client = static::createClient();
        $client->request('GET', '/twentyone');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
