<?php

namespace App\Controller;

use App\Entity\Ateliers;
use App\Entity\Clients;
use App\Entity\FicheMaintenance;
use App\Form\FicheMaintenanceType;
use App\Repository\FicheMaintenanceRepository;

use DateTimeInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

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
        $user = $this->getUser();
        return $this->render('fiche_maintenance/index.html.twig', [
            'fiche_maintenances' => $ficheMaintenanceRepository->findAll(),
            'utilisateur' => $user,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/new", name="fiche_maintenance_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = $this->getUser();
        $ficheMaintenance = new FicheMaintenance();
        $form = $this->createForm(FicheMaintenanceType::class, $ficheMaintenance);
        $form->handleRequest($request);

        
    //     $dateDepart = date("d-m-Y");
    //     $duree=6;
    //     $dateDepartTimestamp = strtotime($dateDepart);
    //    $datefin =date("Y-m-d", strtotime("+".$duree.'month',$dateDepartTimestamp));
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            // $ficheMaintenance->setDateProchaine($this->$datefin);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ficheMaintenance);
            $entityManager->flush();

            return $this->redirectToRoute('fiche_maintenance_index');
        }

        return $this->render('fiche_maintenance/new.html.twig', [
            'fiche_maintenance' => $ficheMaintenance,
            'form' => $form->createView(),
            'utilisateur' => $user,
        ]);
    }

    /**
     * 
     * @Route("/{id}", name="fiche_maintenance_show", methods={"GET"})
     */
    public function show(FicheMaintenance $ficheMaintenance): Response
    {
        $user = $this->getUser();
        return $this->render('fiche_maintenance/show.html.twig', [
            'fiche_maintenance' => $ficheMaintenance,
            'utilisateur' => $user,
        ]);
    }


    
    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/{id}/edit", name="fiche_maintenance_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FicheMaintenance $ficheMaintenance): Response
    {
        $form = $this->createForm(FicheMaintenanceType::class, $ficheMaintenance);
        $form->handleRequest($request);
        $user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fiche_maintenance_index');
        }

        return $this->render('fiche_maintenance/edit.html.twig', [
            'fiche_maintenance' => $ficheMaintenance,
            'form' => $form->createView(),
            'utilisateur' => $user,
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
