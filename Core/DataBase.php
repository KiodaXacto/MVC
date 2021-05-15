<?php

class DataBase {
    private $db_host = "127.0.0.1:3306";
    private $db_name = "arpp";
    private $db_login = "root";
    private $db_pass = "";
    private $db = null;

    public static $connection = null;

    private function __construct(){
        try{
			$PDO = new PDO(
				"mysql:host=".$this->db_host."; dbname=".$this->db_name.";",
				$this->db_login,
				$this->db_pass,
				array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8')
			);
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$this->db = $PDO;
		}catch(PDOException $e){
            die("cant connect to database !!");
		}
    }

    public function prepare($sql=""){
        return $this->db->prepare($sql);
    }
    public static function getConnection(){
        if (DataBase::$connection !== null) return DataBase::$connection;
        DataBase::$connection = new DataBase();
        return DataBase::$connection; 
    }

    public function lastInsertId(){
        return $this->db->lastInsertId();
    }

    public function query($sql){
        $this->db->query($sql);
    }

}
