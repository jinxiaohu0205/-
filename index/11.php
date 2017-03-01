<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        ul,li{
            padding:0;margin:0;list-style: none;
        }
        header{
            width:800px;height:150px;
            border:1px solid #000;
            margin:auto;
        }
        nav{
            width:800px;height:30px;
            background:#ccc;
            margin:auto;position: relative;
            line-height: 30px;
            text-align: center;
        }
        a{
            text-decoration: none;
            color:#000;
        }
        .menu{
            width:100%;height:100%;position: relative;
        }
        .opt{
            float:left;padding:0 20px;
            position: relative;
        }
        .opt.select{
            background:red;
        }
        .son{
            position: absolute;
            left:0px;top:30px;
            width:200px;
            height:200px;
            border:1px solid #ccc;
            line-height: 30px;
            display: none;
        }
    </style>
    <script src="../js/jquery.js"></script>
    <script>
        $(function(){
            $(".opt").hover(function(){
                $(this).find(".son").slideDown(100);
            },function(){
                $(this).find(".son").slideUp(100);
            })
        })
    </script>
</head>
<body>
<?php
include  "../public/db.php";
?>
<header>头部</header>
<nav>
    <ul class="menu">
        <li class="opt <?php if(!$_GET["id"]){echo 'select';}?>">
            <a href="index.php">首页</a>
        </li>
        <?php
        $sql="select * from category where pid=0";
        $result=$db->query($sql);
        while ($row=$result->fetch_assoc()) {
            ?>
            <li class="opt <?php if($_GET['id']==$row['cid']){echo 'select';}?>">
                <a href="category.php?id=<?php echo $row['cid']?>">
                    <?php
                    echo $row["cname"]
                    ?>
                </a>
                <ul class="son">
                    <?php
                    $sql="select * from category where pid=".$row["cid"];
                    $result1=$db->query($sql);
                    while ($row1=$result1->fetch_assoc()) {
                        ?>
                        <li class="sonOpt">
                            <a href="list.php?id=<?php echo $row1['cid']?>"><?php echo $row1["cname"]?></a>
                        </li>

                        <?php
                    }
                    ?>
                </ul>
            </li>

            <?php
        }
        ?>

    </ul>
</nav>