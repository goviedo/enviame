# Instructivo.

## Precondiciones.

* No debe estar ocupado el puerto 80.

Repositorio:

* https://github.com/goviedo/enviame.git


# Ejercicio 1.


Luego, en la carpeta raiz del proyecto, ejecutamos la instrucción:

* docker-compose up -d

# Ejercicio 2. FAKE y CRUD.

**Para la creación de datos Fake**, Se accede a la ruta local:

* http://localhost/empresa

**CRUD**

Se sujiere utilizar Postaman:

* GET: http://localhost/api/empresas
* POST: http://localhost/api/empresas con key nombre y valor Unimarc por ejemplo.
* GET: Para 1 empresa utilizar:
  * http://localhost/api/empresa?id=1
* UPDATE: http://localhost/api/empresas?id=1&nombre=Los Canarios
* DELETE: http://localhost/api/empresas?id=40

Notar que existan los id para la eliminación y la actualización.

# Ejercicio 3.

Para este ejercicio, le pediría al negocio que me diera las palabras por separado,
generar una división de cuales son las palabras o cadenas de texto que son iguales
se complejiza. Si las palabras las tenemos separadas, entonces solo basta con recorrer
éstas y aplicar el algoritmos de palíndrome y se encuentran.

Separando las palabras se aplica algoritmo de palindrome por palabra y se obtienen cuales
son las cadenas de texto al reves y al derecho de forma mucho más sencilla.

Nota: Disponible en la carpeta raiz, dentro del directorio palindromes.

Se ejecuta como: node palindromes.js olo

Donde olo es la palabra a encontrar como palindrome.


# Ejercicio 4. Consumo API Enviame.

**Nota**

* cd node-api-call
* node app.js
* Ejecutar en el browser: http://localhost:3000


# Fibonacci. Ejercicio 5.

En la carpeta raiz de github, existe una carpeta llamada serie-fibonacci.
Al ejecutar 

```
node fb.js

```

URL Ayuda: https://medium.com/codeinsights/starting-parallel-programming-in-node-js-with-napa-js-ef80e20ec6c2

Intentara encontrar entre los 1000 numeros fibonnacci, quien tenga 1000 divisores.


**NOTA**

* Toma un tiempo extremo ejecutarlo, por lo tanto se necesita una ejecucion en paralelo para usar todos los workes disponibles de la maquina. Por motivos de tiempo
no pude realizar la prueba en paralelo.
 

# Ejercicio 6. Tiempo de entrega en días.

* cd tiempo-entrega-dias
* node index.js 7 
* donde 7 es la cantidad de datos aleatorios a visualizar.

# DB. Ejercicio 7.

```
CREATE TABLE countries ( id int(10) unsigned NOT NULL AUTO_INCREMENT, continent_id int(11) NOT NULL, name varchar(25) NOT NULL, PRIMARY KEY (id) );

CREATE TABLE continents ( id int(10) unsigned NOT NULL AUTO_INCREMENT, name varchar(25) NOT NULL, anual_adjustment int(11) NOT NULL, PRIMARY KEY (id) );

CREATE TABLE employees ( id int(10) unsigned NOT NULL AUTO_INCREMENT, country_id int(11) NOT NULL, first_name varchar(25) NOT NULL, last_name varchar(25) NOT NULL, salary int(11) NOT NULL, PRIMARY KEY (id) );

insert into continents values (null, 'América', 4); insert into continents values (null, 'Europa', 5); insert into continents values (null, 'Asia', 6); insert into continents values (null, 'Oceanía', 6); insert into continents values (null, 'Africa', 5);

insert into countries values (null, 1, 'Chile'); insert into countries values (null, 1, 'Argentina'); insert into countries values (null, 1, 'Canadá'); insert into countries values (null, 1, 'Colombia'); insert into countries values (null, 2, 'Alemania'); insert into countries values (null, 2, 'Francia'); insert into countries values (null, 2, 'España'); insert into countries values (null, 2, 'Grecia'); insert into countries values (null, 3, 'India'); insert into countries values (null, 3, 'Japón'); insert into countries values (null, 3, 'Corea del Sur'); insert into countries values (null, 4, 'Australia');

insert into employees values (null, 1, 'Pedro', 'Rojas', 2000); insert into employees values (null, 2, 'Luciano', 'Alessandri', 2100); insert into employees values (null, 3, 'John', 'Carter', 3050); insert into employees values (null, 4, 'Alejandra', 'Benavides', 2150); insert into employees values (null, 5, 'Moritz', 'Baring', 6000); insert into employees values (null, 6, 'Thierry', 'Henry', 5900); insert into employees values (null, 7, 'Sergio', 'Ramos', 6200); insert into employees values (null, 8, 'Nikoleta', 'Kyriakopulu', 7000); insert into employees values (null, 9, 'Aamir', 'Khan', 2000); insert into employees values (null, 10, 'Takumi', 'Fujiwara', 5000); insert into employees values (null, 11, 'Heung-min', 'Son', 5100); insert into employees values (null, 12, 'Peter', 'Johnson', 6100);

```

