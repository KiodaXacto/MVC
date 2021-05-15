<?php

class Formations extends Controlleur {
    public function index(){
        $model = new Model("formation","IdFormation");
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
        
        if($model->save($data)) $this->redirect("Formations/details/".$model->lastInsert);

    }

    public function details($id){
        
        $model = new Model("formation","IdFormation");
        $model->getOneById($id);
        $this->model = $model;
        if(count($model->list)<= 0){
            //si on trouve pas uen formation on provoque une erreur type page introuvable
            $this->request->Errors->e404(); 
            die();
        }
        $files =  new Model("fichier","id");
        $files->exec("select * from fichier where formation = {$id}");
        $model->files = $files->list;
        
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
        die();

    }

    public function delete($id){
        if(!isset($id)) die("il faut un ID");
        $model = new Model("formation","IdFormation");
        $model->delete($id); 
        $this->redirect("Formations/index");
    }

    public function uploadFile(){
        $model = new Model("fichier","id");
        $file = $this->request->data->file;
        $path = $this->validateFileToUpload($file);
        $formation = $this->request->data->formation;
        if($path){
            extract($path);
            $data = array();
            $data["name"] = $name;
            $data["path"] = $to;
            $data["formation"] = $formation;
            move_uploaded_file($from, UPLOADS.DS.$to);
            $model->save($data);
        }
        $this->redirect("Formations/details/".$formation);
    }

    private function validateFileToUpload($file){
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

    public function register (){
        $membre = new Model("membre","IdMembre");
        $linkToFormation = new Model("inscritf","id");
        $email = $this->request->data->Mail;
        $membre->exec("select * from membre where Mail='{$email}'");
        $IdMembre = null;
        $IdFormation = $this->request->data->IdFormation;
        unset($this->request->data->IdFormation);
        $exist = false;
        if(count($membre->list)>0){
            $IdMembre = $membre->list[0]->IdMembre;
            $exist = true;
            if($IdFormation){
                $linkToFormation->exec("select * from inscritf where IdMembre = '{$IdMembre}' and IdFormation='{$IdFormation}'");
                if(count($linkToFormation->list)>0){
                    $s = Session::loadSession();
                    $s->setFlash("Vous êtes déjà inscrit dans cette formation","info");
                    $this->redirect("Formations/details/{$IdFormation}");
                    die();
                }
                
            }else{
                $this->redirect("Formations/details/{$IdFormation}");
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


        if($IdMembre)$data["IdMembre"]  = $IdMembre ;
        if($exist || $membre->save($data, true)){
            
            $IdMembre = $IdMembre?$IdMembre:$membre->lastInsert;
            $data = $dataInscrit;
            $data["IdFormation"] = $IdFormation;
            $data["IdMembre"] = $IdMembre;
            if($linkToFormation->save($data, true)){
                $this->redirect("Formations/details/{$IdFormation}");
                die();
            }
        } 
        $this->redirect("Formations/details/{$IdFormation}");
        die(); 
    }
}

