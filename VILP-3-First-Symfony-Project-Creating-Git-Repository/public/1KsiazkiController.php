<?php

namespace App\Controller;

use App\Entity\Ksiazki;
use App\Form\KsiazkiType;
use App\Repository\KsiazkiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ksiazki")
 */
class KsiazkiController extends AbstractController
{
    /**
     * @Route("/", name="ksiazki_index", methods={"GET"})
     */
    public function index(KsiazkiRepository $ksiazkiRepository): Response
    {
        return $this->render('ksiazki/index.html.twig', [
            'ksiazkis' => $ksiazkiRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ksiazki_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ksiazki = new Ksiazki();
        $form = $this->createForm(KsiazkiType::class, $ksiazki);
        $form->handleRequest($request);

        $this->addFlash(
            'ksiazki',
            'ksiazka Dodana'
        );

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ksiazki);
            $entityManager->flush();

            return $this->redirectToRoute('ksiazki_index');
        }

        return $this->render('ksiazki/new.html.twig', [
            'ksiazki' => $ksiazki,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ksiazki_show", methods={"GET"})
     */
    public function show(Ksiazki $ksiazki): Response
    {
        return $this->render('ksiazki/show.html.twig', [
            'ksiazki' => $ksiazki,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ksiazki_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ksiazki $ksiazki): Response
    {
        $form = $this->createForm(KsiazkiType::class, $ksiazki);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'ksiazki',
                'ksiazki update'
            );

            return $this->redirectToRoute('ksiazki_index', [
                'id' => $ksiazki->getId(),
            ]);
        }

        return $this->render('ksiazki/edit.html.twig', [
            'ksiazki' => $ksiazki,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ksiazki_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ksiazki $ksiazki): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ksiazki->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ksiazki);
            $entityManager->flush();

            $this->addFlash(
                'ksiazki',
                'ksiazka usunieta'
            );
        }

        return $this->redirectToRoute('ksiazki_index');
    }
}
