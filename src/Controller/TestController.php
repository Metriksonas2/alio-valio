<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Service\Ad\AdConfigService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index(Request $request, AdConfigService $adConfigService, EntityManagerInterface $entityManager)
    {
        if (!$this->getUser()) {
            return $this->render('test/guest.html.twig', []);
        }

        $adRepository = $entityManager->getRepository(Ad::class);

        $ads = $adConfigService->getAdsForHomePage($request, $adRepository);
        $ads = array_reverse($ads);

        return $this->render('test/index.html.twig', [
            'ads' => $ads
        ]);
    }
}