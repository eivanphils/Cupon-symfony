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

//    /**
//     * @Route("redirection", name="redirect_email")
//     */
//    public function redirectionEmailAction()
//    {
//
//    }

    /**
     * @Route("/sendemail/{name}", name="send_simple_email")
     */
    public function sendEmailAction($name)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('New account | Barcode Workshop')
            ->setFrom('not-reply@barcodeworkshop.com')
            ->setTo('eivanphils@gmail.com')
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'email/send.html.twig',
                    array('name' => $name)
                ),
                'text/html'
            );
        $this->get('mailer')->send($message);
                return $this->render(':email:index.html.twig');
    }
}
