# Curso de programazión orientada a objetos en PHP

## Deuda Técnica

Es el coste y los intereses a pagar por hacer mal las cosas. El sobre esfuerzo a pagar para mantener un producto software mal hecho y lo que conlleva, como el coste de la mala imagen, etc.

### ¿Cómo evitar la deuda técnica?

1. Tenemos que programar con pruebas
1. Documentar a tiempo
1. Refactorizar (mejorar) de inmediato nuestro clíente

## Code smell

Hace referencia al mal olor del código. Este concepto no se refiere a errores técnicos, sino a errores de orden y de diseño. Esto succede cuando intentamos construir soluciones a partir de otras soluciones. La solucióna estos casos es crear una abstaracción.

### Como evitarlo

1. Programación límpia
1. Evita crear grandes métodos, grandes clases o super clases
1. Necesitamos evitar copiar un código que funciona y llevarlo a otro archivo

## Codigo espagueti

Un codigo espagueti es código que esta esta estructurado mediante _if_, _while_, _for_ netamente, todo en un mismo archivo donde solamente buscamos resolver el problema.

### Como evitarlo
1. resolver el problema
1. crea de forma lógica y coherente diferentes métodos que reemplazen tus estructuras de control
1. Crea una o varias clases dependiendo del caso

## Inclusion de Archivos

__include__ : Nos permite incluir un archivo dentro de otro. Sino lo encuentra solo genera una advertencia (Warning) que permite continuar.

__require__ : Incluye un archivo dentro de otro. Sino lo encuentra no permite continuar y genera un error.

__require_once__ : Incluye un archivo dentro de otro. Sino lo encuentra no permite continuar si ya esta incluido no lo vuelve a incluir.

## Clases y Objetos 

Para definir una clase se debe usar la palabra clave _class_, para declarar un objeto se usa la palabra clave _new_.
```php
/**
* Definición
*/
class foo{
    // Código ...
} 

// Declaración

$Ofoo = new foo;
```

Podemos ampliar una clase para crear otra con la palabra clave _extends_.

```php
class bigfoo extends foo{
    // código ...
}
```
### Abstracción

Significa aislar, separar o sacar del contexto o del resto de elementos que lo acompañan, solucionando la pregunta del _¿que hace?_ envex de _¿como lo hace?_.

#### Como realizar abstracción

* __Interface__

Usando la palabra clave _interface_ podemos construir una clase sin metodos definidos, unicamente declarado, de modo que cualquier metodo que implemente la interfaz debe definir el funcionamiento de los metodos.

```php
//Definición
interface Store{
    public function get();
    // ...
}

//Declaración
class SnapStore Implements Store{
    public function get{
        // Implementación ...
    }
}
```
the INTERFACE describes the methods that we need to access our database. It does NOT describe in any way HOW we achieve that. That's what the IMPLEMENTing class does. We can IMPLEMENT this interface as many times as we need in as many different ways as we need. We can then switch between implementations of the interface without impact to our code because the interface defines how we will use it regardless of how it actually works. Como buena practica los archivos que contienen interfaces deben llevar el nombre de la clase seguido por la palabra interfaz para poder diferenciarla.

* __Abstract__

Usando la palabra clave _abstract_ podemos construir clases con metodos parcialmente definidos, lo que seria como una clase incompleta.Las clases definidas como abstractas no se pueden instanciar y cualquier clase que contiene al menos un método abstracto debe ser definida como tal. Los métodos definidos como abstractos simplemente declaran la firma del método, pero no pueden definir la implementación.
```php
abstract class Base{
    function get(){
        // Implementación de metodo común...
    }
    abstract public function store();
}
```
Cualquier clase que extienda una clase abstracta, la nueva clase debe definir los metodos abstractos.

### Visibilidad

La visibilidad de una propiedad, un método o (a partir de PHP 7.1.0) una constante se puede definir anteponiendo a su declaración una de las palabras reservadas public, protected o private. A los miembros de clase declarados como 'public' se puede acceder desde donde sea; a los miembros declarados como 'protected', solo desde la misma clase, mediante clases heredadas o desde la clase padre. A los miembros declarados como 'private' únicamente se puede acceder desde la clase que los definió. 

* __public__ : Puede ser accedido por todos, o seá por cualquier elemento o clase.
* __protected__ : Podrá ser accedido a nivel de clases, paquetes y subclases.
* __private__ : Solo puede ser accedido a nivel de clase y no puede ser accedido por clases hijas.

### Modularidad

La modularidad es, en programación modular y más específicamente en programación orientada a objetos, la propiedad que permite subdividir una aplicación en partes más pequeñas (llamadas módulos), cada una de las cuales debe ser tan independiente como sea posible de la aplicación en sí y de las restantes partes.

### Polimorfismo

el polimorfismo se refiere a la propiedad por la que es posible enviar mensajes sintácticamente iguales a objetos de tipos distintos. El único requisito que deben cumplir los objetos que se utilizan de manera polimórfica es saber responder al mensaje que se les envía.

### Constructor

Para pasar argumentos a la hora de declarar un objeto usamos la palabra clave `__construct`

```php
class foo{
    public function __construct($arg, ...){
        // Código ...
    }
}
```

### Palabra clave final

la palabra clave final, que impide que las clases hijas sobrescriban un método, antecediendo su definición con final. Si la propia clase se define como final, entonces no se podrá heredar de ella.
###
Podemos requerir el tipo de dato de los paramatros de entrada y de salida para las fuciones.

```php
function (foo $arg): int {
    //Código ...
    return (int) ...
}
```
## Test Driven Development

