<?php

namespace App\Controller;

use App\Entity\Agence;
use App\Entity\Client;
use App\Entity\Compte;
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


        if(isset($_POST['btnAjouter']))
        {
         
            extract($_POST);
            // var_dump($_POST);
            // die;
           
            $compteObject = new Compte();
            //ici on cree un objet 

            if($_POST['typecompte'] == '1')
            {
              //1 represente typecompte epargne au niveau de la base
              $compteObject->setNumCompte($numcompte);

              $ag = $em->getRepository(Agence::class)->find($agence);

              $compteObject->setAgence($ag);
  
              $compteObject->setCleRip($clerip);
  
              $compteObject->setFraisOuverture($fraisouverture);
  
              $compteObject->setDateOuverture($dateouverture);

               //ici je recupere l objet type compte
               $tcompte = $em->getRepository(Typecompte::class)->find($typecompte);

              $compteObject->setTypecompte($tcompte);
  
               //ici je recupere l objet client
              $cli = $em->getRepository(Client::class)->find($client);

              $compteObject->setClient($cli);
          
             // $em = $this->getDoctrine()->getManager();
                $em->persist($compteObject);
                $em->flush();

              
                return $this->render('compte/add.html.twig',$data);

            }else if($_POST['typecompte'] == '2')
            {
              //2 represente typecompte courant au niveau de la base
    
              $compteObject->setNumCompte($numcompte);

              $ag = $em->getRepository(Agence::class)->find($agence);

              $compteObject->setAgence($ag);
  
              $compteObject->setCleRip($clerip);
  
              $compteObject->setAgio($agio);

              $compteObject->setDateouverture($dateouverture);

              //ici je recupere l objet type compte
              $tcompte = $em->getRepository(Typecompte::class)->find($typecompte);

              $compteObject->setTypecompte($tcompte);

              //ici je recupere l objet client
              $cli = $em->getRepository(Client::class)->find($client);

              $compteObject->setClient($cli);

        
                $em->persist($compteObject);
                $em->flush();

                  return $this->render('compte/add.html.twig',$data);

            }else if($_POST['typecompte'] == '3')
            {
              //3 represente typecompte bloque au niveau de la base
      
              $compteObject->setNumCompte($numcompte);

              $ag = $em->getRepository(Agence::class)->find($agence);

              $compteObject->setAgence($ag);
  
              $compteObject->setCleRip($clerip);

              $compteObject->setFraisouverture($fraisouverture);

              $compteObject->setDateouverture($dateouverture);

               //ici je recupere l objet type compte
               $tcompte = $em->getRepository(Typecompte::class)->find($typecompte);

               $compteObject->setTypecompte($tcompte);
 
               //ici je recupere l objet client
               $cli = $em->getRepository(Client::class)->find($client);
 
               $compteObject->setClient($cli);
      
               $em->persist($compteObject);
               $em->flush();

                 return $this->render('compte/add.html.twig',$data);
            }
          
        }else{

            return $this->render('compte/add.html.twig',$data);

        }

    }
}
