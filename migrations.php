<?php

require_once __DIR__.'/vendor/autoload.php';

use notas\src\core\Application;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application( __DIR__, $config);
$app->db->applyMigrations();
