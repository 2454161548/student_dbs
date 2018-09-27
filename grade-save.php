<?php include("head.php") ?>
<?php
	$xmInput = $_POST["xmInput"];
    $xhInput = $_POST["xhInput"];
	$kcmInput = $_POST["kcmInput"];
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$str1 = "数据查询成功!";
		$str2 = "数据查询失败";
		$sql1 = "select s.姓名,c.课程名,x.成绩 from xuanxiu AS x left join kecheng AS c on x.课程编号 = c.课程编号 left join student AS s on x.学号 = s.学号 where s.姓名 = '{$xmInput}' and c.课程名 like '{$kcmInput}'";
		$sql2 = "select s.姓名,c.课程名,x.成绩 from xuanxiu AS x left join kecheng AS c on x.课程编号 = c.课程编号 left join student AS s on x.学号 = s.学号 where s.学号 = '{$xhInput}' and c.课程名 like '{$kcmInput}'";
	}
	$connsql = $_POST["xmInput"]?$sql1:$sql2;
	//创建连接
	$conn = mysqli_connect("localhost","root","");
	if ($conn) {
		echo "连接成功！";
	}else{
		die("连接失败！".mysql_connect_error());
	}
	//选择要操作的数据库
	mysqli_select_db($conn,"student_dbs");
	//设置读取数据库的编码,不然显示汉字为乱码
	mysqli_query($conn,"set names utf8");
	//执行SQL语句
	$result = mysqli_query($conn,$connsql);
	//输出数据
	// var_dump($result);
	if ($result) {
		echo "<script>alert('{$str1}')</script>";
	}else{
		echo "{$str2}";
	}
//关闭数据库
mysqli_close($conn);
?>
<div class="sui-container">
	<div class="sui-layout">
  	<div class="sidebar">
  	<!-- 左菜单 -->
		<?php include("leftmenu.php") ?>
  	</div>
  	<div class="content">
  		<p class="sui-text-xxlarge" >成绩列表</p>
  		<table class="sui-table table-primary">
  			
           <tr><th>姓名</th><th>课程名</th><th>成绩</th><th>操作</th></tr>
<?php
  if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)){
      echo "<tr>
      		<td>{$row['姓名']}</td>
     		<td>{$row['课程名']}</td>
      		<td>{$row['成绩']}</td>    
      		<td><a href='grade-input.php' class='sui-btn btn-info' style='float: right;'>返回</a></td> 
       	</tr>";
    };
  }else{
    echo "没有查询的记录";
  }
?>
    </table>    
  	</div>
</div>
	</div>
<?php include("foot.php") ?>
