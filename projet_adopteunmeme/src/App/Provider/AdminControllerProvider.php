<?php
/**
 * Created by PhpStorm.
 * User: Alexis
 * Date: 16/03/2018
 * Time: 23:57
 */

namespace App\Provider;


use Silex\Api\ControllerProviderInterface;
use Silex\Application;

class AdminControllerProvider implements ControllerProviderInterface
{

    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers
            # On associe une Route à un Controller et une Action
            ->get('/', 'App\Controller\AdminController::adminAction')
            # En option je peux donner un nom à la route, qui servira plus tard
            # pour la créations de lien : "controller_action"
            ->bind('admin_admin');

        return $controllers;
    }

}