<?php

namespace App\Provider;


use Silex\Api\ControllerProviderInterface;
use Silex\Application;

class MembreControllerProvider implements ControllerProviderInterface
{

    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers
            ->get('/', 'App\Controller\MembreController::membreAction')
            ->bind('index_membre');

        $controllers
            ->match('/membre/social',
                'App\Controller\MembreController::addsocialAction')
            ->method('GET|POST')
            ->bind('index_social');

        return $controllers;
    }

}