El select para calcular el reajuste es como sigue:

```
select e.first_name, e.last_name, e.salary, cont.anual_adjustment,

       case
           when e.salary <= 5000 THEN ROUND((e.salary*cont.anual_adjustment/100)+e.salary,0)
            ELSE e.salary
        END
                as adjustment_salary,
       if(e.salary<=5000,'YES','NO') as readjustment,

       c.name, cont.name
from employees e inner join countries c on e.country_id = c.id inner join continents cont on c.continent_id = cont.id;
```

# Documentación de Generación de la APP con Laravel.

# Supuestos.

* Se trabaja con sistema operativo Linux.
* Se tiene instalado las siguientes aplicaciones:
  * PHP composer.
  * GIT
  * Se debe trabajar en la carpeta de trabajo HOME (~/)
 
## Contenedor Laravel PHP

Seguir los siguientes pasos:

```
cd ~
git clone https://github.com/laravel/laravel.git laravel-app
```

```
cd laravel-app
```

A continuacion instalamos en la [imagen]() docker de la aplicacion en Laravel composer para evitar instalarla localmente en el S.O.

```
docker pull composer
```

Copiamos el contenido del directorio de laravel-app al contenedor y la carpeta vendor de laravel se copie donde corresponda.

```
docker run --rm -e $(pwd):/app composer install
```

Establecemos los permisos del usuario actual que esta utilizando en toda la carpeta (debe tener acceso sudo):

```
sudo chown -R $USER:$USER ~/laravel-app
```

## Creación de docker-compose.yml

Defeniremos la comunicación entre contenedores, los directorios "bind" con el host y la configuración en modo bridge para la comunicación entre sí.

Para simplificar, crearemos tres contenedores.

a) Para la aplicación
b) Para el nginx
c) Para la base de datos.

Ver archivo docker-compose.yml en la raiz del proyecto con la especificación app, webserver y bd respectivamente.

* El archivo que contiene los datos de la bd mysql se llama dbenviame
* /var/www enlazado al directorio ~/laravel-app que permite que la app se monte en /var/www
* Archivo de configuración ubicado en host ~/laravel-app/php/local.ini enlazado a /usr/local/etc/php/conf.d/local.ini
* Archivo my.cnf ubicado en ~/laravel-app/mysql/my.cnf enlazado con /etc/mysql/my.cnf en el contenedor nginx.

## Creación de archivo Dockerfile para generar el contenedor de aplicación Laravel.

Es necesario crear un contenedor Dockerfile el que contendrá los pasos necesarios para que laravel entre en funcionamiento con:

* Una imagen debian que contiene PHP-FPM FastCGI.
* Las librerias o paquetes necesarios: mcrypt, pdo_mysql, mbstring e imagick
* Establecemos usuario www para seguridad extra (en vez de root)
* Exponemos el puerto 9000 la app.

## Permisos en la bd al usuario configurado.

```
docker-compose exec db bash
```

```
GRANT ALL ON enviame.* TO 'enviame'@'%' IDENTIFIED BY 'enviame_pass';
```

```
docker-compose exec app php artisan migrate
docker-compose exec app php artisan config:cache
```

# Creacion de faker

Este paso no se detallará pero es como sigue:

* Creamos un modelo Empresa, con id y nombre.
* Creamos un factory y le agregamos un faker.
* Creamos una ruta en web.php /empresa

Luego llamamos a la url en un navegados

> http://localhost/empresa

y tenemos nuestro faker creado en nuestra bd.

# CRUD.

Con Postman pueden generar, segun el verbo HTTP, ejemplos.

* GET (Todas las empresas): http://localhost/api/empresas
* GET (Una empresa): http://localhost/api/empresa?id=1
* POST (Crear una empresa): http://localhost/api/empresas
  * key: nombre
  * value: Unimarc
* UPDATE (Actualizar una empresa): http://localhost/api/empresas 
  * key: id, value: <id-actualizar>
  * key: nombre, value: Los Mercantes
* DELETE (Eliminar una empresa): http://localhost/api/empresas
  * key: id, value: <id-eliminar>


# Notas de mi desarrollo finales. Como conclusión.

* Mysql fallo al iniciar en la version latest y en la 5.2.X, entonces, para simplificar, usamos postgres.
* Lo anterior implica tambien cambiar configuraciones de instalacion de la app en el dockerfile para que incluya el pdo para postgres.
* Luego en Debian no existian candidatos para pdo-pgsql en laravel.
* Forzamos la reinstalacion con la version de mysql 5.7.22
* Lidiar con el error "empty continuation line" in Dockerfile
* composer en laravel me obligo a subir a la version php 7.3 y tuve que sacar la extensión zip por fallos en la compilacion.

