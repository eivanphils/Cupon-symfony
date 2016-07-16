<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/appbundle", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // multiple entities managers
        $emDefault = $this->get('doctrine')->getManager();

        $emCustomer = $this->get('doctrine')->getManager('customer');

        $ofertas = $emDefault->getRepository('OfertaBundle:Oferta')->findAll();

        $customers = $emCustomer->getRepository('AppBundle:Customer')->findAll();

        return $this->render('default/index.html.twig', [
            'ofertas' => $ofertas,
            'customers' => $customers
        ]);
    }
}
