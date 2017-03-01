<?php
 include "header.php";
 include "../admin/db.php";
?>
<link rel="stylesheet" href="css/listone.css" />
<link rel="stylesheet" href="css/base.css" />
<!--<script src="{JS_PATH}myjs/function.js"></script>-->
<!--<script src="{JS_PATH}myjs/index.js"></script>-->
<!--<script src="{JS_PATH}myjs/animate.js"></script>-->
<script src="js/jquery.js"></script>
	<!-- 行业解决方案 -->
	<!--上级栏目的栏目图片  因为只能在行内样式取 栏目图片只能是一个-->
	<div class="role" style="background-image:url({$CATEGORYS[$top_parentid][image]})">
		<div class="zrole">
			<?php
		      $id=$_GET["id"];
		      $sql="select * from category where cid=".$id;
		      $result=$db->query($sql);
		      $row=$result->fetch_assoc();
	     	?>
			<h1 class="pull-left"><?php echo $row["cname"]?></h1>
			<ul class="tabs">
				<!--{pc:content action="category" catid="$CATEGORYS[$catid][parentid]" num="10"}
				{loop $data $v}	-->
				<?php
			      $sql="select * from category where pid=".$row["pid"];
			      $result1=$db->query($sql);
			      while ($row1=$result1->fetch_assoc()) {
	         	?>
				<li <?php if($id==$row1["cid"]) {echo "class='x1'" ?> <?php }?>>
					<a href="listone.php?id=<?php echo $row1['cid']?>" ><?php echo $row1["cname"]?></a>
				</li>
				<?php
				}
				?>
				<!--{/loop}
				{/pc}-->
			</ul>
		</div>
	</div>


	<!-- 捷报丨车网互联荣登车联网企业TOP100榜单 -->
	<div class="container">
		<!--{pc:content action="lists" catid="$catid" num="1" page="$page"}-->
		<!--{pc:content action="lists" catid="$catid" num="3" order="id DESC" page="$page"}
		{loop $data $v}-->
		<?php
		      $id=$_GET["id"];
		      $sql="select * from shows where cid=".$id;
		      $result=$db->query($sql);
		      while ($row=$result->fetch_assoc()) {
         ?>
		<div class="media-body"> <h4 class="media-heading"><a href="show.php?id=<?php echo $row['sid']?>" target="_blank"><?php echo $row["stitle"]?></a></h4> <p> ……</p> <h4><small><i class="glyphicon glyphicon-calendar"></i><?php echo $row["stime"]?></small></h4></div>
		<hr>
			<?php
		      }
		    ?>
		<!--{/loop}-->
		<!--<div class="tzhuan">
			{$pages}
		</div>
		<script>
			$(".tzhuan .a1").eq(0).remove();
			$(".tzhuan a").eq(0).html("«");
			$(".tzhuan a").eq(-1).html("»");
		</script>-->
		<!--{/pc}-->   
		<!--<div class="tzhuan">
			<a href="">«</a>
			<a href="" class="active">1</a>
			<a href="">2</a>
			<a href="">3</a>
			<a href="">»</a>
		</div>-->
	</div>
<?php
 include "footer.php";
?>