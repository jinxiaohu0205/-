<?php
	include "session.php";
	include "db.php";
	include "function.php";
	$tree=new abc();
	$tree->table(0,"-",$db,"category");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<style>
	table{
		width:80%;
		height: auto;
		border: 1px solid #000;
		border-collapse: collapse;
		margin: auto;
	}
	tr{
		height: 30px;
		text-align: center;
		line-height: 30px;
	}
	th,td{
		width: 20%;
		height: 30px;
		border: 1px solid #000;
	}
</style>
<body>
	<table>
		<thead>
			<tr>
				<th>cid</th>
				<th>分类名称</th>
				<th>父亲id</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php
				echo $tree->str;
			?>
		</tbody>
	</table>
</body>
</html>