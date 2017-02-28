<?php
session_start();
unset($_SESSION["is_login"]);
unset($_SESSION["zhanghao"]);
$message="退出成功";
$url="login.php";
include "mess.html";
?>