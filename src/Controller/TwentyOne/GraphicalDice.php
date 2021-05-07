<?php

declare(strict_types=1);

namespace App\Controller\TwentyOne;

class GraphicalDice extends DiceTwentyOne
{
    const FACES = 6;

    public function __construct()
    {
        parent::__construct(self::FACES);
    }
}
