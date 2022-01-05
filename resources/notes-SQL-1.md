# PostgreSQL

## Como instalar PostgreSQL

[Tutorial](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-postgresql-on-ubuntu-20-04-es)

## Comandos

* `$ sudo -i -u postgres`:  Ingresar al usuario postgres
* `psql`: Usuario postgres predeterminado 
* `\q`: Salir de consola SQL
* `\?`: Listar todos los comandos  
* `\l`: Listar Base de datos
* `\dt`: Listar tablas en una base de datos
* `\c nombre_DB`: Cambiar de base de datos 
* `\d nombre_tabla`: Describir una tabla 
* `\h`: Ver todos los comandos SQL
* `\h nombre_funcion`: Ver la descripción de la función
* `[ctrl]+c`: Cancelar todos los procesos
* `SELECT version();`: ver la version de PostgreSQL
* `\g`: Volver a ejecutar la última función realizada
* `\timing`: Devuelve el tiempo que toma ejecutar una función
* `[ctrl]+l`: Limpiar la consola
* `\dn`: Listar los esquemas de bases de datos actual
* `\df`: Listar las funciones disponibles en la base de datos actual.
* `\dv`: listar las vistas de la base de datos actual
* `\du`: Listar los usuarios y sus roles en la base de datos actual.
* `\s`: Ver historial de comandos
* `\s <nombre_archivo>`: Guarda los comandos en un archivo de texto plano
* `\i <nombre_archivo`: Ejecutar los comandos desde un archivo
* `\e`: Abre un editor de texto plano para escribir comandos y ejecutar los comandos.
* `\ef`: Equivalente a `\e` pero permite tambien editar funciones.

### Tipos de Datos

__Principales__

* Númericos 
* Monetarios
* Texto
* Binarios
* Fecha/Hora
* Boolenos

__Especiales__
* Geométricos
* Dirección de red
* texto tipo bit
* XML
* JSON
* Arreglos

