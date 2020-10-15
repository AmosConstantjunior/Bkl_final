<?php

namespace App\Controller;

use App\Repository\TechniciensRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfilTechnicienController extends AbstractController
{
    /**
     * @Route("/profil/technicien", name="profil_technicien")
     */
    public function index( TechniciensRepository $techniciensRepository)
    {
        return $this->render('profil_technicien/index.html.twig', [
            'controller_name' => 'ProfilTechnicienController',
            'technicien' => $techniciensRepository->findAll(),
        ]);
    }
}
