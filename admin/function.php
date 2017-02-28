<?php
class abc{
	function abc(){
		$this->str="";
	}
	/*
        @param
            $pid    父类别id
            $flag   标识，区分级别
            $table  表名
            $db     数据库名
   */
	function tree($pid,$flag,$db,$table,$current=null){
		$currentPid=null;
		if($current){
            $result=$db->query("select * from category where cid=".$current);
            $row=$result->fetch_assoc();
            $currentPid=$row["pid"];
        }
     	if($pid==0){
            $this->str.="<option value='0'>一级栏目</option>";
        }
		$flag=$flag+1;
		$sql="select * from $table where pid=".$pid;
		$result=$db->query($sql);
//		echo $result;
		while($row=$result->fetch_assoc()){
//			var_dump($row);
			$cid=$row["cid"];
			$cname=$row["cname"];
			$str=str_repeat("-",$flag);//把字符串重复运行($flag次)
			if($cid==$currentPid){
				 $this->str .= "<option value='$cid' selected='selected' >{$str}{$cname}</option>";
			}else{
				$this->str.="<option value='$cid'>{$str}{$cname}</option>";
			}
			$this->tree($cid,$flag,$db,$table);
		}
		return $this->str;
	}
	
	function table($pid,$flag,$db,$table){
		$flag=$flag+1;
		$sql="select * from $table where pid=".$pid;
		$result=$db->query($sql);
//		echo $result;
		while($row=$result->fetch_assoc()){
//			var_dump($row);
			$cid=$row["cid"];
			$cname=$row["cname"];
			$pid=$row["pid"];
			$str=str_repeat("-",$flag);
			$this->str.="<tr>
				<td>$cid</td>
				<td>$cname</td>
				<td>$pid</td>
				<td>
					<a href='delcateGory.php?id=$cid'>删除</a>
					<a href='editcateGory.php?id=$cid'>编辑</a>
				</td>
			</tr>";
			$this->table($cid,$flag,$db,$table);
		}
		return $this->str;
	}
	
	function table1($db,$table){
		$sql="select * from $table";
		$result=$db->query($sql);
		while($row=$result->fetch_assoc()){
			$sid=$row["sid"];
			$stitle=$row["stitle"];
			$scon=$row["scon"];
			$stime=$row["stime"];
			$csql="select cname from category where cid=".$row["cid"];
            $result1=$db->query($csql);
            $row1=$result1->fetch_assoc();
            $cname=$row1["cname"];
			$this->str.="<tr>
				<td>$sid</td>
				<td>$cname</td>
				<td>$stitle</td>
				<td>$scon</td>
				<td>$stime</td>
				<td>
					<a href='delCon.php?id=$sid'>删除</a>
					<a href='editCon.php?id=$sid'>编辑</a>
				</td>
			</tr>";
//			$this->table1($db,$table);
		}
//		return $this->str;
	}
}
?>