<?php

namespace App\Controller;

use App\Entity\Autor;
use App\Entity\Gatunek;
use App\Entity\Ksiazka;
use App\Form\GatunekType;
use App\Repository\GatunekRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gatunek")
 */
class GatunekController extends AbstractController
{
    /**
     * @Route("/", name="gatunek_index", methods={"GET"})
     */
    public function index(GatunekRepository $gatunekRepository): Response
    {
        return $this->render('gatunek/index.html.twig', [
            'gatuneks' => $gatunekRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="gatunek_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $gatunek = new Gatunek();
        $form = $this->createForm(GatunekType::class, $gatunek);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gatunek);
            $entityManager->flush();

            return $this->redirectToRoute('gatunek_index');
        }

        return $this->render('gatunek/new.html.twig', [
            'gatunek' => $gatunek,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gatunek_show", methods={"GET"})
     */
    public function show(Gatunek $gatunek): Response
    {
        return $this->render('gatunek/show.html.twig', [
            'gatunek' => $gatunek,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="gatunek_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Gatunek $gatunek): Response
    {
        $form = $this->createForm(GatunekType::class, $gatunek);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gatunek_index', [
                'id' => $gatunek->getId(),
            ]);
        }

        return $this->render('gatunek/edit.html.twig', [
            'gatunek' => $gatunek,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gatunek_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Gatunek $gatunek): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gatunek->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gatunek);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gatunek_index');
    }
}
