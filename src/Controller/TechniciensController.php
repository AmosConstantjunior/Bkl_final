<?php

namespace App\Controller;

use App\Entity\Techniciens;
use App\Form\TechniciensType;
use App\Repository\TechniciensRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/techniciens")
 */
class TechniciensController extends AbstractController
{
    /**
     * @Route("/", name="techniciens_index", methods={"GET"})
     */
    public function index(TechniciensRepository $techniciensRepository): Response
    {
        return $this->render('techniciens/index.html.twig', [
            'techniciens' => $techniciensRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="techniciens_new", methods={"GET","POST"})
     */
    public function new(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $technicien = new Techniciens();
        $form = $this->createForm(TechniciensType::class, $technicien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $technicien->setPassword(
                $passwordEncoder->encodePassword(
                    $technicien,
                    $form->get('plainPassword')->getData()
                )
                
            );
            $technicien->setRoles(["ROLE_ADMIN"]);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($technicien);
            $entityManager->flush();

            return $this->redirectToRoute('techniciens_index');
        }

        return $this->render('techniciens/new.html.twig', [
            'technicien' => $technicien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="techniciens_show", methods={"GET"})
     */
    public function show(Techniciens $technicien): Response
    {
        return $this->render('techniciens/show.html.twig', [
            'technicien' => $technicien,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="techniciens_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Techniciens $technicien): Response
    {
        $form = $this->createForm(TechniciensType::class, $technicien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('techniciens_index');
        }

        return $this->render('techniciens/edit.html.twig', [
            'technicien' => $technicien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="techniciens_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Techniciens $technicien): Response
    {
        if ($this->isCsrfTokenValid('delete'.$technicien->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($technicien);
            $entityManager->flush();
        }

        return $this->redirectToRoute('techniciens_index');
    }
}
