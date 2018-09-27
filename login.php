<?php include("01_head.php"); ?>	
	<div class="sui-layout">
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">账户登录</p>
			<form id="form1" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="email" class="control-label">用户邮件：</label>
			    <div class="controls">
			      <input type="text" id="emailname" name="emailname" class="input-large input-fat" placeholder="email" data-rules="required|minlength=2|maxlength=20"><span id="tips"></span>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="passwordname" class="control-label">密码：</label>
			    <div class="controls">
			      <input type="password" id="passwordname" name="passwordname" class="input-large input-fat"  placeholder="required" data-rules="required|minlength=2|maxlength=10">
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
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" id="submit" value="登录" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<a href="forget.php">忘记密码？</a>
			  	</div>
			  </div>
			  </form>
			</div>		
		  </div>
		</div>
	  </div>
	  <div class="act_a">登录成功</div>
	  <div class="act_b">密码错误</div>
	  <div class="act_c">邮箱填写错误或格式错误</div>
	<!-- 页脚 -->
	<?php include("01_foot.php"); ?>
	<script>
	//
	$("input[type=submit]").on("click",function(){
		// if ($("#input_val").val() == ) {}
		//使用.ajax()提交数据
		// console.log(data.code);
		$.ajax({
			url:"login-ajax-save.php",
			type:"POST",
			data:$("#form1").serialize(),
			dataType:"json",
			beforeSend:function(XMLHttpRequest){
				//发送前调用此函数，一般再次编写检测代码或者loading
				
			},
			/*complete:function(XMLHttpRequest,textStatus){
				//请求完成后调用次函数，(请求成功或失败都调用)
			},*/
			success:function(data,textStatus){
				//请求成功后调用次函数				
				var val = $(".input-val").val().toLowerCase();
		        var num = show_num.join("");
				 if (val == "") {
		            alert("请输入验证码");
		            return true;
		        } else if (val != num) {
		            alert('验证码错误！请重新输入！');
		            $(".input-val").val('');
		            setTimeout(function () {
		                draw(show_num);
		            }, 1000)
		 
		            return true;
		        }else {
			        	console.log(data);
					if ( data.code == "200") {
						$(".act_a").slideDown(1000,function(){
							window.location.href="index.php";
						});
					}
					if( data.code == 20001){
						//提示密码错误
						$(".act_b").slideDown(1000,function(){
							window.location.href="login.php";
						});
					}
					if( data.code == 20004){
						//提示邮箱填写错误
						$(".act_c").slideDown(1000,function(){
							window.location.href="login.php";
						});
					}
		        }	
			},
			error:function(XMLHttpRequest,textStatus,errorThrown){
				//请求失败后调用此函数
				console.log("失败原因"+errorThrown);
			}
		});
		return false;
	});
	</script>
