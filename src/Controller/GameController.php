<?php

namespace POE\Controller;

use POE\Repository\CharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game")
     */
    public function index(CharacterRepository $repo): Response
    {
        $characters = $repo->findAll();

        return $this->render('game/index.html.twig', [
            'characters' => $characters,
        ]);
    }
}
