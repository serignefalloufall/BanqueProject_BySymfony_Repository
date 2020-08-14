<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Employeur;
use App\Entity\Typeclient;
use App\Form\RegionType;
use App\Form\ClientType;
use App\Repository\TypeclientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/client/creer", name="creer_client")
     */
    public function creer()
    {

        //     $em = $this->getDoctrine()->getManager();
        //     $a = new Region();
        //     $form = $this->createForm(RegionType::class, $a,
        //     array('action' => $this->generateUrl('addClient'))
        // );
        //     $data['formAgence'] = $form->createView();
        //     $data['clients'] = $em->getRepository(Client::class)->findAll();

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
        // var_dump($request->request);
        // die;

        $em = $this->getDoctrine()->getManager();

        $client = new Client();
        $client->setNom($request->request->get("client")["nom"]);
        $client->setPrenom($request->request->get("client")["prenom"]);
        $client->setAdresse($request->request->get("client")["adresse"]);
        $client->setEmail($request->request->get("client")["email"]);

        $tclient = $em->getRepository(Typeclient::class)->find(
            $request->request->get("client")["typeclient"]
        );
    
        $client->setTypeclient($tclient);

        $emp = $em->getRepository(Employeur::class)->find(
            $request->request->get("client")["employeur"]
        );
        $client->setEmployeur($emp);

        $em->persist($client);
        $em->flush();
     //   die();
        // $form = $this->createForm(ClientType::class, $);


        // $data['form'] = $form->createView();
        // var_dump($request->request->get('nom'));
        // die;

        // if ($form->isSubmitted() && $form->isValid()) {

        //     $a = $form->getData();
        //     $em->persist($a);
        //     $em->flush();
        // }
        return $this->redirectToRoute('creer_client');
    }
}
