<?php

namespace App\Provider;


use Silex\Api\ControllerProviderInterface;
use Silex\Application;

class MembreControllerProvider implements ControllerProviderInterface
{

    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        return $controllers;
    }

}