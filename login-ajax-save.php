<?php	session_start();
	//创建连接
	$conn = mysqli_connect("localhost","root","");
	//选择要操作的数据库
	mysqli_select_db($conn,"student_dbs");
	//设置读取数据库的编码，不然显示汉字为乱码
	mysqli_query($conn,"set names utf8");

 
 	$emailname =empty($_REQUEST['emailname']) ? "null":strtolower($_REQUEST['emailname']);
 	$passwordname =empty($_REQUEST['passwordname']) ? "null":$_REQUEST['passwordname'];
	$responseArr=array(
		"code" => 200,
		"msg"=>"登录成功"
	);
	//首先跟据用户提交的邮件查询，如果至少一条记录，则邮件正确，否则邮箱不正确
	$sql1="select * from user where email = '{$emailname}'";
	$result=mysqli_query($conn,$sql1);
	if (mysqli_num_rows($result)>0) {
		//提示邮箱正确
		//如果邮箱正确，再判断用户提交的密码和上一步查询到密码是否相等，相等则密码正确，否则密码不正确	
		$arr = mysqli_fetch_assoc($result);
		if ($passwordname==$arr["password"]) {
			//密码也对上了
			//创建一个session,键为usname，值为$emailname
			$_SESSION['usemail'] = $arr["email"];
			$_SESSION['usname'] = $arr["name"];
			$_SESSION['usid'] = $arr["id"];
		}else{
			//邮件对但密码不对
			$responseArr["code"]=20001;
			$responseArr["msg"]="密码错误";
		}
	}else{
		//邮箱不存在
		$responseArr["code"]=20004;
		$responseArr["msg"]="邮件不存在";
	}

	// print_r($responseArr);
	// print_r( $result);
	echo json_encode($responseArr);
/*	//执行SQL语句
	$result = mysqli_query($conn,$sql1);
	if (mysqli_num_rows($result)>=1) {
		$_SESSION['usname'] = $emailname;

		echo "ok";
	}else{

		echo "error".mysqli_error($conn);
	}*/
	//关闭数据连接
	mysqli_close($conn);
?>