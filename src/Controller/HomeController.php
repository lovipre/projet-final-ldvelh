<?php

namespace App\Controller;

use App\Repository\CharacterRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('home.html.twig');
    }
    /**
     * @Route("/perso", name="character")
     */
    public function buildPerso(CharacterRepository $characterRepository)
    {
        $userId = $this->getUser()->getId();
        if ($characterRepository->findOneBy(['idUser' => $userId]))
        {
            return $this->redirectToRoute('adventure');
        }
        return $this->render('perso.html.twig');
    }

}
