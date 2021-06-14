# Introducción a frameworks de PHP

A la hora de realizar un proyecto en PHP es recomendable hacer uso de los framework, estos no ahorran trabajo ya que tienen implementados yas muchas funcionalidades. Si realizaramos todo desde cero demorariamos mucho tiempo, un framework nos agiliza el trabajo, por que ya trae muchas cosas previamente configuradas. Nos permite enfocarnos en la necesidad y no tanto en la arquitectura del software.

## Estructura de carpetas

* app/
  * Http/
    * Controllers/ : Elemtos de control
    * Responser.php : Administración de respuestas
    * Request.php : Respuesta del servidor
  * helpers.php
* views/ : Vistas
* vendor/
* public/ : Unicamente contiene index.php
  * index.php

## Front Controller

Consiste en contruir un archivo index.php que se ecanrge unicamente de cargar todos los componetes y devolver las peticiones.

```php
<?php
require __DIR__ . '/../vendor/autoload.php';
$request = new App\Http\Request;
$request->send();
```
## Request

Request se encarga de procesar las peticiones. Trabajamos en base a una dirección o dominio, seguido del slash el primer elemento va a ser el controllador, el segundo es el metodo, para esto se captura la URI, y se separan sus elementos.

```php
<?php

namespace App\Http;

class Request {
    protected $segments = [];
    protected $controller;
    protected $method;

    public function __construct(){
        $this->segments = explode('/', $_SERVER['REQUEST_URI']);
        $this->setControllers();
        $this->setMethod();
    }

    public function setConntroller(){
        $this->controller = empty($this->segments[1])?'home':$this->segments[1];
    }

    public function setMethod (){
        $this->method = empty($this->segments[2])?'index':$this->segments[2];
    }
}
```

## Response

## Controller

## Views

## Modelo - Vista - Controlador
Un diagrama del sistema de modelo vista controlador:

![ModeloVistaControlador][img]
[img]: files/modelo-vista-controlador.jpeg
