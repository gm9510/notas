<?php

require_once __DIR__.'/../vendor/autoload.php';

use notas\src\core\Application;

$app = new Application();
$app->router->get('/', function() {
    return 'Hello World';
});
$app->run();

