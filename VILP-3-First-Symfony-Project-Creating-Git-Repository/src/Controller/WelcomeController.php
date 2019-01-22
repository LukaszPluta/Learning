<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Product;
use App\Entity\ProductCategory;
use App\Form\ProductCategoryType;
use App\Repository\ProductCategoryRepository;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController  extends AbstractController
{

    public function hello(ProductCategoryRepository $productCategoryRepository)
    {
/*        $date = date('m/d/Y h:i:s a');

        return $this->render('firstTwig.html.twig',[
            'date'=>$date,
        ]);*/
        return $this->render('mainpage.html.twig',['products' => $productCategoryRepository->findAll(),]);
    }


}