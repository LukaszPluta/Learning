<?php

namespace App\Controller;

use App\Entity\Autor;
use App\Entity\Gatunek;
use App\Entity\Ksiazka;
use App\Form\KsiazkaType;
use App\Repository\KsiazkaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ksiazka")
 */
class KsiazkaController extends AbstractController
{
    /**
     * @Route("/", name="ksiazka_index", methods={"GET"})
     */
    public function index(KsiazkaRepository $ksiazkaRepository): Response
    {
        return $this->render('ksiazka/index.html.twig', [
            'ksiazkas' => $ksiazkaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ksiazka_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ksiazka = new Ksiazka();
        $form = $this->createForm(KsiazkaType::class, $ksiazka);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ksiazka);
            $entityManager->flush();

            return $this->redirectToRoute('ksiazka_index');
        }

        $this->addFlash(
            'note',
            'Dodano ksiazke'
        );

        return $this->render('ksiazka/new.html.twig', [
            'ksiazka' => $ksiazka,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ksiazka_show", methods={"GET"})
     */
    public function show(Ksiazka $ksiazka): Response
    {
        return $this->render('ksiazka/show.html.twig', [
            'ksiazka' => $ksiazka,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ksiazka_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ksiazka $ksiazka): Response
    {
        $form = $this->createForm(KsiazkaType::class, $ksiazka);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ksiazka_index', [
                'id' => $ksiazka->getId(),
            ]);
        }

        return $this->render('ksiazka/edit.html.twig', [
            'ksiazka' => $ksiazka,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ksiazka_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ksiazka $ksiazka): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ksiazka->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ksiazka);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ksiazka_index');
    }
}
