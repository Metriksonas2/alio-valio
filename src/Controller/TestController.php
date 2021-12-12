<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index()
    {
        return $this->render('test/index.html.twig', []);
    }

    /**
     * @Route("/add/edit/{ad}", name="app_ad_edit")
     */
    public function edit($ad, Request $request)
    {
        if ($this->getUser())
        {
            return $this->redirectToRoute("app_");
        }
    }
}