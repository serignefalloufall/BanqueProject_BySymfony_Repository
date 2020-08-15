<?php

namespace App\Form;

use App\Entity\Agence;
use App\Entity\Client;
use App\Entity\Compte;
use App\Entity\Typecompte;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'client',

                EntityType::class,
                array(
                    'class' => Client::class,
                    'label' => 'Client',
                    'attr' => array(
                        'class' => 'form-control form-group'
                    )
                )
            )
            ->add(
                'typecompte',

                EntityType::class,
                array(
                    'class' => Typecompte::class,
                    'label' => 'Type compte',
                    'attr' => array(
                        'class' => 'form-control form-group'
                    )
                )
            )
            ->add(
                'agence',

                EntityType::class,
                array(
                    'class' => Agence::class,
                    'label' => 'Agence',
                    'attr' => array(
                        'class' => 'form-control form-group'
                    )
                )
            )   
            ->add(
                'numcompte',

                TextType::class,
                array(

                    'label' => 'Numero compte',
                    'attr' => array(
                        'class' => 'form-control form-group'
                    )
                )
            )
            ->add(
                'clerip',
                TextType::class,
                array(

                    'label' => 'Cle rib',
                    'attr' => array(
                        'class' => 'form-control form-group'
                    )
                )
            )
            ->add(
                'fraisouverture',
                TextType::class,
                array(

                    'label' => 'Frais ouverture',
                    'attr' => array(
                        'class' => 'form-control form-group'
                    )
                )
            )
            ->add(
                'agio',
                TextType::class,
                array(

                    'label' => 'Agio',
                    'attr' => array(
                        'class' => 'form-control form-group'
                    )
                )
            )
            ->add(
                'dateouverture',
                TextType::class,
                array(

                    'label' => 'Date ouverture',
                    'attr' => array(
                        'class' => 'form-control form-group'
                    )
                )
            )
            ->add(
                'datefermuture',
                TextType::class,
                array(

                    'label' => 'Date fermuture',
                    'attr' => array(
                        'class' => 'form-control form-group'
                    )
                )
            )

            ->add('valider', SubmitType::class, array('attr' => array('class' => 'btn btn-success btn-lg btn-block form-group')));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Compte::class,
        ]);
    }
}
