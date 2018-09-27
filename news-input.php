<?php include("head.php");
// 连接数据库
$conn = mysqli_connect("localhost","root","");
// 判断是否连接成功
// if ($conn) {
// 	echo "<p class='pp'>连接成功</p>";

// }else{
// 	die ("<p class='pp'>连接失败!</p>".mysqli_connect_error());
// }

// 选择要操作的数据库
mysqli_select_db($conn,"student_dbs");

// 设置读取数据库的编码，不然显示汉字会乱码
mysqli_query($conn,"set names utf8");
// 执行sql语句
$sql = "select * from  newscolumn";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
 ?>		
		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("leftmenu.php"); ?>	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻录入</p>
			<form class="sui-form form-horizontal sui-validate" action="news-save.php" method="post" id="form1" enctype="multipart/form-data">
			  
			  <div class="control-group">
			    <label for="biaoti" class="control-label">标题：</label>
			    <div class="controls">
			      <input type="text" id="biaoti" name="biaoti" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=50">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="jianti" class="control-label">肩题：</label>
			    <div class="controls">
			      <input type="text" id="jianti" name="jianti" class="input-large input-fat" placeholder="输入肩题" data-rules="required|minlength=2|maxlength=200">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="zuozhe" class="control-label">作者：</label>
			    <div class="controls">
			      <input type="text" id="zuozhe" class="input-large input-fat"  value="<?php echo $_SESSION['usname']; ?>" disabled='disabled'>
			      <input type="hidden" value="<?php echo $_SESSION['usid']; ?>" name="zuozhe">
			    </div>
			  </div>

			  <div class="control-group">
			    <label for="column" class="control-label">栏目：</label>
			    <div class="controls">
			     <!--  <input type="text" id="bjNumber" name="bjNumber" class="input-large input-fat"   placeholder="输入班号" data-rules="required"> -->
			     <select id="column" name="column">
					<?php
					if( mysqli_num_rows($result) > 0 ){
						while ( $row = mysqli_fetch_assoc($result) ) {
							echo "<option value='{$row['id']}'>{$row['name']}</option>";
						}
					}else{
						echo "<option value=''>请先添加班级信息</option>";
					}
					 ?>     	
			     </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="fb_date" class="control-label">发布时间：</label>
			    <div class="controls">
			      <input type="text" id="fb_date" name="fb_date" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入发布时间">
			    </div>
			 </div>
			 <div class="control-group">
			    <label for="sName" class="control-label">图片：</label>
			    <div class="controls">
			      <input type="file" name="file" />
			     
			    </div>
			  </div>
			 


			 <div class="control-group">
			    <label class="control-label v-top"><b style="color: #f00;">*</b> <span style="padding:0 24px 0 0;">内</span>容：</label>
			    <div class="controls">
			      <textarea style="height: 190px;" class="input-xxlarge" name="neirong"></textarea>
			      <!-- <div class="sui-msg msg-error msg-clear help-block">
			        <div class="msg-con">该项为必填项</div>
			        <s class="msg-icon"></s>
			      </div> -->
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
	<?php include("foot.php") ?>	