<?php
	include "session.php";
	include "db.php";
	include "function.php";
	$tree=new abc();
	$tree->tree(0,"-",$db,"category");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	<form action="addcateGoryinfo.php">
		上级栏目<select name="pid" id="">
					<!--<option value="0">一级栏目</option>-->
					<?php
						echo $tree->str;
					?>
				</select><br/>
		添加分类<input type="text" name="cname"/><br/>
		<input type="submit" value="提交" />
	</form>
</body>
</html>