<?php

namespace App\Controller;

use App\Entity\Ateliers;
use App\Form\AteliersType;
use App\Repository\AteliersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ateliers")
 */
class AteliersController extends AbstractController
{
    /**
     * @Route("/", name="ateliers_index", methods={"GET"})
     */
    public function index(AteliersRepository $ateliersRepository): Response
    {
        $user = $this->getUser();
        return $this->render('ateliers/index.html.twig', [
            'ateliers' => $ateliersRepository->findAll(),
            'utilisateur' => $user
        ]);
    }

    /**
     * @Route("/new", name="ateliers_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = $this->getUser();
        $atelier = new Ateliers();
        $form = $this->createForm(AteliersType::class, $atelier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($atelier);
            $entityManager->flush();

            return $this->redirectToRoute('ateliers_index');
        }

        return $this->render('ateliers/new.html.twig', [
            'atelier' => $atelier,
            'form' => $form->createView(),
            'utilisateur' => $user
        ]);
    }

    /**
     * @Route("/{id}", name="ateliers_show", methods={"GET"})
     */
    public function show(Ateliers $atelier): Response
    {
        $user = $this->getUser();
        return $this->render('ateliers/show.html.twig', [
            'atelier' => $atelier,
            'utilisateur' => $user
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ateliers_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ateliers $atelier): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(AteliersType::class, $atelier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ateliers_index');
        }

        return $this->render('ateliers/edit.html.twig', [
            'atelier' => $atelier,
            'form' => $form->createView(),
            'utilisateur' => $user
        ]);
    }

    /**
     * @Route("/{id}", name="ateliers_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ateliers $atelier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$atelier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($atelier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ateliers_index');
    }
}
