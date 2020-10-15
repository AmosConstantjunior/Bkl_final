<?php

namespace App\Controller;

use App\Entity\AttestationCqs;
use App\Form\AttestationCqsType;
use App\Repository\AttestationCqsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/attestation/cqs")
 */
class AttestationCqsController extends AbstractController
{
    /**
     * @Route("/", name="attestation_cqs_index", methods={"GET"})
     */
    public function index(AttestationCqsRepository $attestationCqsRepository): Response
    {
        return $this->render('attestation_cqs/index.html.twig', [
            'attestation_cqs' => $attestationCqsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="attestation_cqs_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $attestationCq = new AttestationCqs();
        $form = $this->createForm(AttestationCqsType::class, $attestationCq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($attestationCq);
            $entityManager->flush();

            return $this->redirectToRoute('attestation_cqs_index');
        }

        return $this->render('attestation_cqs/new.html.twig', [
            'attestation_cq' => $attestationCq,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="attestation_cqs_show", methods={"GET"})
     */
    public function show(AttestationCqs $attestationCq): Response
    {
        return $this->render('attestation_cqs/show.html.twig', [
            'attestation_cq' => $attestationCq,
        ]);
    }
    /**
     * @Route("/{id}", name="modal_attestation", methods={"GET"})
     */
    public function modal(AttestationCqs $attestationCq): Response
    {
        return $this->render('attestation_cqs/modal_attestation_clients.html.twig', [
            'attestation_cq' => $attestationCq,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="attestation_cqs_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AttestationCqs $attestationCq): Response
    {
        $form = $this->createForm(AttestationCqsType::class, $attestationCq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('attestation_cqs_index');
        }

        return $this->render('attestation_cqs/edit.html.twig', [
            'attestation_cq' => $attestationCq,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="attestation_cqs_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AttestationCqs $attestationCq): Response
    {
        if ($this->isCsrfTokenValid('delete'.$attestationCq->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($attestationCq);
            $entityManager->flush();
        }

        return $this->redirectToRoute('attestation_cqs_index');
    }
}
