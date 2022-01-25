<?php

namespace notas\src\core;

use notas\src\core\middlewares\BaseMiddleware;

class Controller
{
    public string $layout = 'main';
    public string $action = '';
    public $middlewares = [];

    public function setLayout($l) {
        $this->layout = $l;
    }

    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view,$params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares()
    {
        return $this->middlewares;
    }
}
