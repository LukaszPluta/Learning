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

class LocalLibraryController  extends AbstractController
{

    public function hello(ProductCategoryRepository $productCategoryRepository)
    {

        return $this->render('localLibrary.html.twig');
    }


}