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
    public Request $request;
    public function __construct() 
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run() 
    {
        $path = $this->router->resolve();

        echo "<h2>";
        echo var_dump( $path );
        echo "</h2>";
    }
}
