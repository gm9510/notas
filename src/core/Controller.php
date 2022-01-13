<?php

namespace notas\src\core;

use notas\src\core\Application;

class Controller
{
    public string $layout = 'main';

    public function setLayout($l) {
        $this->layout = $l;
    }

    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view,$params);
    }

}
