<?php
    include "session.php";
    include "db.php";
    $cid=$_GET["category"];
    $stitle=$_GET["stitle"];
    $scon=$_GET["scon"];
    $imgurl=$_GET["imgurl"];
//  $username=$_SESSION["username"];
    $sql="insert into shows (cid,stitle,scon,imgurl) values ($cid,'$stitle','$scon','$imgurl')";

    $db->query($sql);
    if($db->affected_rows>0){
        $message="添加文章成功";
        $url="addCon.php";
        include "mess.html";
    }else{
        $message="添加失败";
        $url="addCon.php";
        include "mess.html";
    }
?>