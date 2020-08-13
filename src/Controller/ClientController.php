<?php

namespace App\Controller;

use App\Entity\Client;
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
            if($_POST['typeclient'] == '3')
            {
                $emp = new Employeur();
                $emp->setNumIdentification($numidentification);
                $emp->setRaisonSocial($raisonsocial);
                $emp->setNomEmployeur($nomemployeur);
                $emp->setAdresseEmployeur($adresseemployeur);

                $em = $this->getDoctrine()->getManager();
                $em->persist($emp);
                $em->flush();

                return $this->render('client/add.html.twig',$data);

            }else if($_POST['typeclient'] == '2')
            {
                 // 1 represente typeclient salarie au niveau de la base

                $cli = new Client();
                $cli->setNom($nom);
                $cli->setPrenom($prenom);
                $cli->setAdresse($adresse);
                $cli->setTel($tel);
                $cli->setEmail($email);

                $em = $this->getDoctrine()->getManager();
                $tclient = $em->getRepository(Typeclient::class)->find($typeclient);

                $cli->setTypeclient($tclient);

                $em = $this->getDoctrine()->getManager();
                $em->persist($cli);
                $em->flush();

              
                return $this->render('client/add.html.twig',$data);

            }else if($_POST['typeclient'] == '1')
            {
                 // 2 represente typeclient non salarie au niveau de la base

                $cli = new Client();
               
                $cli->setNom($nom);
                $cli->setPrenom($prenom);
                $cli->setAdresse($adresse);
                $cli->setTel($tel);
                $cli->setEmail($email);
                $cli->setSalaire($salaire);
                $cli->setProfession($profession);

                $em = $this->getDoctrine()->getManager();
                $tclient = $em->getRepository(Typeclient::class)->find($typeclient);

                $cli->setTypeclient($tclient);

                $emp = $em->getRepository(Employeur::class)->find($employeur);

                $cli->setEmployeur($emp);

                $em = $this->getDoctrine()->getManager();
                $em->persist($cli);
                $em->flush();

              
                return $this->render('client/add.html.twig',$data);
            }
          
        }else{

            return $this->render('client/add.html.twig',$data);

        }


    }
               
    
}
