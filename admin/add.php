<?php
 include "db.php";
 $user=$_POST["username"];
 $pass=md5($_POST["password"]);
 $sql="insert into loser (zhanghao,pass) values ('{$user}','{$pass}')";
 $db->query($sql);
 if($db->affected_rows>0){
 	$message="注册成功";	
   	$url="login.php";
	include "mess.html";
 };
// echo "注册失败";
?>