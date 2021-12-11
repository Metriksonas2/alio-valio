<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdController extends AbstractController
{
    /**
     * @Route("/ad/new", name="app_new_ad")
     */
    public function new(Request $request)
    {
        return $this->render('ad/new.html.twig', []);
    }
}