<?php

namespace App\Service;

use App\Entity\Ad;
use App\Entity\Scooter;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PaymentHandler
{
    private const AD_PRICE = 3;

    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function createPaymentGateway(Request $request, $stripeSk, Ad $ad): Session
    {
        $id = $ad->getId();

        Stripe::setApiKey($stripeSk);
        $session = Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Skelbimo mokestis',
                    ],
                    'unit_amount' => self::AD_PRICE * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $this->urlGenerator->generate(
                'app_ad_success', ['id' => $id], UrlGeneratorInterface::ABSOLUTE_URL
            ),
            'cancel_url' => $this->urlGenerator->generate(
                'app_ad_cancel', ['id' => $id], UrlGeneratorInterface::ABSOLUTE_URL
            ),
        ]);

        return $session;
    }
}