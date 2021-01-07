<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GuidesController extends AbstractController
{
    /**
     * @Route("/guides", name="guides")
     */
    public function index()
    {
        return $this->render('guides/index.html.twig', [
            'controller_name' => 'GuidesController',
        ]);
    }
}
