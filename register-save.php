<?php 
//创建连接
$conn = mysqli_connect("localhost","root","");
if ($conn) {
	// echo "连接成功!";	
}else{
	// die("连接失败!".mysqli_connect_error());
}
//选择要操作的数据库
mysqli_select_db($conn,"student_dbs");
//设置读取数据库的编码，不然显示汉字为乱码
mysqli_query($conn,"set names utf8");
//执行查询email的sql
$email = $_REQUEST["email"];
$sql = "select * from user where email='{$email}'";
// var_dump($sql);
$result = mysqli_query($conn,$sql);
//如果查找的记录有一条，说明此email已经被注册过了
if (mysqli_num_rows($result)>0) {
	echo "已经注册";
}else{
	echo "可以注册";
}


//关闭数据库
mysqli_close($conn);
 ?>