<?php include("01_head.php"); ?>	
	
	<div class="sui-layout">
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">用户注册</p>
			<form id="form1" action="01_index-save.php" method="post" class="sui-form form-horizontal sui-validate">
				<div class="control-group">
			    <label for="emailname" class="control-label">用户邮件：</label>
			    <div class="controls">
			      <input type="text" id="emailname" placeholder="email" data-rules="required|email" name="emailname"><span id="tips"></span>
			    </div>
			  </div>
			   <div class="control-group">
			    <label for="inputNick" class="control-label">用户名：</label>
			    <div class="controls">
			      <input type="text" id="inputNick" name="inputNick" placeholder="username" data-rules="required|minlength=2|maxlength=6" data-error-msg="昵称必须是2-6位" data-empty-msg="亲，别忘记填了">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="password" class="control-label">密码：</label>
			    <div class="controls">
			      <input type="password" id="passwordname" placeholder="required" data-rules="required|minlength=8|maxlength=16" name="passwordname">
			    </div>
			  </div>			  
			  <div class="control-group">
			    <label for="repassword" class="control-label">重复密码：</label>
			    <div class="controls">
			      <input type="password" id="repassword" placeholder="match" data-rules="required|match=passwordname" name="repassword">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="password" class="control-label">验证码：</label>
			    <div class="controls">
				    <span class="v_logo"></span>
					<input type="text" value="" placeholder="请输入验证码" class="input-large input-fat ipt input-val" />
			        <canvas id="canvas" width="100" height="43"></canvas>
			    </div>
			  </div>
			   <div class="control-group">
			    <label for="inputGender" class="control-label">密码提示问题：</label>
			    <div class="controls">
			    	<select name="city" id="city">
						<option value="你的小学在哪里上？">你的小学在哪里上？</option>
						<option value="你的最好朋友的姓名？">你的最好朋友的姓名？</option>
						<option value="你的最有纪念意义的日期？">你的最有纪念意义的日期？</option>
			    	</select>
			     </div>
			  </div>
			  <div class="control-group">
			    <label for="inputGender" class="control-label">密码答案：</label>
			    <div class="controls">
			    	<input type="text" id="solution" name="solution" data-rules="required|minlength=2|maxlength=10"  placeholder="answer">
			    </div>
			  </div>
			   <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" id="submit" value="注册提交" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	
			</form>
		  </div>
		</div>
	</div>
	<!-- 页脚 -->
	<?php include("01_foot.php"); ?>
		<script>
            $("input[name=emailname]").on("blur",function(){
    	
        if (window.XMLHttpRequest) {
            var xhr = new XMLHttpRequest();
        }else{
            //兼容IE老版本
            var xhr = ActiveObject("Msxml2.XMLHTTP");
        }
        console.log(xhr);
        xhr.onreadystatechange = function(){
            if (xhr.readyState==1) {
            console.log("服务器已连接");
            }
            if (xhr.readyState==2) {
                console.log("请求已接收");
            }
            if (xhr.readyState==3) {
                console.log("正在处理中，请稍后....");
            }
            if (xhr.readyState==4) {
            	console.log(xhr.responseText);
                if (xhr.status == "200") {
                console.log("准备好了");
                //requestText接受服务器返回的数据
                
                if (xhr.responseText = "可以注册") {

                    $("#tips").html("可以注册");
                }else{
                    $("#tips").html("邮件重复");
                }
            }
                if (xhr.status == "404") {
                    console.log("网页被人贱了");

                }
            }
        }
        
        xhr.open("get","register-save.php?email="+encodeURIComponent(emailname.value),true);

        xhr.send(null);

        xhr.open("post","register-save.php?",true);
        xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        xhr.send("email="+encodeURIComponent(emailname.value),true);
    });

    $("#submit").click(function () {
           
              check(); //数据提交前先检查验证码是否填写正确
        });
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