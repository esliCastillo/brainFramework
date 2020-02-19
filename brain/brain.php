<?php
/*
*   Se cargan la funciones comunes
*/
include_once(BASEBRAINPATH . DS . "brain" . DS . "common.php");
//Se obtiene el nombre del controlador con su metodo y sus parametros
$params = array();
//$uri = explode("/",$request_uri);
$uri = explode(DS,DIRBASEPATH);
if(empty($uri[2])){
    $contolador_name = $config["controller_default"]."_controller";    
}
else{
    $contolador_name = $uri[2]."_controller";
}

$method_name = (isset($uri[3]) && !empty($uri[3]))?$uri[3]:"index";
for($i=4; $i < count($uri); $i++){
    $params[] = $uri[$i];
}
$uriInter = substr($request_uri,0,strpos($request_uri,basename(BASEPATH)));
if(!empty($uri[1])){
    $uriR = DS.$uriInter.$uri[1];
}
else{
    $uriR = "";
}
//Se obtine la uri base de la aplicacion
if (isset($_SERVER['HTTPS'])) {
    define('URIBASE', "https://".$_SERVER["HTTP_HOST"].$uriR);
}
else{
    define('URIBASE', "http://".$_SERVER["HTTP_HOST"].$uriR);
}
//Se carga el controlador base
require_once(BASEBRAINPATH . DS . "brain" . DS . "controller.php");
function &get_instance(){
	return Brain_controller::get_instance();
}
//echo BASEBRAINPATH;
function &load_class($class, $directory = "", $param = NULL){
    $classLoad = NULL;
    if(!empty($directory)){
        $path = BASEBRAINPATH . DS . "brain" . DS . $directory . DS . $class . ".php";
    }
    else{
        $path = BASEBRAINPATH . DS . "brain" . DS . $class . ".php";
    }
    if(file_exists($path)){
        
        $name_class = 'Brain_'.$class;
        if (class_exists($name_class, FALSE) === FALSE){
            require_once($path);
            $classLoad = (isset($param))?new $name_class($param): new $name_class();
		}
    }
    return $classLoad;
}

//echo CONTROLLERSPATH.DS.$contolador_name.".php";
//Se carga el controlador invocado, en caso de no encontrarlo lanza un error 404
if(file_exists(CONTROLLERSPATH.DS.$contolador_name.".php")){
    include_once(CONTROLLERSPATH.DS.$contolador_name.".php");
    try{
        $class_load = new $contolador_name();
        if(count($params) > 0){
            call_user_func_array(array($class_load, $method_name), $params);
            //$class_load->$method_name(implode(",",$params));
        }
        else{
            $class_load->$method_name();
        }
    }catch(Exception $e){
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}
else{
    http_response_code(404);
    echo "Pagina no encontrada";
    //header("Status: 404 Not Found");
}
