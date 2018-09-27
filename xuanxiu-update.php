	<!-- 页头 -->
		<?php include("head.php"); ?>	
		<?php 
			$kid = empty($_GET['kid'])?"null":$_GET['kid'];
			if ($kid == "null") {
				die("请选择要修改的信息");
			}else{
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
				$sql = "select ID,学号,课程编号,成绩 from xuanxiu where ID='{$kid}'";
				$result = mysqli_query($conn, $sql);
				// 输出数据
				if (mysqli_num_rows($result)>0) {
					// 将查询结果转成数组
					$row = mysqli_fetch_assoc($result);
				}else{
					echo "找不到记录";
				}
				//关闭数据库
				mysqli_close($conn);
			}
		 ?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("leftmenu.php"); 
			$conn = mysqli_connect("localhost","root","" );
		/*	if( $conn ){
				echo "连接成功！";
			}else{
				die("连接失败！".mysqli_connect_error() );
			}*/
			//选择要操作的数据库
			mysqli_select_db($conn, "student_dbs");
			//设置读取数据库的编码，不然显示汉字为乱码
			mysqli_query($conn, "set names utf8");
			$sql2 = "select distinct 课程编号 from kecheng";
			$result2 = mysqli_query($conn, $sql2);			
			?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻信息修改</p>
			<form id="form1" action="xuanxiu-save.php" method="post" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">学号：</label>
			    <div class="controls">
			    	  <!-- 增加一个隐藏的input，用来区分新增加还是修改数据 -->
			    	<input type="hidden" name="action" value="update">
			    	<!-- 增加一个隐藏的input，保存编写的 -->
			    	<input type="hidden" name="kid" value="<?php echo $row['ID'] ?>">
			      <input type="text" value="<?php echo $row['学号'] ?>" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			   <div class="control-group">
			    <label for="courseHao" class="control-label">课程编号：</label>
			    <div class="controls">
			      <select name='courseHao' id='courseHao'>
			      <?php 
					if( mysqli_num_rows($result2) > 0 ){
						while ( $rows = mysqli_fetch_assoc($result2) ) {
							echo "<option value='{$rows['课程编号']}'>{$rows['课程编号']}</option>";
						}
					}else{
						echo "<option value=''>请先添加班级信息</option>";
					}
			       ?>
			      </select>
			    </div>
			  </div>	
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">成绩：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['成绩'] ?>" id="cjName" name="cjName" class="input-large input-fat" placeholder="输入姓名">
			    </div>
			  </div>	
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
			<!-- 页脚 -->
	<?php include("foot.php"); ?>