<?php

namespace Cupon\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/usuario")
     */
    public function indexAction()
    {
        return $this->render('UsuarioBundle:Default:index.html.twig');
    }
}
