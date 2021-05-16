<?php 

class Controlleur {
    var $request;
    var $model;
    function __construct($request){
        $this->request = $request;
    }

     public function render ($vars = null){
         if($vars)
            extract($vars);

         // vue
         $view = VIEW.DS.$this->request->controlleur.DS.$this->request->action.".php";
         // layout
         $layout = VIEW.DS."layout.php";
         $data = $this->model;
         $s = Session::loadSession();

         $___Render_Curent_View = "";
         
         if (file_exists($view)){
            ob_start();
            require_once $view ;
            $___Render_Curent_View = ob_get_clean(); 
            require_once $layout ; 

        }else{
            echo " fichier n'existe pas ";
        }
     }

     function redirect($url, $code = null){
		if($code == 301){
			header("HTTP/1.1 301 Moved Permanently");
		}
                    
        //die(debug(Router::url("teacher/login")));
        //die(BU.Url::getUrl($url));
		header("location:http://localhost".Url::link($url));

	}

    protected function validateFileToUpload($file){
        extract($file);
        $nameParts = explode(".",$name);
        $fileExt = strtolower(end($nameParts));
        $allorwedFiles = array('pdf');//si demain on veut autriser un autre type de fichier 
        $path = null;
        if(in_array($fileExt,$allorwedFiles) && $error === 0 && $size <= 600000){
            $uniqueName = uniqid('',true).".{$fileExt}";
            $path = array();
            $path["name"] = $name;
            $path["from"] =  $tmp_name;
            $path["to"] = $nameParts[0]."_".$uniqueName;
        }
        return $path;
    }
}
?>