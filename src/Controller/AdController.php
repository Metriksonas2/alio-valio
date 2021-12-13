<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Entity\Scooter;
use App\Enumerable\PartEnumType;
use App\Form\ScooterNewFormType;
use App\Service\Ad\AdConfigService;
use App\Service\PaymentHandler;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdController extends AbstractController
{
    /**
     * @Route("/ad/new", name="app_ad_new")
     */
    public function new(Request $request, AdConfigService $adConfigService,
                        PaymentHandler $paymentHandler, EntityManagerInterface $entityManager, $stripeSk)
    {
        $scooter = new Scooter();
        $form = $this->createForm(ScooterNewFormType::class, $scooter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $uploadsDirectory = $this->getParameter('uploads_directory');
            $ad = $adConfigService->createAdObject($request, $user, $scooter);
            $file = $request->files->get('scooter_new_form')['image'];

            $scooter->setAd($ad);
            $scooter->setDateOfManufacture(new \DateTime('2018-08-24'));
            $adConfigService->imageUpload($scooter, $file, $uploadsDirectory);

            $entityManager->persist($scooter);
            $entityManager->persist($ad);
            $entityManager->flush();

            $session = $paymentHandler->createPaymentGateway($request, $stripeSk, $ad);

            return $this->redirect($session->url, 303);
        }
        return $this->render('ad/new.html.twig', [
            'scooterForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/ad/success", name="app_ad_success")
     */
    public function success(Request $request)
    {
        $id = $request->query->get('id');

        $this->addFlash('success', 'Skelbimas pridėtas sėkmingai!');
        return $this->redirectToRoute('app_ad_view', [
            'ad' => $id
        ]);
    }

    /**
     * @Route("/ad/cancel", name="app_ad_cancel")
     */
    public function cancel(Request $request, EntityManagerInterface $entityManager)
    {
        $id = $request->query->get('id');
        $ad = $entityManager->getRepository(Ad::class)->find($id);
        $entityManager->remove($ad);
        $entityManager->flush();

        $this->addFlash('error', 'Įvyko klaida atliekant mokėjimą');
        return $this->redirectToRoute('app_index');
    }

    /**
     * @Route("/ad/{ad}", name="app_ad_view")
     */
    public function view(Request $request, Ad $ad, AdConfigService $adConfigService, PartEnumType $partEnumType)
    {
        $scooter = $ad->getScooter();

        return $this->render('ad/view.html.twig', [
            'ad' => $ad,
            'scooter' => $scooter,
            'partType' => $partEnumType->getType($scooter->getPartType()) ?? 'Ne dalis'
        ]);
    }
}