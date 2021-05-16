<?php

class Evenements extends Controlleur {
    public function index(){
        $model = new Model("evenement","IdEvent");
        $model->getAll();
        $this->model = $model;
        if($this->request->data){}else{
            return;
        }

        $data = array();
        
        foreach ($this->request->data as $k=>$v){
            $data[$k] = $v;
        }
        
        if($model->save($data)) $this->redirect("Evenements/details/".$model->lastInsert);
    }

    public function details($id){
        
        $model = new Model("evenement","IdEvent");
        $model->getOneById($id);
        $this->model = $model;
        if(count($model->list)<= 0){
            //si on trouve pas uen formation on provoque une erreur type page introuvable
            $this->request->Errors->e404(); 
            die();
        }
        $files =  new Model("fichier","id");
        $files->exec("select * from fichier where evenement = {$id}");
        $model->files = $files->list;
        $members = new Model("inscrit","id");
        $members->exec("select * from inscrit join membre on inscrit.IdMembre = membre.IdMembre where inscrit.IdEvent  = {$id}");
        $model->members = $members->list;
 
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

        

        $model->save($data);
        $this->redirect("Evenements/details/".$id);
        die();

    }

    public function delete($id){
        if(!isset($id)) die("il faut un ID");
        $model = new Model("evenement","IdEvent");
        $model->delete($id); 
        $this->redirect("Evenements/index");
    }
    
    public function uploadFile(){
        $model = new Model("fichier","id");
        $file = $this->request->data->file;
        $path = $this->validateFileToUpload($file);
        $evenement = $this->request->data->evenement;

        if($path){
            extract($path);
            $data = array();
            $data["name"] = $name;
            $data["path"] = $to;
            $data["evenement"] = $evenement;
            move_uploaded_file($from, UPLOADS.DS.$to);
            $model->save($data);
        }
        $this->redirect("Evenements/details/".$evenement);
    }

    public function register (){
        $membre = new Model("membre","IdMembre");
        $linkToEvent = new Model("inscrit","id");
        $email = $this->request->data->Mail;
        $membre->exec("select * from membre where Mail='{$email}'");
        $IdMembre = null;
        $IdEvent = $this->request->data->IdEvent;
        unset($this->request->data->IdEvent);
        $exist = false;
        if(count($membre->list)>0){
            $IdMembre = $membre->list[0]->IdMembre;
            $exist = true;
            if($IdEvent){
                $linkToEvent->exec("select * from inscrit where IdMembre = '{$IdMembre}' and IdEvent='{$IdEvent}'");
                if(count($linkToEvent->list)>0){
                    $s = Session::loadSession();
                    $s->setFlash("Vous êtes déjà inscrit dans cet evenement","info");
                    $this->redirect("Evenements/details/{$IdEvent}");
                    die();
                }
                
            }else{
                $this->redirect("Evenements/details/{$IdEvent}");
                die();
            }
        }
        $data = array();
        $dataInscrit = array();
        foreach ($this->request->data as $k=>$v){
            $partsKey = explode("_",$k);
            if(count($partsKey)<=1)
                $data[$k] = $v;
            else $dataInscrit[end($partsKey)] = $v;
        } 

        if(!filter_var($data["Mail"],FILTER_VALIDATE_EMAIL)){
            $s = Session::loadSession();
            $s->setFlash("Email invalide","danger");
            $this->redirect("Evenements/details/{$IdEvent}");
            die();
        }

        if($IdMembre)$data["IdMembre"]  = $IdMembre ;
        if($exist || $membre->save($data, true)){
            
            $IdMembre = $IdMembre?$IdMembre:$membre->lastInsert;
            $data = $dataInscrit;
            $data["IdEvent"] = $IdEvent;
            $data["IdMembre"] = $IdMembre;
            if($linkToEvent->save($data, true)){
                $this->redirect("Evenements/details/{$IdEvent}");
                die();
            }
        } 
        $this->redirect("Evenements/details/{$IdEvent}");
        die(); 
    }
}

?>