<?php include("head.php") ?>
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
$sql = "select ID,学号,课程编号,成绩 from xuanxiu";
$result = mysqli_query($conn, $sql);
//关闭数据库
mysqli_close($conn);
?>
		<div class="sui-layout">
		  <div class="sidebar">
 			<!--左菜单-->
		    <?php include("leftmenu.php") ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩列表</p>
			<table class="sui-table table-primary">
				<tr><th>学号</th><th>课程编号</th><th>成绩</th><th>操作</th></tr>
				<?php 
					//输出数据
					// var_dump($result);
					if (mysqli_num_rows($result)>0) {
						//mysqli_fetch_assoc() 从结果集中取得一行作为关联数组，如果结果集中没有更多行则返回空
						while($row = mysqli_fetch_assoc($result))
							echo "<tr>									
									<td>{$row["学号"]}</td>
									<td>{$row["课程编号"]}</td>
									<td>{$row["成绩"]}</td>
									<td><a class='sui-btn btn-warning btn-small sui-icon icon-pencil' href='xuanxiu-update.php?kid={$row['ID']}'>修改</a>&nbsp;&nbsp;
										<a class='sui-btn btn-small btn-danger' href='xuanxiu-del.php?kid={$row['ID']}'>删除</a></td>
								</tr>";
						}else{
						echo "没有记录";
					}
					 ?>
			</table>
		  </div>
		</div>		
	<?php include("foot.php") ?>