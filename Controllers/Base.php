<?php

class Base extends Controlleur {

    function index(){

    }

    public function login(){
        //
        $s = Session::loadSession();
        if($s->loginVerification())$this->redirect("Base/index");
        if(!$this->request->data ) return;
        $HashedPass = "8cb2237d0679ca88db6464eac60da96345513964";
        $pass = $this->request->data->password;
        $login = $this->request->data->login;

        if(sha1($pass) === $HashedPass && $login="Admin"){
            $data = array();
            unset($this->request->data->password);
            foreach($this->request->data as $k=>$v)
                $data[$k] = $v;
            $s->setLoginSession($data);
        }else{
            $s->setFlash("Authentification échouée !!","danger");
            return;
        }
        $this->redirect("Base/index");
        die();



    }

    public function logout(){
        //
        $s = Session::loadSession();
        if($s->loginVerification()){
            $s->disconnect();
        }
        $this->redirect("Base/index");
    }
    
    public function download($controller, $id, $fichier){
        $file = UPLOADS.DS."{$fichier}";

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
        }
        switch ($controller) {
            case 'F':
                $this->redirect("Formations/details/".$id);
                break;
            
            default:
                $this->redirect("Base");
                break;
        }
    }

    public function FAQ(){
        $model = new Model("faq","IdQuestion");
        $model->getAll();
        $this->model = $model;
    }

}