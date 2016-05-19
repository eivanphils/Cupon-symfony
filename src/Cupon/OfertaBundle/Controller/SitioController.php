<?php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SitioController extends Controller
{
    /**
     * @Route("/sitio/{pagina}/", name="pagina_estatica")
     */
    public function indexAction($pagina)
    {
        return $this->render('OfertaBundle:Sitio:'.$pagina.'.html.twig');
    }
}
