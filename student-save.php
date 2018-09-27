<?php 
	$xuehao = $_POST["xuehao"];
	$banhao = $_POST["banhao"];
	$XMname = $_POST["XMname"];
	$sSex = $_POST["sSex"];
	$birthday = $_POST["birthday"];
	$phone = $_POST["phone"];
	// 如果是录入页面提交，那么$action等于add
	$action = empty($_POST["action"])?"add":$_POST["action"];
	// if (empty($_FILES["file"]['tmp_name'])==false) {			
	// 		if ((($_FILES["file"]["type"] == "image/gif")
	// 		|| ($_FILES["file"]["type"] == "image/jpeg")
	// 		|| ($_FILES["file"]["type"] == "video/mp4")
	// 		|| ($_FILES["file"]["type"] == "image/pjpeg"))
	// 		&& ($_FILES["file"]["size"] < 10241000)){
	// 			if ($_FILES["file"]["error"] > 0) {
	// 			  echo "错误: " . $_FILES["file"]["error"] . "<br />";
	// 			 }else{
	// 			 	//重新给上传的文件命名，增加一个年月日时分秒的前缀，并且加上保存路径
	// 			 	$filename = "upload/".date('YmdHis').$_FILES["file"]["name"];
	// 				//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
	// 				move_uploaded_file($_FILES["file"]["tmp_name"],$filename); 
	// 				// echo $filename; 	 	
	// 			}
	// 		}else{
	// 			echo "您上传的文件不符合要求！";
	// 		}	
	// 	}else{
	// 		$filename = $_FILES["ordpic"];
	// 	}
		
	if ($action == "add") {
		$trs1 = "数据添加成功";
		$trs2 = "数据更新成功";
		$url3 = "student-input.php";
		$sql1 = "insert into student (学号,班号,姓名,性别,出生日期,电话) value('$xuehao','$banhao','$XMname','$sSex','$birthday','$phone')";
		// var_dump($sql1);
	}else if($action=="update"){
		$trs1 = "数据添加失败";
		$trs2 = "数据更新失败";
		$url3 = "student-ajax-list.php";
		$kid = $_POST['kid'];
		// if (empty($filename)) {
		// 	$sql1 = "update student set 学号='{$xuehao}',班号='{$banhao}',姓名='{$XMname}',性别='{$sSex}',图片='{$filename}',出生日期='{$birthday}',电话='{$phone}' where ID='{$kid}'";
		// }else{
			$sql1 = "update student set 学号='{$xuehao}',班号='{$banhao}',姓名='{$XMname}',性别='{$sSex}',出生日期='{$birthday}',电话='{$phone}' where ID='{$kid}'";
		// }
		
		// var_dump($sql1);
	}else{
		die("请选择操作方法");//die输出提示语并终止下面的代码执行
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
		echo "<p class='pp'>数据更新成功</p>";
		header("Refresh:2;url={$url3}");
	}else{
		echo "<p class='pp'>数据更新失败</p>".mysqli_error($conn);
	}
	include("head_01.php");
	//关闭数据连接
	mysqli_close($conn);
 ?>