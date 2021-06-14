# AJAX

Con AJAX puedes

1. Actualizar una pagina web sin recarga la pagina
1. Solicitar datos de un servidor despues de que la pagina a cargado
1. Recibir datos de un servidor despues de que la pagina a cargado
1. Enviar datos a un servidor en segundo plano

## ¿Que es AJAX?

AJAX no es un lenguaje de progrmación, usa una combinación de:

* A browser built-in `XMLHttpRequest` objeto ( para solicitar datos de un servidor web)
* JavaScript y HTML DOM (Para mostrar o usar los datos)

## El objeto XMLHttpRequest

La sintaxis para crear un objeto de esta clase se usa:

```JS
variable = new XMLHttpRequest();
```

### Acceso atravez de dominios

por razones de seguridad, lo exploradores no permiten acceso atravez de dominios, esto significa que ambos, la pagina web y el documento XML, deben estar en el mismo servidor.

### Metodos del objeto

[Metodos W3](https://www.w3schools.com/js/js_ajax_http.asp)
