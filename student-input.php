		<!-- 页头 -->
		<?php include("head.php"); 
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
			$sql = "select distinct 班号 from banji";
			$result = mysqli_query($conn, $sql);
		?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("leftmenu.php"); ?>	 	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生信息录入</p>
			<form class="sui-form form-horizontal sui-validate" action="student-save.php" method="post" enctype="multipart/form-data">
			  <div class="control-group">
			    <label for="xuehao" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="xuehao" name="xuehao" class="input-large input-fat"  placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班号：</label>
			    <div class="controls">
			      <select name='banhao' id='banhao'>
			      <?php 
					if( mysqli_num_rows($result) > 0 ){
						while ( $row = mysqli_fetch_assoc($result) ) {
							echo "<option value='{$row['班号']}'>{$row['班号']}</option>";
						}
					}else{
						echo "<option value=''>请先添加班级信息</option>";
					}
			       ?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="XMname" class="control-label">姓名：</label>
			    <div class="controls">
			      <input type="text" id="XMname" name="XMname" class="input-large input-fat"  placeholder="输入学生姓名" data-rules="required|minlength=2|maxlength=10">
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
			<!--   <div class="control-group">
			    <label for="sName" class="control-label">照片：</label>
			    <div class="controls">
			     <input type="file" name="file" id="file" />
			    </div>
			  </div> -->
			  <div class="control-group">
			    <label for="birthday" class="control-label">出生日期：</label>
			    <div class="controls">
			      <input type="text" id="birthday" name="birthday" class="input-large input-fat" data-toggle="datepicker" placeholder="输入出生日期" data-rules="required|minlength=2|maxlength=20">
			    </div>
			  </div>		
			  <div class="control-group">
			    <label for="phone" class="control-label">电话：</label>
			    <div class="controls">
			      <input type="text" id="phone" name="phone" class="input-large input-fat"  placeholder="输入电话" data-rules="required|minlength=2|maxlength=20">
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
		</div>
</body>
</html>	
		<!-- 页脚 -->
	<?php include("foot.php"); ?>