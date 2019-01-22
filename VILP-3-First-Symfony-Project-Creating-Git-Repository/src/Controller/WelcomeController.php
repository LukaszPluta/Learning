<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WelcomeController  extends AbstractController
{
    public function hello()
    {
        $date = date('m/d/Y h:i:s a');

        return $this->render('firstTwig.html.twig',[
            'date'=>$date,
        ]);

    }
}