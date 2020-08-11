<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function index()
    {
        return $this->render('client/add.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

     /**
     * @Route("/addClient", name="addClient")
     */
    public function add()
    {
        return $this->render('client/add.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
}
