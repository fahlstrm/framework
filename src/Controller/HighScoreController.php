<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\HighScore;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class HighScoreController extends AbstractController
{
    public function __invoke(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $highScoreRepository = $this->getDoctrine()->getRepository(HighScore::class);

        $yatzy = $highScoreRepository->findAllGame("yatzy");
        $twentyone = $highScoreRepository->findAllGame("twentyone");

        return $this->render('highscore.twig', [
            'title' => 'HighScore',
            'message' => "",
            'nav' => Functions::$nav,
            'yatzy' => $yatzy ?? null,
            'twentyone' => $twentyone ?? null,
            ]);
    }

    public function save(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $highScore = new HighScore();
        $highScore->setPlayer($request->request->get("name") ?? null);
        $highScore->setScore($request->request->get("score"));
        $highScore->setGame($request->request->get("game"));

        $entityManager->persist($highScore);
        $entityManager->flush();

        return $this->redirectToRoute('highscore');
    }
}
