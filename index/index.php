<?php
 include "header.php";
?>
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="css/base.css" />
<script src="js/function.js"></script>
<!--<script src="{JS_PATH}myjs/index.js"></script>-->
<script src="js/animate.js"></script>
	<!-- banner -->
	<div class="banner">
		<ul class="imgbox">
			<!--{pc:content action="lists" catid="33" num="4"}
			{php $i=0}
        	{loop $data $r}
        	{$i++}-->
		 	<?php
		 	$i=0;
	        $sql="select * from shows where cid=0";
	        $result=$db->query($sql);
	        while ($row=$result->fetch_assoc()) {
	        ?>	
	        <?php
        		$i++;
        	?>
			<a href="{$r[url]}">
				<li <?php if($i==1) {echo "class='first'" ?> <?php }?> >
				<img src="<?php echo $row["imgurl"]?>" alt="">
				</li>
			</a>
			<?php
	        }
	        ?>
			<!--{/loop}  
            {/pc}-->
		</ul>
		<ul class="circle">
			<li class="first"></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
		<div class="anniu left">&lt;</div>
		<div class="anniu right">&gt;</div>
	</div>
	<!-- 车网互联 -->
	<div class="centert-7">
		<p class="cwhl">车网互联</p>
		<p class="hz">以移动互联网技术创造用户新体验</p>
		<p class="hz">致力于成为车网产业先行者，打造智能交通新秩序，为推动移动信息产业与智能城市的发展而不懈努力！</p>
		<div class="lk">
			<a href="list.php?id=31">CARSMART</a>
		</div>
		<div class="situ">
			<div class="xt">
				<img src="img/icon01.png" alt="">
				<span>车辆软硬件</span>
			</div>
			<div class="xt">
				<img src="img/icon02.png" alt="">
				<span>移动终端软件</span>
			</div>
			<div class="xt">
				<img src="img/icon03.png" alt="">
				<span>互联网应用</span>
			</div>
			<div class="xt">
				<img src="img/icon04.png" alt="">
				<span>行业应用平台</span>
			</div>
		</div>
	</div>
	<!-- 新闻中心 -->
	<div class="news">
		<div class="newsz">
			<div class="newtop">
				<p class="xwzx">新闻中心</p>
				<p class="fx">与您分享车网互联的最新动态</p>
			</div>
			<div class="newbottom">
				<!--{pc:content action="category" catid="19" num="3"}
				{loop $data $v}-->
				<?php
			      $sql="select * from category where pid=21";
			      $result=$db->query($sql);
			      while ($row=$result->fetch_assoc()) {
		         ?>
				<div class="dt">
					<h3><a href="listone.php?id=<?php echo $row['cid']?>"><?php echo $row["cname"]?></a></h3>
					<ul>
						<!--{pc:content action="lists" catid="$v[catid]" num="6"}
						{loop $data $r}-->
						<?php
					      $sql="select * from shows where cid=".$row["cid"];
					      $result1=$db->query($sql);
					      while ($row1=$result1->fetch_assoc()) {
				         ?>
						<li><a href="show.php?id=<?php echo $row1['sid']?>"><?php echo $row1["stitle"]?></a></li>
						<?php
						}
						?>
						<!--{/loop}
						{/pc}-->
					</ul>
					<div class="gd"><a href="listone.php?id=<?php echo $row['cid']?>">更多</a></div>
				</div>
				<?php
				}
				?>
				<!--{/loop}
				{/pc}-->
			</div>	
		</div>
	</div>

	<!-- 招投标公告 -->
	<div class="centert-7">
		<p class="cwhl">招投标公告</p>
		<p class="hz">为了美好未来，我们一直在努力！</p>
		<div class="ggtz">
			<span>公告通知</span>
			<div class="bidbox">
				<img src="img/zbimg.png" alt="">
			</div>
		</div>
	</div>
<?php
 include "footer.php";
?>