<?php

namespace notas\src\core;

class Router
{

    public Request $request;
    protected array $routes = [];

    public function __construct(Request $request)
    {
        $this->request = new Request();
    }

    public function get($path,$callback) 
    {
    }

    public function resolve()
    {
        return $this->request->getPath();
    }
    
}
