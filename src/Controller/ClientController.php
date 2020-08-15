<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Employeur;
use App\Entity\Typeclient;
use App\Form\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/client/creer", name="creer_client")
     */
    public function creer()

    {   //Cette fonction permet de crer l formulaire client et
        //envoyer la liste des client au view 

        $em = $this->getDoctrine()->getManager();

        $cli = new Client();

        $form = $this->createForm(
            ClientType::class,
            $cli,
            array('action' => $this->generateUrl('enregistrer_client'))
        );

        $data['formClient'] = $form->createView();

        $data['clients'] = $em->getRepository(Client::class)->findAll();

        return $this->render('client/add.html.twig', $data);
    }

    /**
     * @Route("/client/enregistrer", name="enregistrer_client")
     */
    public function add(Request $request)
    {
        //Cette function permet de requperer les info du formulaire
        $em = $this->getDoctrine()->getManager();

        $client = new Client();

        $client->setNom($request->request->get("client")["nom"]);
        $client->setPrenom($request->request->get("client")["prenom"]);
        $client->setAdresse($request->request->get("client")["adresse"]);
        $client->setEmail($request->request->get("client")["email"]);

        $tclient = $em->getRepository(Typeclient::class)->find(

            $request->request->get("client")["typeclient"]
            //ici je requpere l'objet typeclient par son id ensuite l'inserer dans client
        );

        $client->setTypeclient($tclient);

        $emp = $em->getRepository(Employeur::class)->find(

            $request->request->get("client")["employeur"]
            //ici je requpere l'objet employeur par son id ensuite l'inserer dans client

        );
        $client->setEmployeur($emp);

        $em->persist($client);

        $em->flush();

        return $this->redirectToRoute('creer_client');
    }
}
