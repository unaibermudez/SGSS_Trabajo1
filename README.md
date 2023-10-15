# SGSS_Trabajo1# SGSS_Trabajo1

En este proyecto hemos creado una pagina web sobre un concesionario de coches alojada en un
conjunto de servicios corriendo en contenedores Docker. En concreto, este
sistema está basado en una arquitectura Linux + Apache + MariaDB (MySQL) + PHP 7.2 en Docker Compose. 

## Integrantes del grupo

Este proyecto está compuesto por los siguientes integrantes:
- Diego Eugenio Zabala
- Unai Bermudez Osaba
- Peio Lopez

## Instrucciones para iniciar el sistema

Primero crea una carpeta con el nombre que perfieras e introduce los siguientes comandos:

$cd "nombre de la carpeta" #para situarte dentro de la carpeta 

$git clone https://github.com/unaibermudez/SGSS_Trabajo1.git #para clonar el repositorio en la nueva carpeta

Introduce los siguientes comandos para iniciar los contenedores:

-Situa la terminal dentro del repositorio /SGSS_Trabajo1
```
$ docker build -t="web" .  # si la imagen no está buildeada
$ docker-compose up -d
```

Para parar los servicios:
```
$ docker-compose stop
```

Una vez iniciado el sistema deberían funcionar las siguientes urls:
- Web: [http://localhost:81](http://localhost:81)
- phpMyAdmin: [http://localhost:8890](http://localhost:8890)

En http://localhost:8890 deberas importar el archivo database.sql que se encuentra dentro de la carpeta SGSS_Trabajo1 para importar la base de datos

## Descripción del sistema web 

El sistema web se trata de una aplicación que implementa las siguientes
funcionalidades:

1. Registro de usuarios introduciendo y comprobando el formato de los
   siguientes datos:
    - Nombre y apellidos (sólo texto) 
    - DNI (formato xxxxxxxxZ aplicando algoritmo para comprobar la letra)
    - Teléfono (tienen que ser 9 números)
    - Fecha nacimiento (formato aaaa-mm-dd)
    - E-mail (formato e-mail válido)
    - "Contraseña" y "Repetir contraseña" coinciden

2. Identificación en base a un nombre de usuario y contraseña

3. Modificación de datos de un usuario identificado (realizar comprobaciones
   del formato).

4. Posibilidad de añadir nuevos coches al sistema

5. Generación de un catalogo con todos los coches que esten en la base de datos

6. Posibilidad de modificar los datos de los coches del catálogo.

7. Posibilidad de eliminar coches del catalogo

## Fuentes e Iconos
Hemos utilizado iconos de https://fontawesome.com y fuentes de https://fonts.google.com

