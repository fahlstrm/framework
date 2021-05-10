<?php

namespace App\Repository;

use App\Entity\HighScore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class HighScoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HighScore::class);
    }

    /**
     * @return HighScore[]
     */
    public function findAllGame($game): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT h
            FROM App\Entity\Highscore h
            WHERE h.game = :game
            ORDER BY h.score DESC'
        )->setParameter('game', $game);

        // returns an array of Highscore objects
        return $query->getResult();
    }

}