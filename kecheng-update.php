	<!-- 页头 -->
		<?php include("head.php"); ?>	
		<?php 
			$kid = empty($_GET['kid'])?"null":$_GET['kid'];
			if ( $datalist[i]== "null") {
			/*	die("请选择要修改的信息");
			}else{*/
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
				$sql = "select 课程编号,课程名,时间 from kecheng where 课程编号={$kid}";
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
			<?php include("leftmenu.php"); ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">课程修改</p>
			<form id="form1" action="kecheng-save.php" method="post" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程名：</label>
			    <div class="controls">
			    	<!-- 增加一个隐藏的input，用来区分新增加还是修改数据 -->
			    	<input type="hidden" name="action" value="update">
			    	<!-- 增加一个隐藏的input，保存编写的 -->
			    	<input type="hidden" name="kid" value="<?php echo $row['课程编号'] ?>">
			      <input type="text" value="<?php echo $row['课程名'] ?>" id="kcName" name="kcName" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程时间：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['时间'] ?>" id="kcTime" name="kcTime" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入课程时间">
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