<?php

declare(strict_types=1);

namespace App\Controller\Test;

use PHPUnit\Framework\TestCase;
use App\Controller\TwentyOne\DiceTwentyOne;
use App\Controller\TwentyOne\DiceHandTwentyOne;


class TwentyoneDiceHandTest extends TestCase
{
    /**
     * Testing functions of DiceHand in Yatzy game
     */
    private object $diceHand;

    protected function setUp(): void
    {
        $this->diceHand = new DiceHandTwentyOne(5, new DiceTwentyOne());
    }

    /**
     * Test to roll hand
     */
    public function testRollHandTwentyOne()
    {
        $res = $this->diceHand->roll();
        $this->assertIsInt($res);
    }

    /**
     * test that last roll returning string
     */
    public function testLastRollTwentyOne()
    {
        $this->diceHand->roll();
        $res = $this->diceHand->lastRoll();
        $this->assertIsString($res);
    }
}
