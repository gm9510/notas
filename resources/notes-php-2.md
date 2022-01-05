# Curso de Manejo de datos en PHP Platzi

## Comillas

Las comillas simples y las comillas dobles tienen comportamientos diferentes en php. 
Ejemplo:

```php
$name = tomate;

echo '<br>';
echo 'el nombre es ' .  $name;
echo '<br>';
echo "el nombre es $name";
```

## Extracción de datos

## Formato de datos

## Expresiones regulares

Signos clave

* /: Contenedor
* ^: INICIO
* $: FINAL
* -: RANGO
* []: PATRÓN
* {}: CONDICIÓN

## Proyecto con phpunit

Instalamos phpunit con el comando

```bash
$ composer require --dev phpunit/phpunit
```

Agregamos al composer.json, nombre, descripción y autoload con psr-4, queda del siguiente modo

```php
{
    "name": "gtomato/validate",
    "description": "Proyecto de validación",
    "autoload": {
        "psr-4":{
            "App\\": "src/"
        }
    },
    "require-dev": {
        "phpunit/phpunit": "^9.5"
    }
}
```

Ejecutamos composer dump en la terminal para aplicar la configuración

```bash
$ composer dump 
```

### Configuramos phpunit.xml

La estructura basica del documento es: 
```XML
<?xml version="1.0" encoding="UTF-8"?>

<phpunit bootstrap="vendor/autoload.php" colors="true">
    <testsuite name="Test dir">
        <directory>tests</directory>
    </testsuite>
</phpunit>
```

Debemos crear en el directrio una carpeta con el nombre tests, en esta carpeta creamos el archivo ValidateTest.php que testeará la clase Validate que aún no hemos creado. ValidateTest.php contiene:

```php
<?php

use PHPUnit\Framework\TestCase;
use App\Validate;

class ValidateTest extends TestCase{
    public function test_email(){
        $email = Validate::email('i@rimorsoft.com');
        $this->assertTrue($email);
    }
}
```

Ejecutamos en la terminal el comando
```bash
$ vendor/phpunit/phpunit/phpunit
```
y rectificamos que nos arroje un error ya que no hemos defindo la clase Validate. Una rectificado esto, procedemos a crear la clase Validate.php en el directorio src/, teniendo en cuenta que la clase debe tener el mismo nombre del archivo que la contiene y este nombre debe corresponder con el usado en el test, en este documento incluimos el siguiente codigo:
```bash
<?php

namespace App;

class Validate{
    public static function email($value){
        return (bool) filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
```

Ejecutamos el test de nuevo y para este caso ya deberiamos tener el test correcto. Este es el flujo de trabajo que se debe seguir en todos los proyectos de php en el cual primero diseñamos las pruebas que permiten determinar el comportamiento del usar que vamos a construir.

## Funciones

una función e PHP se declara como
```php
<?php

function foo($arg1, &arg2, $arg3 = 'default'){
    // Codigo ...
}
```
donde $arg1, $arg2, $arg3 son los argumentos, $arg2 es un argumento pasado por referencia, y $arg3 es un argumento con valor predeterminado.

__return__

la palabra clave return permite devolver valores una vez ejecutada la función, el primer return de la función termina la ejecución es esta. No confundir con exit() que detiene la ejecución del sistema.

### Closures

Las funciones anonimas se definen como
```php
$foo = function ($arg1, ...){
   // Codigo ..
    return $value;
};
```

Estas funciones sirven como parametros de entredas de otras funciones, para forzar que un argumentod de una función sea una función anonima debemos usar la palabra clave __Closure__

```php
function goo (Closure $arg){
    // Codigo ...
}
```

De este modo el argumento debe ser una función anonima.

## Arrays

Definimos un array simple como

```php
$list = [
    'elemento1',
    'elemento2',
    'etc
]
```

Se accede a los datos con `$list[i]` que nos arroja el i-esimo elemento de la lista, tambien podemos cambiear los keys con los que se identifican los elementos

```php
$list = [
    'elemento1',
    10=>'elemento2',
    'etc
]
```
### Arrays complejos

### Funciones PHP para arrays

* sort()-> ordena un array
* rsort() -> ordena un array en orden inverso
* ksort() -> ordena un array por clave
* krsort() -> ordena un array por clave en orden inverso
* array_slice() -> Extrae una parte de un array
* array_chunk() -> Divide un array en fragmentos
* array_shift() -> quita el primer elemento del array
* array_pop() -> quita el ultimo elemento del array
* array_unshift() -> Añade al inicio del array uno o mas elementos
* array_push() -> añade al final uno o mas elementos
* array_flip() -> Intercambia todas las claves de un array con los sus respectivos valores

## Comparación

* array_diff_assoc: Calcula la diferencia entre arrays con chequeo adicional de indices.

# Preguntas

1. ¿Que es PHP avanzado?
r es conocer en detalle lo que el lenguaje nos ofrece

1. ¿Que es un array simple?
r Es un array sin keys definidos

1. ¿Como imprimo un elemento complejo?
r echo "Quiero aprender {$courses['backend'][0]}";

1. ¿Que es una función anónima'
r Es lo que usamos cuando una variable tiene la necesidad de lógica

