<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="app_admin")
     */
    public function index(EntityManagerInterface $entityManager)
    {
        $users = array_reverse($entityManager->getRepository(User::class)->findAll());
        $ads = array_reverse($entityManager->getRepository(Ad::class)->findAll());

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'users' => count($users),
            'ads' => count($ads)
        ]);
    }
}
