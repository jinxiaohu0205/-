
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
	include "db.php";
    include "function.php";
	$edit=new abc();
    $id=$_GET["id"];
//  echo "$id";
    $edit->tree(0,1,$db,"category");
    $result=$db->query("select * from shows where sid=".$id);
    $row=$result->fetch_assoc();
?>	
<?php echo "<script> var cid=".$row["cid"]."</script>";?>
<script src="js/jquery.js"></script>
<script>
	$(function(){
		$("select").find("option").each(function(){
			console.log($("option"));
			if($(this).attr("value")==cid){
				$(this).attr("selected","selected");
			}
		})
	})
</script>
<form action="editConInfo.php">
    文章分类：<select name="category">
		        <?php
		            echo $edit->str;
		        ?>
   			 </select>
    		<br/>
    文章标题：<input type="text" value="<?php $result=$db->query("select * from shows where sid=".$id);
    $row=$result->fetch_assoc();
    echo $row["stitle"];
    ?>" name="stitle"  /><br />
  文章内容: <br /><textarea cols="30" rows="10" name="scon" ><?php $result=$db->query("select * from shows where sid=".$id);$row=$result->fetch_assoc();echo $row["scon"];?></textarea>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <br/>
    <input type="submit" value="修改文章">
</form>
</body>
</html>