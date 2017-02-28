<?php
	session_start();
	include "db.php";
	$username=$_POST["username"];
	$password=md5($_POST["password"]);
	$sql="select * from loser";
	$result=$db->query($sql);
	while($row=$result->fetch_assoc()){
		if($row["zhanghao"]==$username){
			if($row["pass"]==$password){
				if(!isset($_SESSION["is_login"])){
//					$_SESSION["ok"]="yes";
					$_SESSION["is_login"]="yes";
					$_SESSION["zhanghao"]=$username;
					$message="登录成功";				
					$url="main.php";
					include "mess.html";
					exit;
				}	
			}
		}
	}
	$message="登录失败";				
	$url="login.php";
	include "mess.html";
?>