<?php
 include "header.php";
 include "../admin/db.php";
?>
<link rel="stylesheet" href="css/list.css" />
<link rel="stylesheet" href="css/base.css" />
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
					<a href="list.php?id=<?php echo $row1['cid']?>" ><?php echo $row1["cname"]?></a>
				</li>
				<?php
				}
				?>
				<!--{/loop}
				{/pc}-->
			</ul>
		</div>
	</div>

<!--非show页面获取内容使用moreinfo="1";-->
	<div class="collg">
			<?php
		      $id=$_GET["id"];
		      $sql="select * from shows where cid=".$id;
		      $result=$db->query($sql);
		      while ($row=$result->fetch_assoc()) {
	         ?>
				<h3 class="text-center"><?php echo $row["stitle"]?></h3>
				<p><?php echo $row["scon"]?></p>
				<img src="<?php echo $row["imgurl"]?>" alt="" />
				<hr>
			<?php
		      }
		    ?>
			<div class="hezi"></div>
	</div>
<?php
 include "footer.php";
?>