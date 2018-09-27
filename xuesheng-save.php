<?php include("head.php") ?>
<?php 
	$xmName = $_POST["xmName"];
	$xhName = $_POST["xhName"];
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$str1 = "数据查询成功!";
		$str2 = "数据查询失败";
		$sql1 = "select*from student where 姓名='{$xmName}'";
		$sql2 = "select*from student where 学号='{$xhName}'";
	}
	$connsql = $_POST["xmName"]?$sql1:$sql2;
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
	$result = mysqli_query($conn,$connsql);
	//输出数据
	// var_dump($result);
	if ($result) {
		echo "<script>alert('{$str1}')</script>";
	}else{
		echo "{$str2}";
	}
	//关闭数据连接
	mysqli_close($conn);
?>
	<div class="sui-layout">
		  <div class="sidebar">
 			<!--左菜单-->
		    <?php include("leftmenu.php") ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生信息查询列表</p>
			<table class="sui-table table-primary">			
				<tr><th>ID</th><th>学号</th><th>班号</th><th>姓名</th><th>性别</th><th>出生日期</th><th>电话号码</th><th>操作</th></tr>
				<?php 
					//输出数据
					// var_dump($result);
					if (mysqli_num_rows($result)>0) {
						//mysqli_fetch_assoc() 从结果集中取得一行作为关联数组，如果结果集中没有更多行则返回空
						while($row = mysqli_fetch_assoc($result)){
							 $row1 = $row['性别']==1?'男':'女';
							echo "<tr>
									<td>{$row["ID"]}</td>
									<td>{$row["学号"]}</td>
									<td>{$row["班号"]}</td>
									<td>{$row["姓名"]}</td>
									<td>{$row1}</td>
									<td>{$row["出生日期"]}</td>
									<td>{$row["电话"]}</td>
									<td><a href='xuesheng-input.php' class='sui-btn btn-info' style='float: right;'>返回</a></td>
								</tr>";
							};
						}else{
						echo "没有查询的记录";
					}
					 ?>
			</table>		
		  </div>
		</div>		
	<?php include("foot.php") ?>
