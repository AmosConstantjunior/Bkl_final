<?php

namespace App\Controller;

use App\Repository\FicheMaintenanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(FicheMaintenanceRepository $ficheMaintenanceRepository)
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'fiche_maintenances' => $ficheMaintenanceRepository->findAll()
        ]);
    }
}
