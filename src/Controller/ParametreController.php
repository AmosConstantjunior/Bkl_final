<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ParametreController extends AbstractController
{
    /**
     * @Route("/parametre", name="parametre")
     */
    public function index()
    {
        $user = $this->getUser();
        return $this->render('parametre/index.html.twig', [
            'controller_name' => 'ParametreController',
            'utilisateur' => $user
        ]);
    }
}
