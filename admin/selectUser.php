<?php
   include "db.php";	
   $uname=$_GET["username"];
   $sql="select zhanghao from loser";
   $result=$db->query($sql);
   while($row=$result->fetch_assoc()){
     if($row["zhanghao"]==$uname){
   		echo "error";
         exit;
     };
   };
 echo "ok";
?>