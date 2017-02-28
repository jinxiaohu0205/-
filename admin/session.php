<?php
	session_start();
//	$_SESSION["ok"]="yes";
	if(!isset($_SESSION["is_login"])){
		$message="请登录";	
		$url="login.php";
		include"mess.html";
		exit;
	}
?>