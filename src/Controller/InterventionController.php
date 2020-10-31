<?php

namespace App\Controller;

use App\Repository\FicheMaintenanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InterventionController extends AbstractController
{
    /**
     * @Route("/intervention", name="intervention")
     */
    public function index(FicheMaintenanceRepository $ficheMaintenanceRepository)
    {
        $user = $this->getUser();
        return $this->render('intervention/index.html.twig', [
            'controller_name' => 'InterventionController',
            'fiche_maintenances' => $ficheMaintenanceRepository->findAll(),
            'utilisateur' => $user,
        ]);
    }
}
