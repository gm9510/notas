<?php

require_once __DIR__.'/../vendor/autoload.php';

use notas\src\core\Application;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application( dirname(__DIR__), $config);
$app->router->get('/', [ 
    notas\src\controllers\SiteController::class, 
    'home'
]);
$app->router->get('/contact', [
    notas\src\controllers\SiteController::class, 
    'contact'
]);
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

