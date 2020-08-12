<?php

namespace App\Controller;

use App\Entity\Region;
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
        $region = new Region();
        $region->setNom("Thies");
        $em = $this->getDoctrine()->getManager();
        $em->persist($region);
        $em->flush();
        return $this->render('client/add.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
}
