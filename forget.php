<?php include("01_head.php"); ?>	
	<div class="sui-layout">
	 <div class="content">
		<p class="sui-text-xxlarge my-padd">忘记密码</p>
		<form class="sui-form form-horizontal sui-validate" action="forget-save.php" method="post">
			<div class="control-group">
			    <label for="inputEmail " class="control-label .input-fat">邮箱：</label>
			    <div class="controls">
			    	<input type="text" id="inputEmail" placeholder="请输入邮箱" class="input-fat input-large" name="mali" data-rules="required|minlength=2|maxlength=30">
			    </div>
			</div>
			<div class="control-group">
			    <label for="password" class="control-label">验证码：</label>
			    <div class="controls">
				    <span class="v_logo"></span>
					<input type="text" value="" placeholder="请输入验证码" class="input-large input-fat ipt input-val" id="input_val" />
			        <canvas id="canvas" width="100" height="43"></canvas>
			    </div>
			  </div>
			<div class="control-group">
				<label for="question" class="control-label">密码提示问题：</label>
				<div class="controls">
					<select id="question" name="question">
						<option value="你的小学在哪上学">你的小学在哪上学</option>
						<option value="你的最好朋友的姓名">你的最好朋友的姓名</option>
						<option value="你最有纪念意义的日期">你最有纪念意义的日期</option>
					</select>
				</div>
			</div>
			<div class="control-group">
			    <label for="answer " class="control-label .input-fat">密码答案：</label>
				<div class="controls">
					<input type="text" id="answer" placeholder="请输入密码答案" class="input-fat input-large" name="answer" data-rules="required|minlength=2|maxlength=15">
				</div>
			</div>
			<div class="control-group">
			    <label class="control-label"></label>
			    <div class="controls">
			    	<button type="submit" class="sui-btn btn-primary" id="cha">提交</button>
			    </div>
			</div>
		</form>
		</div>		
		</div>
		</div>
 		</div>
<?php include("01_foot.php") ?>
<script>
    $(function () {

        $("#submit").click(function () {
            check(); //数据提交前先检查验证码是否填写正确
        })
  })
    function check() {
        var val = $(".input-val").val().toLowerCase();
        // console.log(val);
        var num = show_num.join("");
        // console.log(num);
        if (val == "") {
            alert("请输入验证码");
            return false;
        } else if (val != num) {
            alert('验证码错误！请重新输入！');
            $(".input-val").val('');
            setTimeout(function () {
                draw(show_num);
            }, 1000)
 
            return false;
        }
        return true;
    }
</script>