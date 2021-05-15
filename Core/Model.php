<?php

Class Model{

    public $db = null;
    public $table = "formation";
    public $list = [];
    public $primaryKey = "id";
    public $lastInsert = null;
    
    public function validate($data){
        foreach($data as $k=>$v){ 
            if(is_null($v)) return false;
            $var = trim($v);
            $var = ltrim($var);
            if(!is_numeric($var) && empty($var)){
                echo $var."<br>";
                return false;
            }
        }

        return true;
    }

    function __construct($table, $pkey = "id"){
        //récupération des données
        $this->db = DataBase::getConnection();
        $this->table = $table;
        $this->primaryKey = $pkey;
    }

    public function getAll(){
        $sql = "select * from ".$this->table;
        $pre = $this->db->prepare($sql);
		$pre->execute();
		$this->list = $pre->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOneById($id = "1"){
        $sql = "select * from {$this->table} where {$this->primaryKey} = {$id}";
        $pre = $this->db->prepare($sql);
		$pre->execute();
        $this->list = $pre->fetchAll(PDO::FETCH_OBJ);
    }

	function save($data, $inscription=false){
        // nom = elsa ; prenom = lorem 
        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/
        $s = Session::loadSession(); 
        if(!$inscription && !$s->loginVerification())return;
        if(!$this->validate($data)){
            $s->setFlash("Merci de vérifier que les champs sont bien rempli", "danger");
            return false;
        }
        
		$key = $this->primaryKey;
		$fields = array();
		$w = array();
		foreach($data as $k => $v){
            if($k != $key){
                $fields[] = "$k=:$k";
                $w[":$k"] = $v;
            }elseif(!empty($v)){
                $w[":$k"] = $v;
            }
		}
		if(!isset($data[$key])){
			$sql = "INSERT INTO ".$this->table." SET ".implode(',',$fields);
		}else{
            $sql = "UPDATE ".$this->table." SET ".implode(',',$fields)." WHERE ".$key."=:".$key;
        }
		if(isset($sql)){
            //print_r($sql);
            //print_r($w);
			$pre = $this->db->prepare($sql);
			$pre->execute($w);
            if(!isset($data->$key)){
                $this->lastInsert = $this->db->lastInsertId();
            }
			return true;
		}
		
		return false;
	}
	
	function delete($id){
        $s = Session::loadSession();
        if(!$s->loginVerification())return;
		$sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = $id";
		$this->db->query($sql);
	}

    public function exec($sql, $type = true){
        $select = explode(" ", $sql);
        if(count($select) === 0 || strtolower($select[0])!=="select"){
            $s = Session::loadSession();
            if(!$s->loginVerification())return;
        }
        if(isset($sql)){
			$pre = $this->db->prepare($sql);
			$pre->execute();
            if($type) $this->list = $pre->fetchAll(PDO::FETCH_OBJ);
            else $this->lastInsert = $this->db->lastInsertId();
			return true;
		}
		return false;
    }

}