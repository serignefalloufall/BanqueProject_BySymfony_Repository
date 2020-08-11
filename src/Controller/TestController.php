<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

     /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        return $this->render('test/home.html.twig', [
            'nomComplet' => 'Serigne Fallou Fall',
            'age' => 33
        ]);
    }
}
