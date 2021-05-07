<?php

/*
* Interface what a dice should contain
*/

declare(strict_types=1);

namespace App\Controller\Yatzy;

interface DiceInterface
{
    public function __construct(int $amount, object $dice);
    public function roll();
    public function getLastRoll();
}
