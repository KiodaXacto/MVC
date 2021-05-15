<?php

class Errors extends Controlleur {
    public function index(){
        $this->request->controlleur = "Errors";
        $this->request->action = "index";
        header("HTTP/1.0 500 Internal Server Error"); 
        $vars = array();
        $vars["title"] = "Ooops ! j'ai tout Cassé !";
        $vars["subTitle"] = "500 Internal Server Error"; 

        $this->render($vars);
    }

    public function e404(){
        $this->request->controlleur = "Errors";
        $this->request->action = "index"; 
        header("HTTP/1.0 404 Not Found");
        $vars = array();
        $vars["title"] = "404";
        $vars["subTitle"] = "404 Not Found"; 
        $this->render($vars);
    }

}