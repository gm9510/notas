<?php

namespace notas\src\core;
use notas\src\core\exceptions\NotFoundException;
use notas\src\core\Application;

class Router
{

    public Request $request;
    public Response $response;
    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path,$callback) 
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path,$callback) 
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;
        if( !$callback ) {
            throw new NotFoundException();
        }

        if(is_string($callback)) {
            $this->response->setStatusCode(200);
            return $this->renderView($callback);
        }

        if( is_array($callback) ) {

            Application::$app->controller = new $callback[0]();
            Application::$app->controller->action = $callback[1];
            $callback[0] = Application::$app->controller;

            foreach( Application::$app->controller->getMiddlewares() as $middleware ) {
                $middleware->execute();
            }
        }

        $this->response->setStatusCode(200);
        return call_user_func($callback, $this->request, $this->response);
    }

    public function renderView($view,$params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view,$params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = 'main';
        if(Application::$app->controller) {
            $layout = Application::$app->controller->layout;
        }

        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/{$layout}.php";
        return ob_get_clean();

    }

    protected function renderOnlyView($view,$params) {
        foreach($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/{$view}.php";
        return ob_get_clean();
    }
    
}
