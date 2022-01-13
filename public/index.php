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


$app->router->get('/login', [ 
    notas\src\controllers\AuthController::class, 
    'login'
]);
$app->router->post('/login', [ 
    notas\src\controllers\AuthController::class, 
    'login'
]);
$app->router->get('/register', [ 
    notas\src\controllers\AuthController::class, 
    'register'
]);
$app->router->post('/register', [ 
    notas\src\controllers\AuthController::class, 
    'register'
]);
$app->run();

