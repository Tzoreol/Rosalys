<?php

class Login extends Controller {

	protected $displayErrorBox;
	protected $errorList = array();
	
	function init() {
		$displayErrorBox = false;
		
		if(!isset($_SESSION['failedLoginCount'])) {
			$_SESSION['failedLoginCount'] = 0;
		}
		
		if(isset($_SESSION['failedLogin']) && $_SESSION['failedLogin']) {
			$displayErrorBox = true;
			array_push($this->errorList, "La combinaison login / mot de passe est incorrecte");
		}
		
		//Once verification is done, reset failedLogin
		$_SESSION['failedLogin'] = false;
		
		include(dirname(dirname(dirname(__FILE__))) ."/Views/Login/Login.php");
	}
	
	function submit() {
	
		if(isset($_POST['login']) && isset($_POST['password'])) {
			if (($_POST['login'] == "fdufresne") && (md5($_POST['password']) == "dea43825def89093357e178f41102cba")) {
				$_SESSION['logged'] = true;

				header('Location: ' .BASE_DIR. "/Dashboard");
			} else {
				$_SESSION['failedLoginCount']++;
				$_SESSION['failedLogin'] = true;
				
				header('Location: ' .BASE_DIR);
			}
		} else {
			header('Location: ' .BASE_DIR);
		}
	}
}
?>