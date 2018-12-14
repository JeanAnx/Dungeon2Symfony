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

    /**
     * @Route("/game/{id}", requirements={"id"="\d+"})
     */
    public function show(CharacterRepository $repo, $id)
    {
        $character = $repo->find($id);

        /**
         * Si pas de perso trouvé en base, lève une exception, erreur 404
         */
        if (!$character) {
            throw $this->createNotFoundException();
        }

        return $this->render('game/hero.html.twig', [
            'character' => $character,
        ]);
    }
}
