<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Form\CompteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


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
     * @Route("/compte/creer", name="compte_creer")
     */
    public function creer()
    {
        //Cette fonction permet de crer l formulaire compte et
        //envoyer la liste des client au view 

        $em = $this->getDoctrine()->getManager();

        $compte = new Compte();

        $form = $this->createForm(
            CompteType::class,
            $compte,
            array('action' => $this->generateUrl('enregistrer_compte'))
        );

        $data['formCompte'] = $form->createView();

        $data['comptes'] = $em->getRepository(Compte::class)->findAll();

        return $this->render('compte/add.html.twig', $data);
    }

    /**
     * @Route("/compte/enregistrer", name="enregistrer_compte")
     */
    public function add(Request $request)
    {
        //Cette function permet de requperer les info du formulaire

        $compte = new Compte();

        $form = $this->createForm(
            CompteType::class,
            $compte
        );

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $compte = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($compte);
            $em->flush();
        }

        return $this->redirectToRoute('compte_creer');
    }
}
