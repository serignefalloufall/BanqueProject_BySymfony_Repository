<?php

namespace App\Controller;

use App\Entity\Employeur;
use App\Entity\Region;
use App\Entity\Typeclient;
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
       // var_dump($_POST);
        
        $em = $this->getDoctrine()->getManager();
        $data['listeTypeClient'] = $em->getRepository(Typeclient::class)->findAll();
        $data['employeurs'] = $em->getRepository(Employeur::class)->findAll();
       
        if(isset($_POST['btnAjouter']))
        {
            extract($_POST);
            if($_POST['type_client_id'] == '3')
            {
                $emp = new Employeur();
                $emp->setNumIdentification($numIdentification);
                $emp->setRaisonSocial($raisonSocial);
                $emp->setNomEmployeur($nomemployeur);
                $emp->setAdresseEmployeur($adresseemployeur);
                $em = $this->getDoctrine()->getManager();
                $em->persist($emp);
                $em->flush();
                return $this->render('client/add.html.twig',$data);
            }


        }
               
        return $this->render('client/add.html.twig',$data);
    }
}
