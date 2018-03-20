<?php

use App\Provider\IndexControllerProvider;
use App\Provider\MembreControllerProvider;

$app->mount('/', new IndexControllerProvider());
$app->mount('/membre', new MembreControllerProvider());
$app->mount('/admin', new \App\Provider\AdminControllerProvider());