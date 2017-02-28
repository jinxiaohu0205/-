<?php
	$fileInfo=$_FILES["file"];
	date_default_timezone_set("Asia/Shanghai");
	if(is_uploaded_file($fileInfo["tmp_name"])){
		if(!file_exists("upload")){
			mkdir("upload/",0777,true);
		}
		$dirname=date("y-m-d");
		if(!file_exists("upload/".$dirname)){
			mkdir("upload/".$dirname."/",0777,true);
		}
		$filename=time().$fileInfo["name"];
		$path="upload/".$dirname."/".$filename;
		move_uploaded_file($fileInfo["tmp_name"],$path);
		echo "http://localhost/news/admin/upload/".$dirname."/".$filename;
	}
?>