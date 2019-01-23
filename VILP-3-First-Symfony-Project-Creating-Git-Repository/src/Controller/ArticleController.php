<?php

namespace App\Controller;


use App\Repository\ProductCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    public function recentArticles(ProductCategoryRepository $productCategoryRepository)
    {

        return $this->render(
            'mainPage.html.twig',
            ['articles' => $productCategoryRepository->findAll()]
        );
    }

}
