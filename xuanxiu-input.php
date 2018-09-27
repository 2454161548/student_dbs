		<!-- 页头 -->
		<?php include("head.php"); 
			$conn = mysqli_connect("localhost","root","" );
			if( $conn ){
				echo "连接成功！";
			}else{
				die("连接失败！".mysqli_connect_error() );
			}
			//选择要操作的数据库
			mysqli_select_db($conn, "student_dbs");
			//设置读取数据库的编码，不然显示汉字为乱码
			mysqli_query($conn, "set names utf8");
			$sql = "select distinct 课程名 from kecheng";
			$result = mysqli_query($conn, $sql);
		?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("leftmenu.php"); ?>	 	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩信息录入</p>
			<form class="sui-form form-horizontal sui-validate" action="xuanxiu-save.php" method="post">
			  <div class="control-group">
			    <label for="xuehao" class="control-label">学号：</label>
			    <div class="controls">
			       <input type="text" id="xuehao" name="xuehao" class="input-large input-fat"  placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
			  </div>
			  </div>
			  <div class="control-group">
			    <label for="courseHao" class="control-label">课程编号：</label>
			    <div class="controls">
			      <select name='courseHao' id='courseHao'>
			      <?php 
					if( mysqli_num_rows($result) > 0 ){
						while ( $row = mysqli_fetch_assoc($result) ) {
							echo "<option value='{$row['课程名']}'>{$row['课程名']}</option>";
						}
					}else{
						echo "<option value=''>请先添加课程信息</option>";
					}
			       ?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="cjName" class="control-label">成绩：</label>
			    <div class="controls">
			      <input type="text" id="cjName" name="cjName" class="input-large input-fat"  placeholder="输入成绩" data-rules="required|minlength=2|maxlength=10">
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