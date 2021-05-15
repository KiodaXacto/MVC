<?php 

class Controlleur {
    var $request;
    var $model;
    function __construct($request){
        $this->request = $request;
    }

     public function render (){
         // vue
         $view = VIEW.DS.$this->request->controlleur.DS.$this->request->action.".php";
         // layout
         $layout = VIEW.DS."layout.php";
         $data = $this->model;

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
    /*private static $instance;
    private static $dbInstance;
    private function __construct(){
    }

    public function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new Core();
        }
        return self::$instance;
    }

    public static function gatherAllInformationIndex(){
      
        $res =  Model::gatherAllInformationIndex();
		foreach($res as $r){
            echo $r;
        }
    } 

    public static function updateEvent(){
        if (empty ($_POST['TitreE']) OR empty ($_POST['ContenuE']) )
        {
            die ('Veuillez remplir le formulaire pour poster votre évenement');
        }
        $numE=$_POST['numE'];
        $TitreE=$_POST['TitreE'];
        $DateE=$_POST['DateE'];
        $ContenuE=$_POST['ContenuE'];
        $Prix=$_POST['Prix'];
        $TypeE=$_POST['TypeE'];
        
        echo Model::updateEvent($TitreE,$ContenuE,$DateE,$Prix,$TypeE,$numE);
    }
    public static function Delete() {
    
        echo Model::Delete($num);
		
    }*/
}
?>