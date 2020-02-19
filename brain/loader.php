<?php
class Brain_loader{
    public function initialize(){
        $this->autoload();
    }
    protected function autoload(){

    }
    public function model($model, $name = ""){
        if(empty($model)){
            return "Imposible cargar un modelo vacio";
        }
        if(empty($name)){
            $name = $model;
        }
        $class_name = ucfirst($model)."_model";
        if(!class_exists($class_name)){
            include_once(BASEPATH.DS."models".DS.$model."_model.php");    
        }
        $brain =& get_instance();
        $brain->$name = new $class_name();
        return $this;
    }
    public function view($view, $data = NULL){
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