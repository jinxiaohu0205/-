<?php
	include "session.php";
	include "db.php";
	include "function.php";
	$tree=new abc();
	$tree->table1($db,"shows");
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
		width: 15%;
		height: 30px;
		border: 1px solid #000;
		overflow: hidden;
	}
</style>
<body>
	<table>
		<thead>
			<tr>
				<th>sid</th>
				<th>父id</th>
				<th>标题</th>
				<th>内容</th>
				<th>发布时间</th>
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