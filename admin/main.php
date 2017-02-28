<?php
	include "session.php";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<script src="js/jquery.js"></script>
</head>
<style>
	*{
		box-sizing: border-box;

	}
	html,body{
		width: 100%;
		height: 100%;
		padding: 0;
		margin: 0;
	}
	.box{
		width: 100%;
		height: 100%;
	}
	.title{
		width: 100%;
		height: 20%;
		border-bottom:1px solid #000 ;
		text-align: center;
	}
	.admin{
		width: 100%;
		height: 80%;
	}
	.admin .left{
		width: 20%;
		height: 100%;
		border-right:1px solid #000 ;
		float: left;
	}
	.admin .right{
		width:80%;
		height: 100%;
		float: left;
	}
	iframe{
		width: 100%;
		height: 100%;
	}
	.opt{
		cursor: pointer;
	}
	ul{
		list-style: block;
	}
</style>
<script>
	$(function(){
		$(".opt").click(function(event){
			$(this).find(".son").toggle(100);
		})
		$(".son").click(function(e){
			e.stopPropagation();
		})
	})
</script>
<body>
	<div class="box">
		<div class="title">
			<h1><?php echo $_SESSION["zhanghao"] ?> 欢迎来到内容管理系统<h1>
				<a href="logout.php">退出</a>
		</div>
		<div class="admin">
			<div class="left">
				<ul class="menu">
	               <li class="opt">
	                   	用户管理
	                   <ul class="son">
	                       <li><a href="11.html" target="right">添加用户</a></li>
	                       <li><a href="" target="right">管理用户</a></li>
	                   </ul>
	               </li>
	               <li class="opt">
	                   	分类管理
	                   <ul class="son">
	                       <li><a href="addcateGory.php" target="right">添加分类</a></li>
	                       <li><a href="showcateGory.php" target="right">管理分类</a></li>
	                   </ul>
	               </li>
	               <li class="opt">
	                   	内容管理
	                   <ul class="son">
	                       <li><a href="addCon.php" target="right">添加内容</a></li>
	                       <li><a href="showCon.php" target="right">管理内容</a></li>
	                   </ul>
	               </li>
	               <li class="opt">
	                   	推荐位管理
	                   <ul class="son">
	                       <li><a href="addPos.php" target="right">添加推荐位</a></li>
	                       <li><a href="showPos.php" target="right">管理推荐位</a></li>
	                   </ul>
	               </li>
           		</ul>
			</div>
			<div class="right">
				<iframe src="" frameborder="0" name="right"></iframe>
			</div>
		</div>
	</div>
</body>
</html>