<?php
class Brain_controller {

  private static $instance;

    function __construct(){
      self::$instance =& $this;

      $this->load =& load_class("loader");
      //var_dump($this->load);
      $this->load->initialize();
    }
    
    public static function &get_instance(){
		  return self::$instance;
	  }

}
