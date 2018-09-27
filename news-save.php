<?php 
	// 连接数据库
	$conn = mysqli_connect("localhost","root","");
	// 判断是否连接成功
	// if ($conn) {
	// 	echo "<p class='pp'>连接成功</p>";

	// }else{
	// 	die ("<p class='pp'>连接失败!</p>".mysqli_connect_error());
	// }

	// 选择要操作的数据库
	mysqli_select_db($conn,"student_dbs");

	// 设置读取数据库的编码，不然显示汉字会乱码
	mysqli_query($conn,"set names utf8");
	// 执行sql语句
	$hid = empty($_GET["hid"]) ? "null": $_GET["hid"];
	if( $hid == "null"){
	    $biaoti = empty($_POST['biaoti']) ? "null":$_POST['biaoti'];
	    $jianti = empty($_POST['jianti']) ? "null":$_POST['jianti'];
	    $zuozhe = empty($_POST['zuozhe']) ? "null":$_POST['zuozhe'];
	    $column = empty($_POST['column']) ? "null":$_POST['column'];
		$fb_date= empty($_POST["fb_date"])?"null":$_POST["fb_date"];
		$neirong= empty($_POST["neirong"])?"null":$_POST["neirong"];
		$action= empty($_POST["action"])?"add":$_POST["action"];
		if (empty($_FILES["file"]['tmp_name'])) {
			if ($action=="add") {
				echo "<p class='pp'>图片为空</p>";
			}else{
				echo "<p class='pp'>未修改图片</p>";
			}
		}else{
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "video/mp4")
			|| ($_FILES["file"]["type"] == "image/pjpeg"))
			&& ($_FILES["file"]["size"] < 10241000)){
				if ($_FILES["file"]["error"] > 0) {
				  echo "错误: " . $_FILES["file"]["error"] . "<br />";
				 }else{
				 	//重新给上传的文件命名，增加一个年月日时分秒的前缀，并且加上保存路径
				 	$filename = "upload/".date('YmdHis').$_FILES["file"]["name"];
					//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
					move_uploaded_file($_FILES["file"]["tmp_name"],$filename); 
					// echo $filename; 	 	
				}
			}else{
				echo "您上传的文件不符合要求！";
			}	
		}
		


		if ($action =="add"){
				if (empty($filename)) {
					$sql="insert into news(标题,肩题,内容,创建时间,userid,columnid,发布时间) value('$biaoti','$jianti','$neirong',".time().",'$zuozhe','$column','$fb_date')";
				}else{
					$sql="insert into news(标题,肩题,图片,内容,创建时间,userid,columnid,发布时间) value('$biaoti','$jianti','$filename','$neirong',".time().",'$zuozhe','$column','$fb_date')";
				}
				
				// var_dump($sql);
				$ad="添加";
				$dz="news-input.php";
			
		}else  if($action=="update"){
				$kid = $_POST["kid"];
				if (empty($filename)) {
					$sql = "update news set 标题='{$biaoti}',肩题='{$jianti}',内容='{$neirong}',userid='{$zuozhe}',columnid='{$column}',发布时间='{$fb_date}' where id = '{$kid}'";
				}else{
					$sql = "update news set 标题='{$biaoti}',肩题='{$jianti}',图片='{$filename}',内容='{$neirong}',userid='{$zuozhe}',columnid='{$column}',发布时间='{$fb_date}' where id = '{$kid}'";
				}
				$ad="修改";
				$dz="news-list.php";
		}else{
			die("请选择方法");
		}
	}else{
		$sql ="delete from news where id ='{$hid}' ";
		$ad="删除";
		$dz="news-list.php";
	}
	
	
	$result = mysqli_query($conn,$sql);
	if ($result) {
		echo "<p class='pp'>数据{$ad}成功</p>";
		header("Refresh:2;url={$dz}");
	}else{
		echo "<p class='pp'>数据{$ad}失败</p>".mysqli_error($conn);
	}
	include("head_01.php");
	mysqli_close($conn);
 ?>