# Platzi Curso fundamentos de PHP

## Herreamientas para seguir el curso
PHP es un lenguaje del lado del servidor web, para desarrollar aquí  debemos convertir nuestro en un servidor web sin importar el metodo ni la manera de hacerlo.

Se requieren tres cosas

* Un servidor web
* Un lenguaje de programación
* Una base de datos

Alternativas para un servidor web con php

1. XAMPP
1. MAMP
1. Laragon
1. VALET (MAC)
1. HOMESTEAD

__Comandos de PHP__

* `php --help` -> muestra todos los comandos disponibles en php
* `php -v`-> Version de php
* `php -S <addr>:<port>` -> _Ej:_ `php -S localhost:8000` -> Ejecutar un servidor web incorporado.

### Configurar LAMP (Linux + Apache + MySQL + PHP)

TODO: 
* Como instalar y configurar apache
* Como instalar y configurar mysql
* Como instalar y configurar php

[Tutorial Lamp](https://www.digitalocean.com/community/tutorials/como-instalar-linux-apache-mysql-php-lamp-en-ubuntu-16-04-es)


Determinar la dirección ip del servidor

input: 
```
$ ip addr show wlp2s0 |grep inet | awk '{ print $2; }' | sed '/\/.*$//'
```

output:
```
192.168.1.14
fe80::80f7:f4ff:b2b1
```
Agregar al final del archivo /etc/apache2/apache2.conf

`ServerName dominio_del_servidor_o_ip`

usar el comando 

input: `$ sudo apache2ctl configtest`

output: `Syntax OK`

Modificar el archivo /etc/apache2/mods-available/dir.conf de modo que index.php sea el archivo destacado.

```
<IfModule mod_dir.c>
	DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm
</IfModule>
```

Reiniciamos el servicio apache2 y verificamos que este funcionando

`$ sudo sysmtemctl restart apache2`
`$ sudo sysmtemctl status apache2`

__Test del servidor__

Creamos un script de php llamado info.php para corrobrar que esta funcionando el servidor

```php
<?php
phpinfo();
?>
```
este archivo debe crearse en el DcoumentRoot de apache, para mi caso /var/www/apache2/

buscamos en nuestro explorador web la dirección localhost:8080/info.php

__Ejemplo php__

Otro ejemplo para testear php

```php
<html>
 <head>
  <title>Prueba de PHP</title>
 </head>
 <body>
   <h1>Prueba</h1>
  <?php echo '<p>Hola Mundo</p>'; ?>
 </body>
</html>
```

### Instalando Composer

Composer es una herramienta popular de administración de dependencias para PHP, creada principalmente para facilitar la instalación y actualización de dependencias de proyectos. Comprueba los demás paquetes de los que depende un proyecto específico y los instala utilizando las versiones apropiadas según los requisitos del proyecto.

[Guia de instalacion de composer](https://www.digitalocean.com/community/tutorials/como-instalar-y-utilizar-composer-en-ubuntu-18-04-es)

##Composer

Todo projecto de php debe ser manejado con composer que permite aldministrar las librerias de las que depende el proyecto. Para configurar composer se debe construir crear el archivo composer.json, como ejemplo de configuración tenemos
```JSON
{
    "name": "myproject/name",
    "autoload":{
        "psr-4":{
            "namespace\\": "src/"
        },
        "files": [
            "src/helpers.php"
        ]
    }
}
```

de aquí leemos que el namespace será "Text" que apunta a la carpeta __src__, de este modo en el mismo directorio debemos crear la carpeta __src__ y dentro de esta el archivo helpers.php. Finalmente contruimos el proyecto utilizando el comando
```bash
$ composer dump
```
el cual creara una carpeta llamada vendor y un archivo llamado composer.lock.

### Manejo de paquetes con composer

Todos los paquetes que maneja composer se encuentran en un repositorio centralizado llamado packagist.org, aquí podemos ver la información de todos los paquetes disponibles.

Para instalar paquetes se usa el comando

```bash
$ composer require project/name
```

Por otro lado podemos instalar paquetes en modo desarrollo

```bash
$ composer require --dev project/name
```
#### Creando un proyecto nuevo

Composer tiene como herramienta un comando que nos permite contruir el archivo compoper.json de manera mas sencilla en interactiva

```bash
$ composer init
```
para instalar las librerias usamos el comando 

```bash
$ composer install
```

#### Comandos composer

* `$ composer dump` -> Se crea la configuración del proyecto.
* `$ composer install` -> installa dependencias.
* `$ composer require` -> Configura el paquete requerido.
* `$ composer remove`-> remueve un paquete especifico.
* `$ composer self-update`-> actualiza composer.
* `$ composer update` -> revisa si hay actualizaciones para las dependencias instaladas.


### Composer lock

Este archivo contiene las descripciones de las versiones instaladas y usadas en el proyecto en especfico.
