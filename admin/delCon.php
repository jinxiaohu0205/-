<?php
include "session.php";
include "db.php";
$sid=$_GET["id"];
//echo "$sid";
$sql="delete from shows where sid=".$sid;
$db->query($sql);
if($db->affected_rows>0){
	$message="删除成功";
	$url="showCon.php";
	include "mess.html";
}
?>