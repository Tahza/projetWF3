<?php

use Silex\Provider\SecurityServiceProvider;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use TechNews\Provider\AuteurProvider;
use Silex\Provider\SessionServiceProvider;
use App\Provider\MembreProvider;

# use Silex\Provider\SessionServiceProvider;
$app->register(new SessionServiceProvider());

#use Silex\Provider\SecurityServiceProvider;
$app->register(new SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'main' => array(
            'pattern'   => '^/',
            'http'      => true,
            'anonymous' => true,
            'form'      => [
                'login_path'    => '/connexion',
                'check_path'    => '/connexion/login_check',
            ],
            'logout'    => [
                'logout_path'   => '/deconnexion'
            ],
            'users'     => function() use($app) {
                return new MembreProvider($app['idiorm.db']);
            }
            )
        ),
        'security.access_rules' =>[
            ['^/admin', 'ROLE_ADMIN', 'http'],
            ['^/membre', 'ROLE_MEMBRE', 'http'],
        ],
        'security.role_hierarchy' => [
            'ROLE_ADMIN'    => ['ROLE_MEMBRE']
        ]
    )
);

# use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
$app['security.encoder.digest'] = function() use($app) {
    return new MessageDigestPasswordEncoder('sha1', false, 1);
};

$app['security.default_encoder'] = function() use($app) {
    return $app['security.encoder.digest'];
};