<?php

declare(strict_types=1);

namespace App\Controller\TwentyOne;

class DiceTwentyOne
{
    public int $roll;
    private int $faces;

    public function __construct(int $faces = 6)
    {
        $this->faces = $faces;
    }

    public function roll(): int
    {
        $this->roll = rand(1, 6);
        return $this->roll;
    }

    public function getLastRoll(): int
    {
        return $this->roll;
    }
}
