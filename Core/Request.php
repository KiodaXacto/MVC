<?php

Class Request {
    var $url = "/";
    var $controlleur = "Base";
    var $action = "index";
    var $params = [];

    function __construct(){
        $this->url = isset($_SERVER["PATH_INFO"])?$_SERVER["PATH_INFO"]:"/";
        $aux = explode("/",trim($this->url, "/"));
        if(count($aux) > 0){ 
            $this->controlleur = $aux[0] && $aux[0]!="" ?$aux[0]:$this->controlleur;
            unset($aux[0]);
            $aux = array_values($aux);
            if(count($aux) > 0){
                $this->action = $aux[0];
                unset($aux[0]);
                $aux = array_values($aux);
            }
            $this->params = $aux;
        } 

    }
}