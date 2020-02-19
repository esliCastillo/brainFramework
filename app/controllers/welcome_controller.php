<?php
class Welcome_controller extends Brain_controller{

	public function index(){
        $this->load->model("prueba","p");
        //var_dump($this);
        //echo "hola a todos";
        //echo $this->p->hola();
        $data["nombre"] = $this->p->hola();
        $this->load->view("welcome",$data);
    }
}