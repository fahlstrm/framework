<?php

declare(strict_types=1);

namespace App\Controller\TwentyOne;

class GameTwentyOne
{
    private int $computerScore;
    private int $playerScore;
    public object $playersDice;
    public object $computersDice;
    public array $data;

    public function __construct()
    {
        $this->computerScore = 0;
        $this->playerScore = 0;
    }

    public function startGame(): array
    {
        $this->resetGame();
        $this->data = [
            "header" => "Börja spelet",
            "message" => "Välj antal tärningar att spela med",
            "winner" => null,
            "playersScore" => $this->playerScore,
            "computerScore" => $this->computerScore,
            "player" => null,
            "playersum" => null,
            "amount" => null
        ];
        $data = $this->mergeData($this->data);
        return $data;
    }

    public function playGamePlayer(): array
    {
        $data = [];
        $this->playersDice->roll();
        $data["player"] = $this->playersDice->lastRoll();
        $data["playersum"] = $this->playersDice->sum;
        $data["header"] = "Kom igen då!";
        $data["message"] = "Klicka på fortsätt om du vill slå igen";

        if ($data["playersum"] == 21 || $data["playersum"] > 21) {
            if ($data["playersum"] == 21) {
                $data["winner"] = "Grattis!";
                $data["computersum"] = "Datorn behövde inte slå";
                $this->setScore("player");
            } else if ($data["playersum"] > 21) {
                $data["winner"] = "Du har förlorat, trist!";
                $data["computersum"] = "Datorn behövde inte slå";
                $this->setScore("computer");
            }
            $data["gameover"] = 1;
            $this->resetGame();
            $data["message"] = "Välj antal tärningar om du vill starta ny omgång";
        }
        $result = $this->mergeData($data);
        return $result;
    }

    public function playGameComputer(): array
    {
        $data = [];
        $pSum = $this->playersDice->sum;
        $winner = null;

        while ($this->computersDice->sum < $pSum) {
            $this->computersDice->roll();
        }
        $cSum = $this->computersDice->sum;
        if ($cSum > $pSum && $cSum <= 21 || $cSum == $pSum) {
            $data["gameover"] = 1;
            $winner = "Datorn vann! Du förlorade";
            $this->setScore("computer");
        } else if ($cSum > $pSum && $cSum > 21) {
            $data["gameover"] = 1;
            $winner = "Grattis! Du vann!";
            $this->setScore("player");
        }
        $data["gameover"] = 1;
        $this->resetGame();
        $data["header"] = "Nytt spel?";
        $data["message"] = "Välj antal tärningar om du vill starta ny omgång";
        $data["winner"] = $winner;
        $data["computersum"] = $cSum;
        $data["playersum"] = $pSum;
        $data["player"] = $this->playersDice->sum;
        $data = $this->mergeData($data);
        return $data;
    }


    public function setScore($winner): int
    {
        if ($winner == "computer") {
            $this->computerScore += 1;
            return $this->computerScore;
        }
        $this->playerScore += 1;
        return $this->playerScore;
    }

    public function getPlayerScore(): int
    {
        return $this->playerScore;
    }

    public function getComputerScore(): int
    {
        return $this->computerScore;
    }


    public function resetGame(): array
    {
        $this->data = [
            "computersum" => null,
            "playersum" => null,
            "gameOver" => null,
            "continue" => "play",
            "newGame" => true,
            "header" => "Spela 21",
            "message" => "Välj antal tärningar",
            "playerScore" => 0,
            "computerScore" => 0,
            "amount" => null
        ];
 
        return $this->data;
    }

    public function resetScore(): void
    {
        $this->computerScore = 0;
        $this->playerScore = 0;
        $this->resetGame();
    }


    public function createDices($amount): void
    {
        $this->data["amount"] = $amount;
        $this->playersDice = new DiceHandTwentyOne(intval($amount), new DiceTwentyOne());
        $this->computersDice = new DiceHandTwentyOne(intval($amount), new DiceTwentyOne());
    }


    public function mergeData($data): array
    {
        // var_dump($this->data);
        $default = [
            "playerScore" => $this->playerScore,
            "computerScore" => $this->computerScore,
            "amount" => $this->data["amount"] ?? 0
        ];

        $data = array_merge($data, $default);
        return $data;
    }
}
