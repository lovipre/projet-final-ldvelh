<?php

namespace App\Controller;

use App\Repository\ChaptersRepository;
use App\Repository\CharacterRepository;
use App\Repository\StuffRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdventureController extends AbstractController
{
    private $repository;

    public function __construct(ChaptersRepository $chaptersRepository)
    {
        $this->repository = $chaptersRepository;
    }
    /**
     * @Route("/adventure/{chapter}", name="adventure")
     */
    public function index(CharacterRepository $characterRepository, StuffRepository $stuffRepository, int $chapter = 1): Response
    {
        $chapters = $this->repository->findBy(['number' => $chapter]);
        $chapters = $chapters[0];
        if ($chapters->getOutWays() !== null)
        {
            $outWays = explode(',',$chapters->getOutWays());
        }
        else 
        {
            $outWays = "death";
        }
        $character = ($characterRepository->findLastId())[0];
        $stuff = ($stuffRepository->findLastId())[0];
        $weapons = json_decode($stuff->getWeapons());
        $armors = json_decode($stuff->getArmors());
        $consumables = json_decode($stuff->getConsumables());
        $golds = json_decode($stuff->getGold());
        $jewels = json_decode($stuff->getJewels());
        $keyItem = json_decode($stuff->getKeyItem());
        $potions = json_decode($stuff->getPotions());
        $others = json_decode($stuff->getOthers());
        
        return $this->render('adventure.html.twig', [
            'controller_name' => 'AdventureController',
            'chapters' => $chapters,
            'outWays' => $outWays,
            'character' => $character
        ]);
    }
}
