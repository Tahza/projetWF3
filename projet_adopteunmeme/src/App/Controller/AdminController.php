<?php
/**
 * Created by PhpStorm.
 * User: Alexis
 * Date: 16/03/2018
 * Time: 23:56
 */

namespace App\Controller;


use Silex\Application;

class AdminController
{

    public function adminAction(Application $app) {

        # Affichage dans la Vue
        return $app['twig']->render('admin/admin.html.twig',[
        ]);
    }

}