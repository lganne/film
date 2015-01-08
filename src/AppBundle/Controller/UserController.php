<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function indexAction()
    {
        return $this->render('user/inscription.html.twig');
    }
}
