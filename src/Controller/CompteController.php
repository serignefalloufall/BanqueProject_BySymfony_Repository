<?php

namespace App\Controller;

use App\Entity\Agence;
use App\Entity\Client;
use App\Entity\Typecompte;
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
        $em = $this->getDoctrine()->getManager();
        $data['listeTypeCompte'] = $em->getRepository(Typecompte::class)->findAll();
        $data['clients'] = $em->getRepository(Client::class)->findAll();
        $data['agences'] = $em->getRepository(Agence::class)->findAll();
        //parametrage
        $data['today'] = date("d/m/y"); 
        $data['numcompte'] = 'Cmpt-'.$data['today']; 
        $data['cleRip'] = 'Cle-rip-'.$data['today']; 

        return $this->render('compte/add.html.twig',$data);
    }
}
