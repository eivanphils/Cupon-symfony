<?php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/{ciudad}", defaults={"ciudad" = null}, name="portada")
     */
    public function indexAction($ciudad = null)
    {
        if(null == $ciudad)
        {
            $ciudad = $this->container->getParameter('cupon.ciudad_por_defecto');

            return new RedirectResponse(
                $this->generateUrl('portada',array('ciudad' => $ciudad))
            );
        }

        $em = $this->getDoctrine()->getManager();
        
        $oferta = $em->getRepository('OfertaBundle:Oferta')->findOfertaDelDia($ciudad);

        if (!$oferta)
        {
            throw $this->createNotFoundException('No se ha encontrado la oferta del dia en el ciudad seleccionada');

        }

        return $this->render('OfertaBundle:Default:index.html.twig',
            array('oferta' => $oferta)
        );


    }

    /**
     * @Route("/{ciudad}/ofertas/{slug}", name="oferta")
     */
    public function ofertaAction($ciudad, $slug)
    {
        $em = $this->getDoctrine()->getManager();

        $oferta = $em->getRepository('OfertaBundle:Oferta')->findOferta($ciudad, $slug);

        $relacionadas = $em->getRepository('OfertaBundle:Oferta')->findRelacionadas($ciudad);

        return $this->render('OfertaBundle:Default:detalle.html.twig',
            array(
                'oferta' => $oferta,
                'relacionadas' => $relacionadas
            ));
    }
}
