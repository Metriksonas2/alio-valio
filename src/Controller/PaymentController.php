<?php

namespace App\Controller;

use App\Service\PaymentHandler;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PaymentController extends AbstractController
{
    /**
     * @Route("/checkout", name="app_checkout")
     */
    public function checkout(Request $request, PaymentHandler $paymentHandler, $stripeSk): Response
    {
        $price = $request->request->get('price');

        $session = $paymentHandler->createPaymentGateway($request, $stripeSk);

        return $this->redirect($session->url, 303);
    }
}
