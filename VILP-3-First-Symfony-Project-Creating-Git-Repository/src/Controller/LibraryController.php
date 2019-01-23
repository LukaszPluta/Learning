<?php

namespace App\Controller;


use App\Repository\ProductCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LibraryController extends AbstractController
{
    public function recentArticles(ProductCategoryRepository $productCategoryRepository)
    {

        return $this->render(
            'mainLibraryPage.html.twig',
            ['articles' => $productCategoryRepository->findAll()]
        );
    }

}
