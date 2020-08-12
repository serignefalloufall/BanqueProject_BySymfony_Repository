<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('accueil.html.twig');
    }

     /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->redirectToRoute('index');
    }

    
}
