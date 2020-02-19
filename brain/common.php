<?php
/* Se crea la funcion para cargar las vistas */
if ( ! function_exists('view')){
    function view($view, $data = NULL){
        if(file_exists(VIEWSPATH.DS.$view.".php")){
            if(count($data) > 0){
                extract($data);
            }
            include_once(VIEWSPATH.DS.$view.".php");
        }
        else{
            http_response_code(404);
            echo "Vista no encontrada";
        }
    }
}
/* Se crea la funcion para cargar los modelos */
if ( ! function_exists('model')){
    function model($model){
        $class_name = ucfirst($model);
        if(!class_exists($class_name)){
            include_once(BASEPATH.DS."models".DS.$model.".php");    
        }
        $class_name = ucfirst($model);
        return new $class_name();
    }
}
/* Se crea la funcion para cargar los helpers */
if ( ! function_exists('helpers')){
    function helpers($helper){
        if(file_exists(HELPERSBRAINPATH.DS.$helper.".php")){
            include_once(HELPERSBRAINPATH.DS.$helper.".php");
        }
        else if(file_exists(HELPERSPATH.DS.$helper.".php")){
            include_once(HELPERSPATH.DS.$helper.".php");
        }
        else{
            http_response_code(404);
            echo "El helper " . $helper . " no esta definido";
        }
    }
}
/* Se crea la funcion de lengiaje */
if ( ! function_exists('language')){
    function language($seccion,$tag){
        global $config;
        if(file_exists(LANGUAGEPATH.DS.$config["language"].DS.$seccion.".json")){
            $data = file_get_contents(LANGUAGEPATH.DS.$config["language"].DS.$seccion.".json");
            $language_tag = json_decode($data, true);
            echo $language_tag[$tag];
        }
    }
}
