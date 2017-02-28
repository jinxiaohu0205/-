<?php
    include "session.php";
    include "db.php";
    include "function.php";
    $tree=new abc();
    $tree->tree(0,1,$db,"category");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="js/upload.js"></script>
	<style>
		.box{
			width: 300px;
			height: 200px;
			border: 1px solid #000000;
			position: relative;
		}
		.img{
			width: 300px;
			height: 180px;
		}
		.img img{
			width: 100%;
			height: 100%;
		}
		.progress{
			width: 0%;
			height:15px;
			position: absolute;
			bottom: 0;
			left: 0;
			background: red;
			font-size: 12px;
			text-align: center;
			line-height: 15px;			
		}
	</style>
</head>
<script>
	window.onload=function(){
		var sub=document.querySelector(".ok");
		var val=document.querySelector(".hid");
		var obj=new upload("sc.php",".one",".progress","img");
		obj.up(function(e){
			obj.start=function(){
				val.value=e;
				sub.removeAttribute("disabled");
			}
			obj.start();
		})
	}
</script>
<body>
<form action="addconInfo.php">
    文章分类：<select name="category" id="">
		        <?php
		        echo $tree->str;
		        ?>
		    </select>
		    <br/>
    文章标题：<input type="text" name="stitle"><br/>
    文章内容：<br/>
    <textarea name="scon" cols="30" rows="10"></textarea><br/>
	<input type="file" name="file" multiple="multiple" class="one" />
	<div class="box">
		<div class="img">
			<img src="" alt="">
		</div>
		<div class="progress"></div>
	</div><br />
	<span>推荐位选择:</span>
	<?php
		$sql="select * from position";
		$result=$db->query($sql);
		while($row=$result->fetch_assoc()){
	?>	
		<?php echo $row["pname"] ?><input type="radio" name="pid" value="<?php echo $row["posid"] ?>" />
	<?php
		}	
	?><br/><br/>
	<input type="submit" value="添加文章" class="ok" />
	<input type="hidden" class="hid" name="imgurl"/>
</form>
</body>
</html>