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
				$sql = "select ID,学号,班号,姓名,性别,图片,出生日期,电话 from student where ID='{$kid}'";
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
/*			if( $conn ){
				echo "连接成功！";
			}else{
				die("连接失败！".mysqli_connect_error() );
			}*/
			//选择要操作的数据库
			mysqli_select_db($conn, "student_dbs");
			//设置读取数据库的编码，不然显示汉字为乱码
			mysqli_query($conn, "set names utf8");
			$sql = "select distinct 班号 from banji";
			$result = mysqli_query($conn, $sql);

			?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生信息修改</p>
			 <img src="<?php echo $row['图片']; ?>" alt="" style="width: 150px;height: 150px; float: right; margin-right: 300px;">
			<form id="form1" action="student-save.php" method="post" class="sui-form form-horizontal sui-validate" enctype="multipart/form-data">
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
			    <label for="inputEmail" class="control-label">班号：</label>
			    <div class="controls">
			      <select name='banhao' id='banhao'>
			      <?php 
					if( mysqli_num_rows($result) > 0 ){
						while ( $rows = mysqli_fetch_assoc($result) ) {
							echo "<option value='{$rows['班号']}'>{$rows['班号']}</option>";
						}
					}else{
						echo "<option value=''>请先添加班级信息</option>";
					}
			       ?>
			      </select>
			    </div>
			  </div>	
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">姓名：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['姓名'] ?>" id="XMname" name="XMname" class="input-large input-fat" placeholder="输入姓名">
			    </div>
			  </div>	
			  <div class="control-group">
			    <label for="radio" class="control-label">性别：</label>
			    <div class="controls">			     	
				   	<label class="radio-pretty inline checked">
				    	<input type="radio" value="1" checked="checked" name="sSex"><span>男</span>
				  	</label>
				 	<label class="radio-pretty inline">
				   		<input type="radio" value="0" name="sSex"><span>女</span>
				  	</label>
			    </div>
			  </div>	
			  <!-- <div class="control-group">
			    <label for="sName" class="control-label" >图片：</label>
			    <div class="controls" >
			        <input type="file" name="ordpic">

			     	<input type="hidden" name="file" id="file" value="<?php echo $row['图片'] ?>" />
			    </div>
			  </div>		 -->
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">出生日期：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['出生日期'] ?>" id="birthday" name="birthday" class="input-large input-fat" data-toggle="datepicker" placeholder="输入出生日期">
			    </div>
			  </div>	
			   <div class="control-group">
			    <label for="inputEmail" class="control-label">电话：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['电话'] ?>" id="phone" name="phone" class="input-large input-fat" placeholder="输入电话">
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