<?php

namespace notas\src\core;

use notas\src\core\Application;

class Controller
{
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view,$params);
    }
}
