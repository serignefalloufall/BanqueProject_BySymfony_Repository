<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Employeur;
use App\Entity\Typeclient;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'nom',
                TextType::class,
                array(

                    'label' => 'Nom',
                    'attr' => array(
                        'class' => 'form-control form-group'
                    )
                )
            )
            ->add(
                'prenom',
                TextType::class,
                array(
                    'label' => 'Prenom',
                    'attr' => array(

                        'class' => 'form-control form-group'
                    )
                )
            )
            ->add(
                'adresse',
                TextType::class,
                array(
                    'label' => 'Adresse',
                    'attr' => array(

                        'class' => 'form-control form-group'
                    )
                )
            )
            ->add(
                'tel',
                TextType::class,
                array(
                    'label' => 'Telephone',
                    'attr' => array(
                        //'require'=>'require',
                        'class' => 'form-control form-group'
                    )
                )
            )
            ->add(
                'email',
                TextType::class,
                array(
                    'label' => 'Email',
                    'attr' => array(

                        'class' => 'form-control form-group'
                    )
                )
            )
            ->add(
                'profession',
                TextType::class,
                array(
                    'label' => 'Profession',
                    'attr' => array(

                        'class' => 'form-control form-group'
                    )
                )
            )
            ->add(
                'salaire',
                TextType::class,
                array(
                    'label' => 'Salaire',
                    'attr' => array(

                        'class' => 'form-control form-group'
                    )
                )
            )
            ->add(
                'typeclient',
                EntityType::class,
                [
                    'class' => Typeclient::class,
                    'choice_label' => 'libelle',
                    'empty_data' => 'Choisir un type de client',
                    'attr' => array(
                        'class' => 'form-control form-group',
                        'id' => 'type_client_id'
                    )
                ]
            )
            ->add(
                'employeur',
                EntityType::class,
                [
                    'class' => Employeur::class,
                    'choice_label' => 'nomemployeur',
                    'attr' => array(
                        'class' => 'form-control form-group'
                    )
                ]
            )
            //test
           
            //finTest

            ->add('valider', SubmitType::class, array('attr' => array('class' => 'btn btn-success btn-lg btn-block form-group')));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
