<?php

declare(strict_types=1);

namespace App\Controller\Test;

use PHPUnit\Framework\TestCase;
use App\Controller\Yatzy\GameDice;
use App\Controller\Yatzy\DiceHand;

class YatzyDiceHandTest extends TestCase
{
    /**
     * Testing functions of DiceHand in Yatzy game
     */
    private object $diceHand;

    protected function setUp(): void
    {
        $this->diceHand = new DiceHand(5, new GameDice());
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
