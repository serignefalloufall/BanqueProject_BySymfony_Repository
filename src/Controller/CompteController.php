<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{
    /**
     * @Route("/compte", name="compte")
     */
    public function index()
    {
        return $this->render('compte/add.html.twig', [
            //'controller_name' => 'CompteController',
        ]);
    }

     /**
     * @Route("/addCompte", name="addCompte")
     */
    public function add()
    {
        return $this->render('compte/add.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
}
