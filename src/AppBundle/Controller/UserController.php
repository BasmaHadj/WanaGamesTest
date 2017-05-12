<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends Controller
{
    /**
     * @Route("/ListUser")
     */
    public function ListUserAction()
    {
        return $this->render('AppBundle:User:list_user.html.twig', array(
            // ...
        ));
    }

}
