<?php

namespace App\Controller;

use App\Entity\Stuff;
use App\Entity\Character;
use App\Repository\CharacterRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AjaxController extends AbstractController
{
    /**                                                                                   
    * @Route("/ajax", name="_recherche_ajax")
    */
    public function ajaxAction(Request $request, ): Response 
    {

        if ($request->isXMLHttpRequest()) {
            $entityManager = $this->getDoctrine()->getManager();
            $character = new Character;
            $character->setAbility($request->request->get('ability'));
            $character->setStamina($request->request->get('stamina'));
            $character->setLuck($request->request->get('luck'));
            $character->setIntAbility($request->request->get('ability'));
            $character->setIntStamina($request->request->get('stamina'));
            $character->setIntLuck($request->request->get('luck'));
            $character->setIdUser($this->getUser());
            $entityManager->persist($character);
            $entityManager->flush();


            $stuff = new Stuff;
            $armor = ['Armure de cuir'];
            $weapon = ['Epee'];
            $potion = [$request->request->get('potion') => '2 charges'];
            $other = ['Lanterne'];
            $stuff->setArmors(json_encode($armor));
            $stuff->setWeapons(json_encode($weapon));
            $stuff->setOthers(json_encode($other));
            $stuff->setPotions(json_encode($potion));
            $stuff->setIdCharacter($character);
            $entityManager->persist($stuff);
            $entityManager->flush();

                               
            return new JsonResponse(array('data' => 'this is a json response'));
        }
    
        return new Response('This is not ajax!', 400);
    }

    /**                                                                                   
    * @Route("/ajax/luck", name="_test_luck_consequence")
    */
    public function ajaxTestLuck(CharacterRepository $characterRepository,Request $request): Response 
    {

        if ($request->isXMLHttpRequest()) {
            $entityManager = $this->getDoctrine()->getManager();
            $character = ($characterRepository->findLastId())[0];;
            $character->setIntLuck($request->request->get('luck'));
            $entityManager->persist($character);
            $entityManager->flush();                               
            return new JsonResponse(array('data' => 'this is a json response'));
        }
    
        return new Response('This is not ajax!', 400);
    }
}
