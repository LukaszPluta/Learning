<?php

namespace App\Controller;

use App\Entity\Gatunki;
use App\Form\GatunkiType;
use App\Repository\GatunkiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gatunki")
 */
class GatunkiController extends AbstractController
{
    /**
     * @Route("/", name="gatunki_index", methods={"GET"})
     */
    public function index(GatunkiRepository $gatunkiRepository): Response
    {
        return $this->render('gatunki/index.html.twig', [
            'gatunkis' => $gatunkiRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="gatunki_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $gatunki = new Gatunki();
        $form = $this->createForm(GatunkiType::class, $gatunki);
        $form->handleRequest($request);

        $this->addFlash(
            'gatunek',
            'gatunek Dodany'
        );

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gatunki);
            $entityManager->flush();

            return $this->redirectToRoute('gatunki_index');
        }

        return $this->render('gatunki/new.html.twig', [
            'gatunki' => $gatunki,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gatunki_show", methods={"GET"})
     */
    public function show(Gatunki $gatunki): Response
    {
        return $this->render('gatunki/show.html.twig', [
            'gatunki' => $gatunki,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="gatunki_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Gatunki $gatunki): Response
    {
        $form = $this->createForm(GatunkiType::class, $gatunki);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'gatunek',
                'gatunek update'
            );

            return $this->redirectToRoute('gatunki_index', [
                'id' => $gatunki->getId(),
            ]);
        }

        return $this->render('gatunki/edit.html.twig', [
            'gatunki' => $gatunki,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gatunki_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Gatunki $gatunki): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gatunki->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gatunki);
            $entityManager->flush();

            $this->addFlash(
                'gatunek',
                'gatunek usuniety'
            );
        }

        return $this->redirectToRoute('gatunki_index');
    }
}
