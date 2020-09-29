Foro Escarlata
==============

Autores
-------

El proyecto "Foro escarlata" fue elaborado por Edgar Jesús Moreno Castañeda y Jorge Muñoz Piñera. Fue elaborado con el fin de tener a la mano una maqueta de un Foro que ayude a los estudiantes a resolver sus dudas.

Formamos parte del grupo de programación de 5°A Matutíno del Centro de Bachillerato Tecnológico Industrial y de Servicios Numero 130 y este es el proyecto de la primera unidad.


Contexto
--------

Este proyecto está elaborado con el fin de proporcionar la maquetación y diseño correspondientes para Un foro que tiene de nombre Escarlata, el cual consiste en realizar preguntas y respuestas referentes a temas de Matemáticas, Lectura/Escritura y Ciencias. La maquetación y diseño son tanto de las páginas principales correspondientes al frontend como de la base de datos. No se descarta ningún cambio a futuro que pueda realizarse para mejorar el rendimiento o funcionamiento del proyecto.


Diseño
------


### Paginas principales (FrontEnd)

El diseño de las páginas principales consiste en (de momento) 7 páginas distintas, de las cuales 2 y 4 usan la misma plantilla. Cabe comentar que el diseño en gran medida se realizó con BootStrap

#### Página principal y secciones de Foro (5)
Éstas páginas consisten en una division de la pantalla en 4 secciones: 
* La barra de navegación
* Una imagen correspondiente a la izquierda o derecha (la cual no se muestra en dispositivos moviles o en pantallas con proporciones inferiores a una medida en especifico)
* El contenido de la página correspondiente al otro lado
* Un pie de página al final.

#### Páginas de inicio de sesión (2)
Éstas paginas tambien contienen una barra de navegación y un pie de página, sin embargo estas en el centro unicamente contienen un formulario para realizar la tarea correspondiente. Dichos formularios contienen validaciones correspondiente para un correcto ingreso de datos, sin embargo a futuro se piensa colocar tambien una validación de parte del backend para una seguridad completa de la página.


### Base de datos

De momento la base de datos consiste en unicamente 3 tablas con sus respectivas llaves primarias e indices. Corresponden a la base de datos llamada *proyecto_33_35*.

#### Tabla 'comentarios'
Consiste en una tabla con el prposito de almacenar los comentarios que distintos usuarios realizen haciendo referencia a publicaciones especificas.
```sql
-- Se crea la tabla 'comentarios' con los siguientes campos y valores
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(20) NOT NULL,
  `usuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `publicacion` int(20) NOT NULL,
  `comentario` varchar(600) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- A la tabla comentarios se le añaden llaves específicas
-- para la ´id´ de la publicación así como el usuario y publicación
-- correspondientes.
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `publicacion` (`publicacion`);

-- Por ultimo se añade un AUTO_INCREMENT para la llave ´id´
ALTER TABLE `comentarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
```

#### Tabla 'publicaciónes'
Consiste en una tabla para almacenar las publicaciónes que distintos usuarios elaboran con respecto a un tema correspondiente.
```sql
-- Se crea la tabla 'publicaciónes' con los siguientes campos y valores
CREATE TABLE IF NOT EXISTS `publicaciones` (
  `id` int(20) NOT NULL,
  `usuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `tema` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `titulo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `texto` varchar(600) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

ALTER TABLE `publicaciones`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
```

#### Tabla 'usuarios'
Consiste en una tabla para almacenar la información correspondiente a cada usuario.
```sql
-- Se crea la tabla 'usuarios' con los siguientes campos y valores
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(70) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena` varchar(80) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Se uriliza el campo usuario como llave primaria.
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);
```

#### Relaciones
Se hacen las relaciones correspondientes entre las tablas usuarios/comentarios, publicaciones/comentarios y usuarios/publicaciones.
```sql
-- Relaciones de la tabla comentarios
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1`

  	FOREIGN KEY (`publicacion`)
  	REFERENCES `publicaciones` (`id`)
  	ON DELETE NO ACTION ON UPDATE NO ACTION,

  ADD CONSTRAINT `comentarios_ibfk_2`

  	FOREIGN KEY (`usuario`)
  	REFERENCES `usuarios` (`usuario`);

-- Relaciones de la tabla publicaciones
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1`

  FOREIGN KEY (`usuario`
  REFERENCES `usuarios` (`usuario`)
  ON DELETE NO ACTION ON UPDATE NO ACTION;
```

BackEnd
-------

El backend consiste en un proyecto de **NodeJS** con distintos modulos complementarios y un gestor de vistas renderizado con php. Entre los modulos mas importantes se encuentran: 

* Express js
* mysql
* php

Los cuales permiten renderizar el proyecto de una manera eficiente. Contiene una carpeta **./public** donde se almacenan los archivos que estarán disponibles para los usuarios y dentro de la carpeta **./private/layout** se encuentran los distintos archivos php que fungen como plantillas para renderizár las páginas con la información establecida.

Aún no hay una conexión útil con la base de datos, sin embargo ya se contienen los archivos necesarios para crear la base de datos automaticamente y sus distintas tablas con tansolo ingresar la información de la base de datos en el archivo **./database.json**.

A su vez contiene un gestor de rutas que administra los archivos por parte del backend. Ademas tambíen contiene un modulo personalizado para realizar consultas de una manera mas eficiénte.

* El archivo para importar la base de datos se encuentra en la ruta **./private/sql/proyecto_33_35.sql**

El cual contiene las consultas necesarias para importar la base de datos, sin embargo no es necesario exportarla manualmente, ya que el proyecto tiene la capacidad de generarla automaticamente.


Instalación
-----------

A continuación los pasos necesarios para correr el proyecto y ejecutarlo sin ningun error.

0. Es necesario tener instalado NodeJS, PHP y MySQL para que el proyecto pueda funcionar.

1. Es necesario modificar el archivo **./database.json** con la información correspondiente al host de las bases de datos correspondiente.

2. Abrir la carpeta principal del pryecto y ejecutar el comando npm install.
```sh
npm install
```
3. Es importante realizar modificaciónes pertinentes con respecto a php para que el proyecto pueda renderizár las paginas correctamente.
	1. Se necesita añadir *php* a las variables de entorno. En caso de no saber como hacerlo puedes realizar busquedas en internet sobre **Como añadir php** o puedes ver el video de [Agregar php a variables de entorno del sistema | Windows 10](https://www.youtube.com/watch?v=TuZBMM-kDlk)
	2. Se necesita modificar el archivo php.ini y colocar el parametro `short_open_tag=On` para habilitar las etiquetas cortas `<? ?>`. Esto es necesario ya que partes del codigo y a su vez el modulo que utiliza el proyecto utilizan dichas etiquetas. Puedes apoyarte en [este video de Youtube](https://www.youtube.com/watch?v=I3VdOz7sCt0).
4. Por último se deberá ejecutar el comendo npm start para correr el proyecto.
```sh
npm start
```
5. Se podrá visualizar el proyecto (una vez iniciado) en la ruta [localhost:3000](http://localhost:3000/) y se podrá ver el enriquezido diseño minusiosamente elaborado de parte del frontEnd.