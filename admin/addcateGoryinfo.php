<?php
include "db.php";
$pid=$_GET["pid"];
$cname=$_GET["cname"];
$sql="insert into  category (pid,cname) values ('$pid','$cname')";
$db->query($sql);
if($db->affected_rows>0){
	$message="添加成功";
	$url="addcateGory.php";
	include "mess.html";
}
?>