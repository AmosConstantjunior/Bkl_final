<?php

namespace App\Controller;

use App\Entity\FicheMaintenance;
use App\Form\FicheMaintenanceType;
use App\Repository\FicheMaintenanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fiche/maintenance")
 */
class FicheMaintenanceController extends AbstractController
{
    /**
     * @Route("/", name="fiche_maintenance_index", methods={"GET"})
     */
    public function index(FicheMaintenanceRepository $ficheMaintenanceRepository): Response
    {
        return $this->render('fiche_maintenance/index.html.twig', [
            'fiche_maintenances' => $ficheMaintenanceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fiche_maintenance_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ficheMaintenance = new FicheMaintenance();
        $form = $this->createForm(FicheMaintenanceType::class, $ficheMaintenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ficheMaintenance);
            $entityManager->flush();

            return $this->redirectToRoute('fiche_maintenance_index');
        }

        return $this->render('fiche_maintenance/new.html.twig', [
            'fiche_maintenance' => $ficheMaintenance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fiche_maintenance_show", methods={"GET"})
     */
    public function show(FicheMaintenance $ficheMaintenance): Response
    {
        return $this->render('fiche_maintenance/show.html.twig', [
            'fiche_maintenance' => $ficheMaintenance,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fiche_maintenance_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FicheMaintenance $ficheMaintenance): Response
    {
        $form = $this->createForm(FicheMaintenanceType::class, $ficheMaintenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fiche_maintenance_index');
        }

        return $this->render('fiche_maintenance/edit.html.twig', [
            'fiche_maintenance' => $ficheMaintenance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fiche_maintenance_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FicheMaintenance $ficheMaintenance): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ficheMaintenance->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ficheMaintenance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fiche_maintenance_index');
    }
}
