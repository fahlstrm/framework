<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Controller\Functions;

class SessionController extends AbstractController
{

    /**
     * @Route("/")
    */
    public function __invoke(SessionInterface $session): Response
    {
        return $this->render('session.twig', [
            'title' => 'Förstör sessionen',
            'message' => "Klicka på knappen för att förstöra sessionen",
            'nav' => Functions::$nav
            ]);
    }

    public function destroy(Request $request): Response
    {
        $session = $request->getSession->invalidate();
        return $this->render('index.twig', [
            'title' => 'Spel i Symfony',
            'message' => "Välj spel i navbaren",
            'nav' => Functions::$nav
        ]);
    }
}
