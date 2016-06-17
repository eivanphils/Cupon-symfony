<?php

namespace Cupon\CiudadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/ciudad")
     */
    public function indexAction()
    {
        return $this->render('CiudadBundle:Default:index.html.twig');
    }

//    /**
//     * @Route("/ciudad/cambiar-a-{ciudad}")
//     */
    public function cambiarAction($ciudad)
    {
        return new RedirectResponse($this->generateUrl('portada',
            array(
                'ciudad' => $ciudad)
        ));
    }

    public function listaCiudadesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ciudades = $em->getRepository('CiudadBundle:Ciudad')->findAll();

        return $this->render('CiudadBundle:Default:listaCiudades.html.twig',
            array(
                'ciudades' => $ciudades)
        );
    }

    /**
     * @Route("/{ciudad}/recientes", name="recientes")
     */
    public function recientesAction($ciudad)
    {
        $em = $this->getDoctrine()->getManager();

        $ciudad = $em->getRepository('CiudadBundle:Ciudad')->findOneBySlug($ciudad);

        $cercanas = $em->getRepository('CiudadBundle:Ciudad')->findCercanas($ciudad->getId());

        $ofertas = $em->getRepository('OfertaBundle:Oferta')->findRecientes($ciudad->getId());

        return $this->render('CiudadBundle:Default:recientes.html.twig',
            array(
                'ciudad' => $ciudad,
                'cercanas' => $cercanas,
                'ofertas' => $ofertas
            )
        );

    }
}
