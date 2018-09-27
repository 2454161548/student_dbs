<style>
	.pp{
		width: 500px;
		height: 100px;
		background-color: #f34f4fd6;
		margin: 10px auto;
		text-align: center;
		line-height: 100px;
		border-radius: 10px 10px 10px 10px;
		font-size: 35px;
		display: none;
		color: color;
	}
</style>
<?php 
	// 创建连接
	$conn = mysqli_connect("localhost","root","");
	if ($conn) {
		// echo "连接成功！";
	} else {
		die("连接失败".mysqli_connect_error());
	}
	// 选择要操作的数据库
	mysqli_select_db($conn,"student_dbs");
	// 设置读取数据库的编码，不然显示汉字为乱码
	mysqli_query($conn,"set names utf8");
	// 邮箱
	$mali = empty($_POST['mali']) ? "null":$_POST['mali'];
	// 密码提示
	$question = empty($_POST['question']) ? "null":$_POST['question'];
	// 答案
	$answer = empty($_POST['answer']) ? "null":$_POST['answer'];
	// 选择有没有邮件名称一样的
	$scc="select * from user where email = '{$mali}' and 	question='{$question}' and answer='{$answer}'";
	$rcc = mysqli_query($conn,$scc);
	if (mysqli_num_rows($rcc) >= 1) {
		echo "<p class='pp'>验证通过</p>";
		$row = mysqli_fetch_assoc($rcc);
		header("Refresh:2;url=index.php?update='{$row['email']}'");
	}else{
		echo "<p class='pp'>验证失败</p>";
		header("Refresh:2;url=login.php");
	}
	mysqli_close($conn);
	// include ("p.style.php");
 ?>