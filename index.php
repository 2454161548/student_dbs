	<!-- 页头 -->
		<?php include("head.php"); ?>
		<?php
//创建连接
$conn = mysqli_connect("localhost","root","");
/*if ($conn) {
	echo "连接成功!";	
}else{
	die("连接失败!".mysqli_connect_error());
}
*///选择要操作的数据库
mysqli_select_db($conn,"student_dbs");
//设置读取数据库的编码，不然显示汉字为乱码
mysqli_query($conn,"set names utf8");
//执行SQL语句
$sql = "select * from news";
$result = mysqli_query($conn, $sql);
//关闭数据库
mysqli_close($conn);
?>
		<div class="sui-layout">
		  <div class="sidebar">
		  	<!-- 左菜单 -->
			<?php include("leftmenu.php"); ?>	 
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">欢迎访问学生管理系统！</p>
			<div class="xinwen">
				<ul id="ul_xinwen">
					<tbody id="studentlist"></tbody>
				</ul>
			
			</div>
		  </div>
		</div>	
	<!-- 	
		<script>
		
		// 第一种方法
			document.cookie = "uname=dengbin;expires=Thu,22 Aug 2018 00:00:00 GMT";
		// 第二种方法
			var days = 30;
			var daysTime = 30*24*60*60*1000;//转换为毫秒
			var exp = new Date();
			exp.setTime(exp.getTime()+daysTime);//设置为30天后
			document.cookie = "uname=dengbin;expires="+exp.toGMTString();


			var password = "123456789";
			document.cookie = "password="+password;

		</script> -->
		
			<!-- 页脚 -->
	<?php include("foot.php"); ?>
	<script>
			$(function(){
			$.ajax({
				url:"api.php",
				type:"POST",
				dataType:"json", 
				data:{
					"action":"news"
				},
				beforeSend:function(XMLHttpRequest){
					$("#studentlist").html("<tr><td>正在查询，请稍后...</td></tr>")
				},
				success:function(data,textStatus){
				console.log( data,data );
				if (data.code == 200) {
					var str = "";			
						for(var i=0;i<data.data.length;i++){
							console.log(data.data[i]);
							str += "<li><a href='particulars.php'><img src='"+data.data[i].图片+"'></a><br><span>"+data.data[i].发布时间+" |北网新闻</psan><h4><a href=''>"+data.data[i].标题+"</a></h4><p>"+data.data[i].内容+"</p></li>"
						}
						$("#ul_xinwen").html(str);
					}
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){
				console.log('失败原因：' + errorThrown);
			}
			});
			
			})
		</script>
<style>
	.xinwen{
		width: 825px;
	    height: 550px;
	    border: 1px solid black;
	    background-color: #fff;
	    position: relative;
    	bottom: 20px;
	}
	#ul_xinwen li{
		width: 378px;
	    height: 245px;
	    float: right;
	    border: 1px solid black;
	    margin: 18px 18px 0 7px;
	    font-size: 11px;
	}
	#ul_xinwen li img{
		width: 378px;
		height: 134px;
	}
</style>