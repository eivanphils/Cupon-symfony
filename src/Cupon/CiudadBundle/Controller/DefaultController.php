<?php

namespace Cupon\CiudadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/ciudad")
     */
    public function indexAction()
    {
        return $this->render('CiudadBundle:Default:index.html.twig');
    }
}
