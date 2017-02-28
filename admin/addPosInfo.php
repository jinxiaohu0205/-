<?php
	include "session.php";
    include "db.php";
    $pname=$_GET["pname"];
    $sql="insert into position (pname) values ('$pname')";
    $db->query($sql);
    if($db->affected_rows>0){
        $message="添加文章成功";
        $url="addPos.php";
        include "mess.html";
    }else{
        $message="添加失败";
        $url="addPos.php";
        include "mess.html";
    }
?>