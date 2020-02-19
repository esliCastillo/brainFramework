<?php
Class Visor_model {

    public $visorDB;
    public $session;
    public $log;

    function __construct(){
        global $visorDB;
        $this->visorDB = $visorDB;

        global $session;
        $this->session = $session;

        global $log;
        $this->log = $log;
    }

    public function find($params = array(),$cols = array(),$sort= array(),$limit = null){
        return $this->visorDB->find($params,$this->collection_name,$cols,$sort,$limit);
    }

    public function findOne($params = array(),$cols = array()){
        return $this->visorDB->findOne($params,$this->collection_name,$cols);
    }

    public function findOne2($params = array(), $collection_name2, $cols = array()){
        return $this->visorDB->findOne($params,$collection_name2,$cols);
    }

    public function insert($params = array(),$cols = array()){
      return $this->visorDB->insert($params,$this->collection_name,$cols);
    }

    public function insert2($params = array(), $collection_name2, $cols = array()){
      return $this->visorDB->insert($params,$collection_name2,$cols);
    }

    public function update($criteria = array(),$new_object = array(), $options = array()){
      return $this->visorDB->update($criteria,$this->collection_name,$new_object,$options);
    }

    public function update2($criteria = array(),$new_object = array(), $options = array(), $collection_name2){
      return $this->visorDB->update($criteria,$collection_name2,$new_object,$options);
      // echo $collection_name2;
    }

    public function remove($criteria,$options = array()){
      return $this->visorDB->remove($criteria,$this->collection_name,$options);
    }

    //metodo para agregar datos al archivo log
    public function insertLog($componente, $mensaje, $tipo){
      return $this->log->putLog($componente, $mensaje, $tipo);
    }
    //extrae datos del archivo log
    public function getLog($file){
      return $this->log->getLogAsArray($file);
    }
}
