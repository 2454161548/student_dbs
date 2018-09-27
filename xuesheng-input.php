		<!-- 页头 -->
		<?php include("head.php"); 
			
		?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("leftmenu.php"); ?>	 	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生信息查询</p>
			<form class="sui-form form-horizontal sui-validate" action="xuesheng-save.php" method="post">
			  <div class="control-group">
			    <label for="xmName" class="control-label">姓名：</label>
			    <div class="controls">
			       <div class="controls">
			      <input type="text" id="xmName" name="xmName" class="input-large input-fat"  placeholder="输入姓名" data-rules="minlength=2|maxlength=10">
			    </div>
			  </div>
			  </div>
			  <div class="control-group">
			    <label for="xhName" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="xhName" name="xhName" class="input-large input-fat"  placeholder="输入学号" data-rules="minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="查询" name="" class="sui-btn btn-large btn-primary">
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