<?php
class Session{
    var $hasMessge = false;
    public static $s = null;
	private function __construct(){
		if(!isset($_SESSION))
			session_start();
	}

    public static function loadSession(){
        return Session::$s ? Session::$s : new Session();
    }

	function set($key, $value = null){ 
		if(!is_array($key)){
			$_SESSION[$key] = $value;
		}else{
			foreach($key as $k => $v){
				$_SESSION[$k] = $v;
			}
		}
	}
	
	function get($key){
		if(!is_array($key)){
			return $_SESSION[$key];
		}else{
			$d = array();
			foreach($key as $k){
				$d[$k] = $_SESSION[$k];
			}
			return $d;
		}
	}
	
	function setLoginSession($data){
        $_SESSION = array();
		$this->set($data);
		$hash = array();
		foreach($data as $k => $v){
			$hash[]= $v;
		}
		$hash = implode('-',$hash); 
        $hash = sha1($hash);
		$this->set('hash',$hash);
	}
	
	function disconnect(){
		foreach($_SESSION as $k=>$v){
			$this->set($k,"");
		}
		session_destroy();
	}
	
	function exist($key){
		if(isset($_SESSION[$key]))
			return !empty($_SESSION[$key]);
		return false;
	}
	
	function loginVerification(){

		if($this->exist('hash')){// c bn
			$hash = array();
			foreach($_SESSION as $k =>$v){
				if($k != 'hash' && $k != 'flash')
					$hash[] = $v;
			}
			$hash = implode('-',$hash); 
            $hash = sha1($hash);
			if($hash == $this->get('hash'))
				return true;
		}
		return false;
	}
	
	function setFlash($msg, $type = "success"){
        $this->hasMessge = $type === "danger" ? true: false;
		$_SESSION['flash'] = array(
			'message' =>$msg,
			'type' =>$type
		);
	}
	
	function flash(){
		if(!$this->exist('flash'))
			return;
		$flash = '<div class="alert alert-'.$this->get('flash')['type'].'">'.$this->get('flash')['message'].'</div>';
		$this->set('flash');
		return $flash;
	}	
}
?>