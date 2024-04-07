<?php
if(isset($_SESSION)){
//	print_r($_SESSION);
	if(isset($_SESSION["userId"]) && !empty($_SESSION["userId"]) && isset($_SESSION["name"]) && !empty($_SESSION["name"])){

		$last_Login = get_lastLoginDetails($conn, $_SESSION["userId"]);
		$current_Login = $_SERVER["HTTP_USER_AGENT"];
		$current_Login = md5($current_Login);
	        //echo $_SESSION["userId"];    
		if(getIpAddress() == $last_Login["ip"]){

			if($current_Login == md5($last_Login["system"])){
				define('sitename', 'The Chandni Chowk');
				$user = $_SESSION["userId"];
				$admin = $_SESSION["admin"];
				$comission = $_SESSION["comission"];
			}else{
				header('Location: logout.php?error&session=0');
				exit;
			}			
		}else{
			header('Location: logout.php?error&ip=0');
			exit;
		}
	}else{
		header('Location: logout.php?error&login=0');
		exit;
	}
}
?>