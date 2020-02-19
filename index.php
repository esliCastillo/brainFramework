<?php 
//Se obtinen la url
$request_uri = $_SERVER["REQUEST_URI"];
//$request_uri = DS.DIRBASEPATH.DS;
//Se define el separador
define('DS', DIRECTORY_SEPARATOR);

//Se define el path base de la aplicacion
$apppath = str_replace("\\",DS,dirname(__FILE__));
$apppath = str_replace("/",DS,$apppath);
define('BASEPATH', $apppath.DS."app");
//Se define el path dir base
define('DIRBASEPATH', substr($request_uri,strpos($request_uri,basename(BASEPATH))));
//Se define el path de controladores
define('CONTROLLERSPATH', BASEPATH.DS."controllers");
//Se define el path de vistas
define('VIEWSPATH', BASEPATH.DS."views");
//Se define el path de los helpers de la aplicacion
define('HELPERSPATH', BASEPATH.DS."helpers");
//Se define el path base del framework
define('BASEBRAINPATH', $apppath);
//Se define el path de los helpers del framework
define('HELPERSBRAINPATH', BASEBRAINPATH.DS."brain".DS."helpers");


//Se obtienen las configuraciones
$config_path = BASEPATH.DS."config".DS."config.php";
//Se obtienen el lenguaje
define('LANGUAGEPATH', BASEPATH.DS."language");
if(file_exists($config_path)){
    include_once($config_path);
}
/*Se define el entorno del aplicativo
*   dev
*   prod
*/
define('ENVIRONMENT', $config["enviroment"]);
/* ERROR REPORTING*/
switch (ENVIRONMENT){
	case 'dev':
		error_reporting(-1);
		ini_set('display_errors', 1);
	break;
	case 'prod':
		ini_set('display_errors', 0);
		if (version_compare(PHP_VERSION, '5.3', '>=')){
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
		}
		else{
			error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
		}
	break;
	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'El ambiente de la aplicación no es correcto.';
		exit(1); // EXIT_ERROR
}
//echo "<pre>";print_r(substr($request_uri,strpos($request_uri,basename(BASEPATH))));echo"</pre>";;
include_once(BASEBRAINPATH . DS . "brain" . DS . "brain.php");
