<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<style>
	*{
		padding: 0;
		margin: 0;
		text-align: none;
	}
	.box{
		width: 300px;
		height: 200px;
		position: fixed;
		left: 0;
		top: 0;
		bottom: 0;
		right: 0;
		margin: auto;
		border: 2px solid #000;
		text-align: center;
	}
</style>
<body>
	<div class="box">
      <h3>登录页</h3>
      <form action="checkLogin.php" method="post">
          用户名:<input name="username" type="text"><br><br>
          密&nbsp;&nbsp;&nbsp;码:<input name="password" type="text"><br><br>
          <input value="登录" type="submit">
      </form><br>
    没有用户名,<a href="reg.php">点击注册</a>
</div>
</body>
</html>