<?php

namespace App\Controller;

use App\Entity\AttestationCqs;
use App\Repository\AttestationCqsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AttestationClientsController extends AbstractController
{
    /**
     * @Route("/attestation/clients", name="attestation_clients")
     */
    public function index(AttestationCqsRepository $attestationCqsRepository)
    {
        return $this->render('attestation_clients/index.html.twig', [
            'controller_name' => 'AttestationClientsController',
            'attestations' => $attestationCqsRepository->findAll(),

            
        ]);
    }
}
