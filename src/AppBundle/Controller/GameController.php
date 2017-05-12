<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Game;
use AppBundle\Form\GameType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use \DateTime;

class GameController extends Controller
{
    /**
     * @Route("/ListGame")
     */
    public function ListGameAction(Request $request)
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $game = $em->getRepository('AppBundle:Game')->findByisFinished(0);
        $gam = new Game;
        $form = $this->createForm(GameType::class, $gam);

        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);
            $gam = $form->getData();

            if ( $form->isSubmitted() && $form->isValid()) {
                $em->persist($gam);
                $em->flush();

            }
            return $this->redirectToRoute('_list_game');
        }
        return $this->render('AppBundle:Game:list_game.html.twig', array('game' => $game , 'form' => $form->createView()
            // ...
        ));
    }

}
