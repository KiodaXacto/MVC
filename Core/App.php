<?php
class App {
    var $request ;  //domaine.com/controlleur/methood/Id/name

    Function __construct (){//Constructeur exécution du disp - première fonction 
        $this->request= new Request(); 
        //$this->request = new stdClass();//Objet vide 
        /*$this->request->controlleur = "Controlleur";//extraction du controlleur
        $this->request->action = "index";//extraction de la Methode
        $this->request->params = [];// extraction des params*/
        $controlleur = $this->LoadControlleur();
        
        //gérer le cas ou la méthode n'existe pas TODO
        call_user_func_array(array($controlleur,$this->request->action),$this->request->params);
        $controlleur->render();

    }

    function LoadControlleur(){
        
        $name= ucfirst ($this->request->controlleur);//nom contrlleur 
        
        $file= ROOT.DS."Controllers".DS.$name.".php";//
        
        //Exister controlleur
        if (file_exists($file)){
             require_once $file ;
             return new $name($this->request); //instance controlleur $name nom du controlleur 

        }else{
            echo " fichier n'existe pas ";
        }
        


    }

}

?>