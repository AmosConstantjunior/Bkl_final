<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MessagerieClientController extends AbstractController
{
    /**
     * @Route("/messagerie/client", name="messagerie_client")
     */
    public function index()
    {
        return $this->render('messagerie_client/index.html.twig', [
            'controller_name' => 'MessagerieClientController',
        ]);
    }
}
