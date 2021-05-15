<?php
class App {
    var $request ;  //domaine.com/controlleur/methood/Id/name
    var $Errors; //controlleur des Erreur
    var $session = null; //La Session

    Function __construct (){//Constructeur exécution du disp - première fonction 
        $this->request= new Request(); 
        $this->session = Session::loadSession(); 
        
        //try {
            $controlleur = $this->LoadControlleur();
            ////si l'action/Methode n'existe pas on provoque une erreur type page introuvable
            if(!in_array($this->request->action,array_diff(get_class_methods($controlleur),get_class_methods(get_parent_class($controlleur))))){
                $this->Errors->e404();
            }
        
            call_user_func_array(array($controlleur,$this->request->action),$this->request->params);
            $controlleur->render();
        /*} catch (\Throwable $th) {
            $this->Errors->index();
            
        }*/

    }

    function LoadControlleur(){
        
        $name= ucfirst ($this->request->controlleur);//nom contrlleur 
        
        $file= ROOT.DS."Controllers".DS.$name.".php";//
        $error_controller = ROOT.DS."Controllers".DS."Errors.php";//
        require_once $error_controller;
        $this->Errors = new Errors($this->request);
        $this->request->Errors = $this->Errors;
        
        //Exister controlleur
        if (file_exists($file)){
             require_once $file ;
             return new $name($this->request); //instance controlleur $name nom du controlleur 

        }else{
            //si le controlleur n'existe pas on génére une provoque type page introuvable
            $this->Errors->e404();
            die();
        }
        


    }

}

?>