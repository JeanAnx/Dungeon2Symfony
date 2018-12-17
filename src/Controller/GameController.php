<?php

namespace POE\Controller;

use POE\Entity\Character;
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
    public function show(Character $character)
    {
        return $this->render('game/hero.html.twig', [
            'character' => $character,
        ]);
    }

    /**
     * @Route("/game/fight")
     */
    public function fight(CharacterRepository $repo , Character $attacker, Character $defender )
    {

        $attacker = $repo->find(21);
        $defender = $repo->find(22);

        $actions = [];

        $attackerDice = random_int(1,100);
        $defenderDice = random_int(1,100);

        while (true) {

            if ($attackerDice > $defenderDice) {
                $defender->wound($attacker->attack);
                array_push($actions, $attacker . ' frappe ' . $defender . ' avec sa lourde épée');
                array_push($actions, $defender . ' perd ' . $attacker->attack);
            }

        }


        return $this->render('game/fight', ['actions' => $actions ,
            'attacker' => $attacker ,
            'defenser' => $defender,
        ]);
    }
}
