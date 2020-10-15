<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MessagerieAdminController extends AbstractController
{
    /**
     * @Route("/messagerie/admin", name="messagerie_admin")
     */
    public function index()
    {
        return $this->render('messagerie_admin/index.html.twig', [
            'controller_name' => 'MessagerieAdminController',
        ]);
    }
}
