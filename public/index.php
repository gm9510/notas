<?php

require_once __DIR__.'/../vendor/autoload.php';

use notas\src\core\Application;

$app = new Application( dirname(__DIR__) );
$app->router->get('/', [ 
    notas\src\controllers\SiteController::class, 
    'home'
]);
$app->router->get('/contact', 'contact');
$app->router->post('/contact', [ 
    notas\src\controllers\SiteController::class, 
    'handleContact'
]);
$app->run();

