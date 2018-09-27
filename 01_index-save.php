<?php
session_start();
	$emailname =  $_POST["emailname"];
	$inputNick = $_POST["inputNick"];
	$passwordname = $_POST["passwordname"];
	$city = $_POST["city"];
	$solution = $_POST["solution"];
	// 如果是录入页面提交，那么$action等于add
	$action = empty($_POST["action"])?"add":$_POST["action"];

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
	$sql="select * from user where email = '{$emailname}'";
	$sss = mysqli_query($conn,$sql);
	
	//输出数据
	if (mysqli_num_rows($sss) >=1 ) {
		echo "<div class='margin01'>{$emailname}的邮件已经重复注册</div>";
		header("Refresh:3;url=01_index.php");
	}else{
		$sql1 = "insert into user (email,name,password,question,answer) value('$emailname','$inputNick','$passwordname','$city','$solution')";
		$result = mysqli_query($conn,$sql1);
		if ($result) {
			echo "<div class='margin01'>注册成功</div>";
			header("Refresh:1;url=login.php");
		}else{
			echo "<div class='margin01'>注册失败</div>".mysqli_error($conn);
			header("Refresh:1;url=01_index.php");
		}
	}
	//关闭数据连接
	mysqli_close($conn);
 ?>
 <style>
	.margin01{
		/*display: none;*/
		margin: 0 auto;
		width: 300px;
		height: 25px;
		background-color: #ddd;
		line-height: 25px;
		text-align: center;
	}
</style>