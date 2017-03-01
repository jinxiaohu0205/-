<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/base.css"">
	<link rel="stylesheet" href="css/header.css">
	<script src="js/function.js"></script>
	<script src="js/index.js"></script>
	<script src="js/animate.js"></script>
</head>
<body>
<?php
	include  "../admin/db.php";
?>
	<!-- 顶部 -->
	<div class="nav">
		<div class="navz">
			<div class="navleft">
				<img src="img/logo.png" alt="">
			</div>
			<div class="navright">
				<div class="shouye ye1">
					<div class="lxt"></div>
					<a href="index.php">首页</a>
				</div>
				<div class="shouye ye2">
					<div class="cpnr">
						<div class="menucp">
							<i>个人产品:</i>
						</div>
						<div class="menucp">
							<a href="http://autofun.carsmart.cn/main.html">乐乘</a>
						</div>
						<div class="menucp">
							<a href="http://zc.carsmart.cn/">智乘(即将发布)</a>
						</div>
						<div class="menucp">
							<a href="http://tripfun.carsmart.cn/">纷乘</a>
						</div>
						<div class="menucp">
							<i>行业应用:</i>
						</div>
						<div class="menucp">
							<a href="http://4s.carsmart.cn/">车通店</a>
						</div>
						<div class="menucp">
							<i>硬件产品:</i>
						</div>
						<div class="menucp">
							<a href="http://autofun.carsmart.cn/main.html">乐乘盒子</a>
						</div>
						<div class="menucp">
							<a href="http://tripfun.carsmart.cn/">纷乘行车记录仪</a>
						</div>
					</div>
					<div class="lxt"></div>
					<a>产品</a>
				</div>
				
					 <?php
				 	$i=0;
			        $sql="select * from category where pid=0";
			        $result=$db->query($sql);
			        while ($row=$result->fetch_assoc()) {
            		?>
            		<?php
            			$i++;
        			?>
					<div class="shouye ye3">
					<a <?php if($i==3) {echo "href='http://hr.carsmart.cn/'" ?> <?php }?> ><?php echo $row["cname"]?></a>
						<div class="cpnr">
						<?php
//						$n=0;
				        $sql="select * from category where pid=".$row["cid"];
				        $result1=$db->query($sql);
				        while ($row1=$result1->fetch_assoc()) {
	            		?>
	            		<?php
	            			if($i==2){
	            		?>	<div class="menucp">
							<a  href="listone.php?id=<?php echo $row1['cid']?>"><?php echo $row1["cname"]?></a>
							</div>	
							<?php
	            			}else{
	            			?><div class="menucp">
							<a  href="list.php?id=<?php echo $row1['cid']?>"><?php echo $row1["cname"]?></a>
							</div>	
	            			<?php
					        }
					        ?>
						<?php
				        }
				        ?>
						</div>
						<div class="lxt"></div>
					</div>
					<?php
			        }
			        ?>

				<!--<div class="shouye ye3">
					<div class="cpnr">
						<div class="menucp">
							<a a href="行业解决方案.html">行业解决方案</a>
						</div>
						<div class="menucp">
							<a href="">北斗应用系统</a>
						</div>
						<div class="menucp">
							<a href="">智慧城市建设</a>
						</div>
					</div>
					<div class="lxt"></div>
					<a>解决方案</a>
				</div>
				<div class="shouye ye4">
					<div class="cpnr">
						<div class="menucp">
							<a href="公司动态.html">公司动态</a>
						</div>
						<div class="menucp">
							<a href="">员工天地</a>
						</div>
						<div class="menucp">
							<a href="">专题报道</a>
						</div>
					</div>
					<div class="lxt"></div>
					<a href="">新闻中心</a>
				</div>
				<div class="shouye ye2">
					<div class="lxt"></div>
					<a href="人才招聘.html">人才招聘</a>
				</div>
				<div class="shouye ye5">
					<div class="cpnr">
						<div class="menucp">
							<a href="简介.html">公司简介</a>
						</div>
						<div class="menucp">
							<a href="企业文化.html">企业文化</a>
						</div>
						<div class="menucp">
							<a href="大事件.html">大事记</a>
						</div>
						<div class="menucp">
							<a href="资质荣誉.html">资质&荣誉</a>
						</div>
						<div class="menucp">
							<a href="合作伙伴.html">合作伙伴</a>
						</div>
					</div>
					<div class="lxt"></div>
					<a>关于我们</a>
				</div>-->
				
			</div>
			<div class="wzdh">
				<div class="button">
					<div class="buttonn">
						<div class="xbu">
							<a href="">车网互联官网</a>
						</div>	
						<div class="xbu">
							<a href="">乐乘</a>
						</div>	
						<div class="xbu">
							<a href="">智乘(即将发布)</a>
						</div>	
						<div class="xbu">
							<a href="">纷乘</a>
						</div>	
						<div class="xbu xbuu">
							<a href="">车店通</a>
						</div>	
					</div>
					<span class="zz">网站导航</span>
					<div class="xiasanjiao"></div>
				</div>
			</div>
		</div>
	</div>
	
	<!--固定定位-->
	<div class="dweibo">
		<div class="weibo">
			<div class="weibon"></div>
		</div>
		<div class="ht"></div>
		<div class="weixin">
			<div class="weixinn"></div>
		</div>
	</div>
	
	<div class="huiqu"></div>
