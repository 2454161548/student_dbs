	<!-- 页头 -->
	<?php include("head.php"); ?>	
		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("leftmenu.php"); ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">栏目录入</p>
			<form id="form1" action="programa-save.php" method="post" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="lanmuName" class="control-label">栏目：</label>
			    <div class="controls">
			      <input type="text" id="lanmuName" name="lanmuName" class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <!-- <div class="control-group">
			    <label for="kcTime" class="control-label">录入时间：</label>
			    <div class="controls">
			      <input type="text" id="kcTime" name="kcTime" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入课程时间">
			    </div>
			  </div>	 -->
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