<?php

namespace App\Controller;


use Silex\Application;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\NotBlank;

class MembreController
{

    public function membreAction(Application $app) {

        # Affichage dans la Vue
        return $app['twig']->render('membre/membre.html.twig',[
        ]);
    }

    public function addsocialAction(Application $app, Request $request) {

        $form = $app['form.factory']->createBuilder(FormType::class)

            ->add('FACEBOOK', TextType::class, [
                'required'      => false,
                'label'         => false,
                'attr'          => [
                    'class'         => 'form-control',
                    'placeholder'   => 'URL Facebook..'
                ]
            ])

            ->add('TWITTER', TextType::class, [
                'required'      => false,
                'label'         => false,
                'attr'          => [
                    'class'         => 'form-control',
                    'placeholder'   => 'URL Twitter'
                ]
            ])

            ->add('GOOGLE', TextType::class, [
                'required'      => false,
                'label'         => false,
                'attr'          => [
                    'class'         => 'form-control',
                    'placeholder'   => 'URL Google'
                ]
            ])

            ->add('submit', SubmitType::class, ['label' => 'Publier'])

            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()) :

            $social     = $form->getData();

            $socialDb   = $app['idiorm.db']->for_table('membre')->create();

            $socialDb->FACEBOOK         = $social['FACEBOOK'];
            $socialDb->TWITTER          = $social['TWITTER'];
            $socialDb->GOOGLE           = $social['GOOGLE'];

            $socialDb->save();

            endif;

            return $app['twig']->render('membre/social.html.twig', [
                'form'  => $form->createView()
            ]);

        }

}