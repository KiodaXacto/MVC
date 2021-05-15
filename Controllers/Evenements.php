<?php

class Evenements extends Controlleur {
    public function index(){
        $model = new Model("evenement","IdEvent");
        $model->getAll();
        $this->model = $model;
        if($this->request->data){
        /*echo "<pre>";
        print_r($this->request);
        echo "</pre>";
        //die();*/
        }else{
            return;
        }
    }
}

?>