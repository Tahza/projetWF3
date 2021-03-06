<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
    /**
     * Affichage de la Page d'Accueil
     * @return Symfony\Component\HttpFoundation\Response;
     */
    public function indexAction(Application $app)
    {

        # Déclaration d'un Message
        $message = 'Mon Application Silex !';

        # Affichage dans la Vue
        return $app['twig']->render('index.html.twig', [
            'message' => $message
        ]);
    }

    public function inscriptionAction(Application $app)
    {
        return $app['twig']->render('inscription.html.twig');
    }

    public function inscriptionPost(Application $app, Request $request)
    {

        $error = '';

        $isEmailInDb = $app['idiorm.db']->for_table('membre')
            ->where('EMAILMEMBRE', $request->get('EMAILMEMBRE'))
            ->count();

        if (!$isEmailInDb) :

            $membre = $app['idiorm.db']->for_table('membre')->create();

            $membre->NOMMEMBRE = $request->get('NOMMEMBRE');
            $membre->PRENOMMEMBRE = $request->get('PRENOMMEMBRE');
            $membre->EMAILMEMBRE = $request->get('EMAILMEMBRE');
            $membre->MDPMEMBRE = $app['security.default_encoder']->encodePassword($request->get('MDPMEMBRE'), '');
            $membre->ROLEMEMBRE = 'ROLE_MEMBRE';

            $membre->save();

            return $app->redirect('connexion');

        else :
            $error = 'Ce compte existe déjà. Mot de passe oublié ?';
        endif;

        return $app['twig']->render('inscription.html.twig', [
            'error' => $error
        ]);
    }

    public function connexionAction(Application $app, Request $request)
    {

        return $app['twig']->render('connexion.html.twig', [
            'error' => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username')
        ]);

    }

    public function editAction(Application $app, Request $request, $id)
    {
        $json_source = file_get_contents('https://api.imgflip.com/get_memes');
        $json_data = json_decode($json_source);
        $memes = $json_data->data->memes;

        foreach ($memes as $meme) {
            if ($meme->id == $id) {
                //var_dump($meme);
                $url    = $meme->url;
                $width  = $meme->width;
                $height = $meme->height;
            }
        }

        return $app['twig']->render('edit.html.twig', [
            'url'       => $url,
            'width'     => $width,
            'height'    => $height
        ]);

    }

}
