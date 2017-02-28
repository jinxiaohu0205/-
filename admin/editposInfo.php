<?php
    include "session.php";
    include "db.php";
    $id=$_GET["id"];
    $pname=$_GET["pname"];
    $sql="update position set pname='$pname'  where posid=".$id;
    $db->query("$sql");
    if($db->affected_rows>0){
        $message="修改成功";
        $url="showPos.php";
        include "mess.html";
    }else{
        $message="修改失败";
        $url="showPos.php";
        include "mess.html";
    }
?>