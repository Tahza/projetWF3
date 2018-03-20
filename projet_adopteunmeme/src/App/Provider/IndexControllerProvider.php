<?php

namespace App\Provider;

use Silex\Api\ControllerProviderInterface;

class IndexControllerProvider implements ControllerProviderInterface {
    
    /**
     * {@inheritDoc}
     * @see \Silex\Api\ControllerProviderInterface::connect()
     */
    public function connect(\Silex\Application $app)
    {
        
        # : Créer une instance de Silex\ControllerCollection
        # : https://silex.symfony.com/api/master/Silex/ControllerCollection.html
        $controllers = $app['controllers_factory'];
        
            # Page d'Accueil
            $controllers
                # On associe une Route à un Controller et une Action
                ->get('/', 'App\Controller\IndexController::indexAction')
                # En option je peux donner un nom à la route, qui servira plus tard
                # pour la créations de lien : "controller_action"
                ->bind('index_index');

            $controllers
                ->get('/edit/{id}', 'App\Controller\IndexController::editAction')
                ->bind('index_edit');

            $controllers
                ->get('/inscription', 'App\Controller\IndexController::inscriptionAction')
                ->bind('index_inscription');

            $controllers
                ->post('/inscription', 'App\Controller\IndexController::inscriptionPost')
                ->bind('index_inscription_post');

            $controllers
                ->get('/connexion', 'App\Controller\IndexController::connexionAction')
                ->bind('index_connexion');

            $controllers
                ->get('/deconnexion', 'App\Controller\IndexController::deconnexionAction')
                ->bind('index_deconnexion');

        # On retourne la liste des controllers (ControllerCollection)
        return $controllers;
        
    }
}
