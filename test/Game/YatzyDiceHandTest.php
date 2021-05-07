<?php

declare(strict_types=1);

namespace App\Controller\Test;

use PHPUnit\Framework\TestCase;
use App\Controller\TwentyOne\DiceTwentyOne;
use App\Controller\TwentyOne\DiceHandTwentyOne;


class YatzyDiceHandTest extends TestCase
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
     * Test that roll is correctly made
     */
    public function testRollDiceHand()
    {
        $res = $this->diceHand->roll();
        $this->assertIsArray($res);
    }

    /**
     * Test that last roll returns array
     */
    public function testGetLastRollGameDice()
    {
        $this->diceHand->roll();
        $res = $this->diceHand->getLastRoll();
        $this->assertIsArray($res);
    }
}
