<?php

declare(strict_types=1);

namespace App\Controller\TwentyOne;
use Psr\Log\LoggerInterface;

class DiceHandTwentyOne
{
    public array $dices;
    public int $sum = 0;

    public function __construct(int $amount, object $dice)
    {
        for ($i = 0; $i < $amount; $i++) {
            $this->dices[$i] = new $dice();
        }
    }

    public function roll(): int
    {
        $len = count($this->dices ?? []);

        for ($i = 0; $i < $len; $i++) {
            $this->sum += $this->dices[$i]->roll();
        }
        return $this->sum;
    }

    

    public function lastRoll(): string
    {
        $len = count($this->dices ?? []);
        $res = "";
        for ($i = 0; $i < $len; $i++) {
            $res .= $this->dices[$i]->getLastRoll() . ", ";
        }
        $res = substr($res, 0, -2);
        if ($res) {
            return $res;
        }
        return "";
    }
}
