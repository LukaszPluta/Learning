<?php

namespace App\Controller;


use App\Repository\ProductCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LibraryController extends AbstractController
{
    public function index(ProductCategoryRepository $productCategoryRepository)
    {

        return $this->render(
            'mainPage.library.html.twig',
            ['articles' => $productCategoryRepository->findAll()]
        );
    }

}
