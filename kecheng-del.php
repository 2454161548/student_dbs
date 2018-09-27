<?php


//创建连接
$conn = mysqli_connect("localhost","root","");
if ($conn) {
	echo "连接成功!";	
}else{
	die("连接失败!".mysqli_connect_error());
}
//选择要操作的数据库
mysqli_select_db($conn,"student_dbs");
//设置读取数据库的编码，不然显示汉字为乱码
mysqli_query($conn,"set names utf8");
//执行SQL语句
$sql = "delete from kecheng where 课程编号={$_GET['kid']}";
$result = mysqli_query($conn, $sql);

if ($result) {
		echo "<script>alert('数据删除成功')</script>";
		header("Refresh:0;url=kecheng-list.php");
	}else{
		echo "数据更新失败".mysqli_error($conn);
	}
//关闭数据库
mysqli_close($conn)
?>