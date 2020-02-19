
Requerimientos:

Se utiliza la libreria mongoDB por lo cual se nesesita instalar la extencion php-mongodb:

sudo apt-get install php-mongodb

//Validar la existencia del la extencion en php.ini o donde tengan las extenciones 
extension=mongodb.so

en el directorio kernel/libraries ejecutar

composer install

Configuraciones base:

Se encuentran en config/config.php

enviroment -> Es el entorno en el que se encuetra, util para ver mensajes de error en caso de estar en hambiente de desarrollo		("dev"=>Desarrollo "prod"=>Produccion)
autoload -> Se especifica si se van a cargar librerias, helpers y modelos de manera automatica(Se recomienda siempre valor true)
language -> Se especifica el idioma en el que se va a mostrar(hay que crear los archivos del idioma y emplear la funcion language en donde se 		    desea aplicar)



Autoload
En caso de emplear la configuracion autoload

helpers -> Carga las funciones creadas en helpers(En desarrollo, de momento se debe de especificar todos los helpers para que se carguen al 		   inicio)
libraries -> Se cargan las librerias(En desarrollo, de momento se debe de especificar todas las librerias para que se carguen al 		   inicio)
models -> Se cargan los modelos(Al indicar que se carguen desde el comienso para su uso en las clases se almacenan en la propiedad "visor" de 		cada clase ejemplo $this->visor->perfiles->getAll();)


MongoDB:
la configuracion se encuentra en config/mongoDB.php
Para la utilizacion de mongo se emplea la libreria mongoDb que se carga con autoload al inicio de la aplicacion

Agregar js a la vista:

Para agregar archivos js a la vista se debe de crear en el directorio assets/js/ un directorio con el nombre de la vista que corresponda y de manera automatica se incluiran los archivos js que se encuentren en el directorio
