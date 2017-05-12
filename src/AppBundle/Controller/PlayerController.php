<?php

namespace AppBundle\Controller;

use AppBundle\Form\PlayerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Player;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use \DateTime;
class PlayerController extends Controller
{
    /**
     * @Route("/ListPlayer",name="ListPlayer")
     * @Method({ "POST","GET"})
     */
    public function ListPlayerAction(Request $request)
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $allPlayer= $em->getRepository('AppBundle:Player')->findAll();




        $name=$request->get('name');
        $player = $em->getRepository('AppBundle:Player')->findJouerByName($name);

        return $this->render('AppBundle:Player:list_player.html.twig', array('player' => $player,'allPlayer'=>$allPlayer
            // ...
        ));
    }


    /**
     * @Route("/UpdatePlayer/{id}",name="UpdatePlayer")
     */
    public function UpdatePlayerAction($id ,Request $request) {
        $em = $this->getdoctrine()->getManager();
        $Play= $em->getRepository('AppBundle:Player')->find($id);
        $form = $this->createForm(PlayerType::class, $Play);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('_list_player'));
            }
        }

        return $this->render('AppBundle:Player:update_player.html.twig', array('form' => $form->createView()));
    }



    /**
     * @Route("/delPlayer/{id}",name="delPlayer")
     */
    public function delPlayerAction($id ,Request $request) {
        $em = $this->getdoctrine()->getManager();
        $player= $em->getRepository('AppBundle:Player')->find($id);
        $em->remove($player);
        $em->flush();
        return $this->redirectToRoute('ListPlayer');

    }



    /**
     * @Route("/ListPartieJouer",name="ListPartieJouer")
     *
     */
    public function ListPartieJouerAction(Request $request)
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $allPlayer= $em->getRepository('AppBundle:Player')->findAll();
        $allGame = $em->getRepository('AppBundle:Game')->findAll();

        if ($request->getMethod() == 'POST') {
            $allGame = $em->getRepository('AppBundle:PlayerGames')->findByPlayer($request->get('player'));
            return $this->render('AppBundle:Player:list_partie_jouer.html.twig', array('allPlayer'=>$allPlayer, 'allGame' => $allGame->get
                // ...
            ));
        }

        $name=$request->get('name');
        $player = $em->getRepository('AppBundle:Player')->findJouerByName($name);

        return $this->render('AppBundle:Player:list_partie_jouer.html.twig', array('allPlayer'=>$allPlayer, 'allGame' => $allGame
            // ...
        ));
    }


}
