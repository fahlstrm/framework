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
        $querybuilder = $this->createQueryBuilder('h')
            ->where('h.game = :game')
            ->setParameter('game', $game)
            ->orderBy('h.score', 'DESC');
        $query = $querybuilder->getQuery();

        return $query->execute();
    }

}