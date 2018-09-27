<?php 
	$xuehao = strtoupper($_POST["xuehao"]);
	$courseHao = $_POST["courseHao"];
	$cjName = $_POST["cjName"];
	// 如果是录入页面提交，那么$action等于add
	$action = empty($_POST["action"])?"add":$_POST["action"];

	if ($action == "add") {
		$trs1 = "数据添加成功";
		$trs2 = "数据更新成功";
		$url3 = "xuanxiu-input.php";
		$sql1 = "insert into xuanxiu (学号,课程编号,成绩) value('$xuehao','$courseHao','$cjName')";
	}else if($action=="update"){
		$trs1 = "数据添加失败";
		$trs2 = "数据更新失败";
		$url3 = "xuanxiu-list.php";
		$kid = $_POST['kid'];
		$sql1 = "update xuanxiu set 学号='{$xuehao}',课程编号='{$courseHao}',成绩='{$cjName}' where ID='{$kid}'";
	}else{
		die("请选择操作方法");
	}
	//创建连接
	$conn = mysqli_connect("localhost","root","");
	if ($conn) {
		echo "连接成功！";
	}else{
		die("连接失败！".mysql_connect_error());
	}
	//选择要操作的数据库
	mysqli_select_db($conn,"student_dbs");
	//设置读取数据库的编码，不然显示汉字为乱码
	mysqli_query($conn,"set names utf8");

	//执行SQL语句
	$result = mysqli_query($conn,$sql1);
	
	//输出数据
	// var_dump($result);
	if ($result) {
		echo "<script>alert('数据更新成功')</script>";
		header("Refresh:0;url={$url3}");
	}else{
		echo "数据更新失败".mysqli_error($conn);
	}
	//关闭数据连接
	mysqli_close($conn);
 ?>