<?php
/**
 *
 * @author Gustavo A. Marín
 * @date 2022 01 05
 */

namespace notas\src\core;

class Application 
{
    public Router $router;
    public function __construct() 
    {
        $this->router = new Router();
        
    }

    public function run() 
    {
        echo "<h1>HOLA desde App</h1>";
    }
}
