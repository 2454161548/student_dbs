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
				$sql = "select 班号,班长,教室,班主任,班级口号 from banji where 班号='{$kid}'";
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
			<p class="sui-text-xxlarge my-padd">班级信息修改</p>
			<form id="form1" action="banji-save.php" method="post" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班号：</label>
			    <div class="controls">
			    	<!-- 增加一个隐藏的input，用来区分新增加还是修改数据 -->
			    	<input type="hidden" name="action" value="update">
			    	<!-- 增加一个隐藏的input，保存编写的 -->
			    	<input type="hidden" name="kid" value="<?php echo $row['班号'] ?>">
			      <input type="text" value="<?php echo $row['班号'] ?>" id="banhao" name="banhao" class="input-large input-fat" placeholder="输入班号" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			   <div class="control-group">
			    <label for="inputEmail" class="control-label">班长：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['班长'] ?>" id="banzhang" name="banzhang" class="input-large input-fat" placeholder="输入班长姓名">
			    </div>
			  </div>	
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">教室：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['教室'] ?>" id="jiaoshi" name="jiaoshi" class="input-large input-fat" placeholder="输入班长姓名">
			    </div>
			  </div>	
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班主任：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['班主任'] ?>" id="banzhuren" name="banzhuren" class="input-large input-fat" placeholder="输入教室">
			    </div>
			  </div>	
			   <div class="control-group">
			    <label for="inputEmail" class="control-label">班级口号：</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $row['班级口号'] ?>" id="slogan" name="slogan" class="input-large input-fat" placeholder="输入班级口号">
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