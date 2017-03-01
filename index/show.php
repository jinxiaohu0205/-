<?php
 include "header.php";
 include "../admin/db.php";
?>
<link rel="stylesheet" href="css/show.css" />
<link rel="stylesheet" href="css/base.css" />
<script src="{JS_PATH}myjs/jquery.js"></script>
	<div class="con">
		<div class="page">
			<?php
		      $id=$_GET["id"];
		      $sql="select * from shows where sid=".$id;
		      $result=$db->query($sql);
		      $row=$result->fetch_assoc();
	         ?>
			<h3><?php echo $row["stitle"]?></h3>
			<div class="row">
				<div class="yrow">
					<a href="{siteurl($siteid)}">首页</a><span> &gt; </span>{catpos($catid)} 
				</div>
				<script>
					var aobj=$(".yrow span")[0];
					var bobj=$(".yrow span")[0].nextSibling;
					$(".yrow")[0].removeChild(aobj);
					$(".yrow")[0].removeChild(bobj);
				</script>
				<div class="zrow">
					<a href="">2016-12-13</a>
					<span>来源:</span>	
					<span>车网互联</span>
				</div>
			</div>
		</div>
		<div class="center">
			<p><?php echo $row["scon"]?></p>
		</div>
		<div class="zrow">
			<a href=""> <?php echo $row["stime"]?></a>
			<span>来源:</span>	
			<span>车网互联</span>
		</div>
		<script>
			$(".zrow a").html("2017-01-18")
		</script>
	</div>
<?php
 include "footer.php";
?>