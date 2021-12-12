<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Entity\Scooter;
use App\Form\ScooterNewFormType;
use App\Service\Ad\AdConfigService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdController extends AbstractController
{
    /**
     * @Route("/ad/new", name="app_new_ad")
     */
    public function new(Request $request, AdConfigService $adConfigService, EntityManagerInterface $entityManager)
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

            $this->addFlash('success', 'Skelbimas pridėtas sėkmingai!');
            return $this->redirectToRoute('app_index');
        }
        return $this->render('ad/new.html.twig', [
            'scooterForm' => $form->createView()
        ]);
    }
}