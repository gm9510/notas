# Curso de API REST

__¿Que es una API y para que sirve?__

Las siglas son "Aplication Programming Interface", se trata de regla para la inetrección entre dos aplicaciones y es un concepto antiguo en el mundo de la programación.

## Conceptos de las principales REST

### ¿Que es y como funciona HTT

### ¿Que significa REST? y ¿qué es una API RESTful?

REST (Representational State Transfer)

Conceptos REST:

* Recurso 
* URI
* Acción

Petición REST:

* URL
* Verbo HTTP (GET, POST, ...)

¿Cuando conviene?

* Interacciones simples.
* Recursos de Hardware limitados.

¿Cuando no conviene?

* Cuando las interacciones son más complejas y necesitamos que el servidor aporte más lógica.

## Como realizar un petición

Podemos usar curl en la terminal:

```bash
$ curl https://xkcd.com/info.0.json
```

y esto nos debe mostrar la respuesta del servidor en la terminal. como ejemplo esto tambien se puede realizar en un script de PHP:

```php
<?php
$url = 'https://xkcd.com/info.0.json';
echo file_get_contents($url).PHP_EOL;
```

que ejecutado desde la terminal debe arrojarnos el mismo resultado de curl.

## Aprendiendo a reproducir servicios REST

Podemos crear un servidor con php usando el comando
```bash
$ php -S localhost:8000 server.php
```
solicitamos los servicios a este servidor usando 

__GET:__

```bash
$ curl localhost:8000?resource_type=foo
```
__POST:__

```bash
$ curl -X 'POST' http://localhost:8000/books -d '{<json-content>} 
```

__PUT:__
```bash
$ curl -X 'PUT' http://localhost:8000/books/id -d '{<json-content>}
```

__DEELET:__
```bash
$ curl -X 'PUT' http://localhost:8000/books/id
```

## Autenticación de úsuario

### Autenticación via HTTP

Este tipo de autenticación es bantante frágil, pero bastante simple de implemetar, en esta se envian los datos de usario en una URL HTTP.

```bash
$ curl http://user:password@localhost:8000/books
```
En PHP la información se captura  usando la variable de entorno server:

* `$_SERVER['PHP_AUTH_USER']`: para el usuario
* `$_SERVER['PHP_AUTH_PW']`: para la constraseña

### Autenticación via HMAC 

HASH MESSAGE AUTENTICATION CODE, se requiren tres componentes paara este metodo:

* Función Hash.
* Clave Secreta.
* UID: User ID.

Podemos generar claves usando el metodo integrado `sha1()` de php, la idea consiste en compartir una llave secreta que compartan el cliente y el servidor, con esta llave, el nombre de usuario y una marca de tiempo se genera un hash encriptado, este al ser recibido por servidor es comparado con el hash generado internamente, usando de nuevo la llave secreta, y ambos hash deben coincidir si el usuario usó la llave correcta. En PHP la información se captura en las variables:

* `$_SERVER['PHP_X_HASH']`: para el Hash. 
* `$_SERVER['PHP_X_TIMESTAMP']`: para la marca de tiempo.
* `$_SERVER['PHP_X_UID']`: para el user id. 

### Autenticación via Access Token

En este tipo de autenticación se requere un servidor para que el cliente solicita un token, que puede ser generado usando Hash, a un servidor a autenticación. Con el token de acceso el cliente puede solicitar servicios al servidor REST el cual valida el token solicitando la validación de este en en el servidor de autenticación, si este valida el token el servidor REST responde con la información solicitada.

* `$_SERVER['HTTP_X_TOKEN']`: para el almacenamiento del token.

Para la conección entre servidores PHP se hace usode la fuciones.

* `curl_init()`
* `curl_setopt()`
* `curl_exec()` 

## Errores en la comunicación REST

Usando el metodo `http_response_code()` integrado en php podemos devolver códigos de error especificos para informar al cliente del estado de su solicitud.
[HTTP status codes](https://httpstatuses.com/)

## Buenas practicas

* Usar como nombres de los recursos sustantivos.
* en las url usar plurales.
* Hacer las mdificaciones con los verbos HTTP que corresponden: POST, PUT o DELETE.
* Usarl relaciones para subrecursos.
* Naavgabilidad via vinculos.
* Colecciones filtrables, ordenables y paginables.
* APIs versionables.
