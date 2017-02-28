<?php
include "session.php";
include "db.php";
$cid=$_GET["id"];
$sql1="select * from category where pid=".$cid;
$result=$db->query($sql1);
while($row=$result->fetch_assoc()){
	if($row["cid"]){
		$message="有子栏目,无法删除";
		$url="showcateGory.php";
		include "mess.html";
		exit;
	}
}
$sql="delete from category where cid=".$cid;
$db->query($sql);
if($db->affected_rows>0){
	$message="删除成功";
	$url="showcateGory.php";
	include "mess.html";
	exit;
}
$mess="删除失败，请重新删除";
$url="showcateGory.php";
include "mess.html";
exit;

?>