[Tipos de datos](https://www.postgresql.org/docs/11/datatype.html)

## Archivos config

En la conlosola de postgreSQL podemos usar el comando 

`SHOW config_file`

Los archivos de configuración son:
* __postgresql.conf__: Configuración general de postgres, múltiples opciones referentes a direcciones de conexión de entrada, memoria, cantidad de hilos de pocesamiento, replica, etc.
* pg_hba.conf:  Muestra los roles así como los tipos de acceso a la base de datos.
* pg_ident.conf: Permite realizar el mapeo de usuarios. Permite definir roles a usuarios del sistema operativo donde se ejecuta postgres.


## Creación de una base de datos

1. Creamos una base de datos con el siguiente comando:

```
CREATE DATABASE tranporte;
```

1. Nos movemos a la base de datos

```
\c transporte
```

1. Creamos la tabla tren, el SQL correspondiente sería:

```
CREATE TABLE tren ( id serial NOT NULL, modelo character varying, capacidad integer, CONSTRAINT tren_pkey PRIMARY KEY (id) );
```
La columna id será un número autoincremental (cada vez que se inserta un registro se aumenta en uno), modelo se refiere a una referencia al tren, capacidad sería la cantidad de pasajeros que puede transportar y al final agregamos la llave primaria que será id.

1. podemos revisar las deficiones de la tabla

```
\d tren
\d tren_id_seq
```

1. Insertamos valores a nuestra tabla.

```
INSERT INTO tren ( modelo, capacidad ) VALUES ('Volvo 1', 100);
```

1. Consultamos la tabla

```
SELECT * FROM tren;
```

1. Modificamos uno de los elementos de la tabla

```
UPDATE tren SET modelo = 'Honda 0726' WHERE id=1;
```

podemos verificar de nuevo

1. Borramos la fila 
```
DELETE FROM tren WHERE id=1;
```
podemos verificar de nuevo

### Datos de prueba

[Mockaroo](https://www.mockaroo.com/)

## Proyecto tren

* Pasajero 
* Trayecto 
* estación
* tren
* Viaje

## Jerarquia de bases de datos

* Servidor de base de datos
* Motor de base de datos
* Base de datos
* Esquema de base de datos
* Tablas de base de datos

El esquema public contienen la siguientes tablas
* Estaciones
* Pasajeros
* Trenes

Y las tablas de relaciones entre los elementos

* trayecto
* viaje

el esquema relacional se presenta en el siguinte diagrama

![Esquema](Esquema.jpg)

__Estación__
Contiene la información de las estaciones de nuestro sistema, incluye datos de nombre con tipo de dato texto y dirección con tipo de dato texto, junto con un número de identificación único por estación.
__Tren__
Almacena la información de los trenes de nuestro sistema, cada tren tiene un modelo con tipo de dato texto y una capacidad con tipo de dato numérico que representa la cantidad de personas que puede llevar ese tren, también tiene un ID único por tren.

__Trayecto__
Relaciona los trenes con las estaciones, simula ser las rutas que cada uno de los trenes pueden desarrollar entre las estaciones.

__Pasajero__
Es la tabla que contiene la información de las personas que viajan en nuestro sistema de transporte masivo, sus columnas son nombre tipo de dato texto con el nombre completo de la persona, direccion_residencia con tipo de dato texto que indica dónde vive la persona, fecha_nacimiento tipo de dato texto y un ID único tipo de dato numérico para identificar a cada persona.

__Viaje__
Relaciona Trayecto con Pasajero ilustrando la dinámica entre los viajes que realizan las personas, los cuales parten de una estación y se hacen usando un tren.

Podemos crear las tablas usando el siguiente script:

```SQL
CREATE TABLE pasajero(
    id serial NOT NULL,
    nombre varchar(100),
    direccion varchar(100)
);
ALTER TABLE pasajero ADD CONSTRAINT
pasajero_pkey PRIMARY KEY (id);
```
## Particiones

Una participación se realiza usando el script
```SQL
CREATE TABLE bitacora(
    id serial NOT NULL,
    id_evento integer NOT NULL,
    fecha date NOT NULL 
) PARTITION BY RANGE (fecha);
```
Esta partición funciona en base a las fechas, pero solo podemos agregar elementos si existe una tabla que sea partición y que acepte el rango de fechas al cual el dato pertenecé, por ejemplo.

```SQL
CREATE TABLE bitacora_2010-2019 PARTITION OF bitacora
FOR VALUES FROM ('2010-01-01') TO ('2019-12-31');
```

Esta tabla tendra todas las columnas de la tabla de la cual fue particionada, insertamos un dato usando:

```SQL
INSERT INTO bitacora( id_evento, fecha ) VALUES ('2010-01-10');
```

Las tablas particionadas no pueden hacer uso de llaves primarias. Para eliminar tablas usamos el comando `DROP TABLE <table_name>`.

## Creación de Roles

__¿Que puede hacer un rol?__

* Crear y Eliminar
* Asignar Atributos
* Agrupar con otros roles
* Roles predeterminados

* `\h CREATE ROLE`: Ver las funciones del comando create role.
* `CREATE ROLE <user_name>`: Crea un Rol con sin capacidades asignadas.
* `\dg`: Muestra todos los usuarios y sus atributos.
* `ALTER ROLE <user_name> WITH LOGIN;`: le dal usuario la capacidad de realizar login y acceder a la base de datos.
* `ALTER ROLE <user_name> WITH SUPERUSER;`: 
* `ALTER ROLE <user_name> WITH PASSWORD '<password>'`: Asigna contraseña al usuario.
* `DROP ROLE <user_name>`: Elimina un rol.

### Asignar privilegios
Para otorgar privilegios a un rol sobre una tabla usamos

```SQL
GRANT INSERT, SELECT, UPDATE ON TABLE <table_name> TO <role_name>;
```
para dar privilegios sobre todas las tablas en una base de datos a un rol, primero tenemos que restirar los accesos al restos de usuarios.

```SQL
REVOKE CONNECT ON DATABASE <db-name> FROM PUBLIC;

GRANT CONNECT ON DATA BASE <db-name> TO <role_name>;
```

Ahora podemos definir los privilegios por defecto.

```SQL
ALTER DEFAULT PRIVILEGES
FOR ROL <role_name>
IN SCHEMA public
GRANT SELECT, INSERT, UPDATE, DELETE ON TABLES TO <user_name>;
```

Aquí `<role-name>` es el rol que crea tablas, mientra que `<user_name>` es aquel que consige los privilegios. Para revisar los privilegios otorgados en una base de datos usamos `\l`, para ver los privilegios en una tabla podemos usar 
```SQL
\z <table_name>

SELECT grantee, privilege_type FROM information_schema.role_table_grants WHERE table_name= 'table_name';
```
Cualquiera de los dos comandos te brinda la información.

## Llaves Foraneas

```SQL
ALTER TABLE public.trayecto
    ADD CONSTRAINT trayecto_estacion_fkey
    FOREIGN KEY (id_estacion)
    REFERENCES public.estacion (id) MATCH SIMPLE
    ON UPDATE CASCADE
    ON DELETE CASCADE
    NOT VALID;
```

## Generar consultas avanzadas

### SQL JOIN

Muestra todos los elementos de la tabla a, según el a.key, que aparezcan en la tabla b, según b.key:
```SQL
SELECT * FROM <table_name_a>
JOIN <table_name_b> ON (a.key = b.key);
```

Si queremos obtener todos los elementos de la tabla a que no estan en la tabla b usamos:

```SQL
SELECT * FROM <table_name_a>
LEFT JOIN <table_name_b> ON (a.key = b.key)
WHERE b.key IS NULL;
```

### Funciones especiales principales

__ON CONFILCT DO__: 

Este comando nos permite especificar que hacer cuando hay un conflicto en alguna de las operaciones, por ejemplo: la inserción de un dato que ya existe, no hacer nada:

```SQL
INSERT INTO estacion(id, nombre, dirección)
VALUES (1, 'Nombre', 'Calle 1')
ON CONFLICT DO NOTHING;
```

Incersión de un dato que ya existe, cambiar el dato en caso de que este ya exista:

```SQL
INSERT INTO estacion(id, nombre, dirección)
VALUES (1, 'Nombre', 'Calle 1')
ON CONFLICT DO NOTHING;
```

__RETURNING__:

Sometimes it is useful to obtain data from modified rows while they are being manipulated. The INSERT, UPDATE, and DELETE commands all have an optional RETURNING clause that supports this. Use of RETURNING avoids performing an extra database query to collect the data, and is especially valuable when it would otherwise be difficult to identify the modified rows reliably.

```SQL
INSERT INTO estacion(nombre,direccion)
VALUES ('Nombre','Calle 1')
RETURNING *;
```

__LIKE/ILIKE__:

The LIKE expression returns true if the string matches the supplied pattern

```SQL
SELECT nombre FROM pasajero
WHERE nombre LIKE 'o%';
```

__IS/IS NOT__:
Nos permite comparatar tipos de datos que no son estandar. _Ejemplo_: Ver si una tabla tiene valores nulos.

```SQL
SELECT * FROM tren
WHERE modelo IS NULL;
```

__COALESCE__:

The COALESCE function returns the first of its arguments that is not null. Null is returned only if all arguments are null. It is often used to substitute a default value for null values when data is retrieved for display.

__NULLIF__:

Compara dos valores y retorna NULL si son iguales.

__LEAST__: 

The GREATEST and LEAST functions select the largest or smallest value from a list of any number of expressions. The expressions must all be convertible to a common data type, which will be the type of the result. NULL values in the list are ignored. The result will be NULL only if all the expressions evaluate to NULL.

__CASE__:

CASE clauses can be used wherever an expression is valid. Each condition is an expression that returns a boolean result. If the condition's result is true, the value of the CASE expression is the result that follows the condition, and the remainder of the CASE expression is not processed. If the condition's result is not true, any subsequent WHEN clauses are examined in the same manner. If no WHEN condition yields true, the value of the CASE expression is the result of the ELSE clause. If the ELSE clause is omitted and no condition is true, the result is null.

### Vistas

Las vistas son abreviaturas de coandos para la vizualización de tablas, cuando un conjunto de operaciones en tu base de datos se realiza peridicamente la mejor opción es usar vistas para abreviar tiempo escribiendo código.

[Documentiación de Vistas Postgres.](https://www.postgresql.org/docs/9.2/sql-createview.html)

### PL/pgSQL

* [Documentación](https://www.postgresql.org/docs/current/plpgsql.html)
* [Tutorial](http://www2.hawaii.edu/~takebaya/cent285/plpgsql/plpgsql.html)

### Triggers

Los disparadores nos permiten programar funciones cuando se ejecutan actualizaciones de datos o en eventos especificos, las funciones pueden ser escritar con pl/pgSQL.

* [Trigger fucntions](https://www.postgresql.org/docs/current/plpgsql-trigger.html)
* [CRETE TRIGGER](https://www.postgresql.org/docs/current/plpgsql-trigger.html)

## Conexión a bases de datos remota.

Para instalar la extensión usamos el comando

```SQL
CREATE EXTENSION dblink;
```

* [dblink docuementación](https://www.postgresql.org/docs/10/contrib-dblink-function.html)

## Transacciones.

Si se require aplicar un conjunto de operaciónes a una base de datos para cumplir con el principio de atomicidad podemos usar los comandos  __BEGIN__, __COMMIT__ Y __ROLLBACK__ de este modo, si alguna de las operaciones falla se restaura la tabla a su contenido principal.

```SQL
BEGIN;
<operaciones>
COMMIT | ROLLBACK;
```

* [Documentación](https://www.postgresql.org/docs/current/tutorial-transactions.html)
* [Tutorial](https://todopostgresql.com/comandos-de-transacciones-en-postgresql/)

## Extensiones

Postgres tiene modulos que extiende la capacidad de la base de datos, estos se encuentran listados en la [documentación](https://www.postgresql.org/docs/11/contrib.html).

## Mejores practicas.

### Backups y Restauración.

Guardar toda la información de uns base de datos en un script SQL.

```SQL
=# pg_dump source_db_name > db_data.sql
```

Cargar un fichero con la información de una base de datos a una base de datos nueva.

```SQL
=# psql -d new_db_name -f db_data.sql
```
* [Pgdump documentación](https://www.postgresql.org/docs/current/app-pgdump.html)

### Mantenimiento
Se usa vacuum, analyze, reindex y cluster.

* [Documentación](https://www.postgresql.org/docs/current/maintenance.html)

### Replicas

* [Tutorial](https://todopostgresql.com/replicacion-postgresql/)


