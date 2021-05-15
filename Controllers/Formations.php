<?php

class Formations extends Controlleur {
    public function index(){
        $model = new Model("formation","IdForm  ation");
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
        $data = array();
        
        foreach ($this->request->data as $k=>$v){
            $data[$k] = $v;
        }
        $data["Duree"] = intval($this->request->data->jours)*24 + intval($this->request->data->heurs);
        unset($data["jours"]);
        unset($data["heurs"]);

        $model->save($data);
        $this->redirect("Formations/index");

    }

    public function details($id){
        if(!isset($id)) die("il faut un ID");
        $model = new Model("formation","IdFormation");
        $model->getOneById($id);
        $this->model = $model;
        /*echo "<pre>";
        print_r($model);
        echo "</pre>";
        die();*/
        if($this->request->data){
        /*echo "<pre>";
        print_r($this->request);
        echo "</pre>";
        die();*/
        }else{
            return;
        }
        $data = array();
        
        foreach ($this->request->data as $k=>$v){
            $data[$k] = $v;
        }
        $data["Duree"] = intval($this->request->data->jours)*24 + intval($this->request->data->heurs);
        unset($data["jours"]);
        unset($data["heurs"]);

        $model->save($data);
        $this->redirect("Formations/details/".$id);

    }

    public function delete($id){
        if(!isset($id)) die("il faut un ID");
        $model = new Model("formation","IdFormation");
        $model->delete($id); 
        $this->redirect("Formations/index");
    }
}

