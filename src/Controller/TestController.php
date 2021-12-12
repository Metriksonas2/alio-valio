<?php

namespace App\Controller;

use App\Entity\Ad;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index(EntityManagerInterface $entityManager)
    {
        if (!$this->getUser()) {
            return $this->render('test/guest.html.twig', []);
        }

        $ads = array_reverse($entityManager->getRepository(Ad::class)->findAll());

        return $this->render('test/index.html.twig', [
            'ads' => $ads
        ]);
    }
}