<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfilClientsController extends AbstractController
{
    /**
     * @Route("/profil/clients", name="profil_clients")
     */
    public function index()
    {
        return $this->render('profil_clients/index.html.twig', [
            'controller_name' => 'ProfilClientsController',
        ]);
    }
}
