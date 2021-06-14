# Curso de Bootstrap

## Container

Los contenedores son el elemento de diseño más básico de bootstrap y son necesarios para usar el sistema de grillas predeterminado.

* `.container`: Ancho fijo
* `.container-fluid`: Ancho variable

El sistema de grillas de Bootstrap usa una serie de contenedores, filas y columnas para diseñar y alienear el contenido. Esta construido con flesbox y la filosofia responsive. 
1. Dentro de la clase container debemos incluir siempre filas, esto es la clase `row`
2. Dentro de la clase `row` podemos usar la clase `col-sm` para las columnas, si no especificamos el tamaño el espacio se distribulle equitativamente
3. El container de bootstrap se puede dividir hasta en 12 partes, usan `col-3` por ejemplo contruimos una columna que ocupa 3 de las 12 partes de la grilla, si la suma total de las columnas en una fila no da doce, bootstrap genera otra fila para la siguiente columna.
4. podemos espeficar diferentes configuraciones de columnas para diferentes tamaños de pantalla usando `col-12-lg`, exiten diferentes puntos de ruptura que pueden ser cofigurados.
5. Podemos dezplazar las columnas usando la clase `offset`

### El footer

Clases destacadas
* `text-center`: para centrar texto
* `pb`: padding bottom
* `pt`: padding top

### El header

Clases destacadas

* `navbar`: Es el contenedor de la barra de navegación.
* `navbar-dark`: Tema para fondos oscuros.
* `bg-dark`: Elige el fondo del tema oscuro por defecto de Bootstrap
* Renamed .ml-* and .mr-* to .ms-* and .me-*.
* Renamed .pl-* and .pr-* to .ps-* and .pe-*.

### Corrusel de imagenes

Clases destacadas

* `carousel`: 
* `slide`:
* [Documentación](https://getbootstrap.com/docs/5.0/components/carousel/) 
