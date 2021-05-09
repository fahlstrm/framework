<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\HighScoreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HighScoreRepository::class)
 */
class HighScore
{   
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $player;


    /**
     * @ORM\Column(type="integer")
     */
    protected $score;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $game;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayer(): ?string
    {
        return $this->player;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    
    public function getGame(): ?string
    {
        return $this->game;
    }

    
    public function setPlayer($player)
    {
        $this->player = $player;
    }

    
    public function setScore($score)
    {
        $this->score = $score;
    }

    public function setGame($game)
    {
        $this->game = $game;
    }
}