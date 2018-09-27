<?php include("head.php") ?>
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
$sql = "select * from student";
$result = mysqli_query($conn, $sql);
//关闭数据库
mysqli_close($conn);
?>
		<div class="sui-layout">
		  <div class="sidebar">
 			<!--左菜单-->
		    <?php include("leftmenu.php") ?> 		  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生列表</p>
			<table class="sui-table table-primary">
				<tr><th>ID</th><th>学号</th><th>班号</th><th>姓名</th><th>性别</th><th>出生日期</th><th>电话</th><th>操作</th></tr>
				<?php 
					// //输出数据
					// // var_dump($result);
					// if (mysqli_num_rows($result)>0) {
					// 	//mysqli_fetch_assoc() 从结果集中取得一行作为关联数组，如果结果集中没有更多行则返回空
					// 	while($row = mysqli_fetch_assoc($result)){
					// 		 $row1 = $row['性别']==1?'男':'女';
					// 		echo "<tr>
					// 				<td>{$row["ID"]}</td>
					// 				<td>{$row["学号"]}</td>
					// 				<td>{$row["班号"]}</td>
					// 				<td>{$row["姓名"]}</td>
					// 				<td>{$row1}</td>
					// 				<td>{$row["出生日期"]}</td>
					// 				<td>{$row["电话"]}</td>
					// 				<td><a class='sui-btn btn-warning btn-small sui-icon icon-pencil' href='student-update.php?kid={$row['ID']}'>修改</a>&nbsp;&nbsp;
					// 					<a class='sui-btn btn-small btn-danger' href='student-del.php?kid={$row['ID']}'>删除</a></td>
					// 			</tr>";
					// 		}
					// 	}else{
					// 	echo "没有记录";
					// }
					 ?>
			<tbody id="studentlist"></tbody>	
			</table>
			<div class="test sui-pagination pagination-large">
					    <ul>
					      <li class="prev disabled"><a href="#">«上一页</a></li>
					      <li class="active"><a href="#">1</a></li>
					      <li><a href="#">2</a></li>
					      <li><a href="#">3</a></li>
					      <li><a href="#">4</a></li>
					      <li><a href="#">5</a></li>
					      <li class="dotted"><span>...</span></li>
					      <li class="next"><a href="#">下一页»</a></li>
					    </ul>
					    <div><span>共10页&nbsp;</span><span>
					        到
					        <input type="text" class="page-num"><button class="page-confirm" onclick="alert(1)">确定</button>
					        页</span></div>
					  </div>				  
			</div>
		</div>	

	<?php include("foot.php") ?>
	<!-- <script type="text/html" id="template1">
	              {{each arr val idx}}
	                    <tr>
	                            <td>{{val.ID}}</td> 
	                            <td>{{val.学号}}</td>    
	                            <td>{{val.班号}}</td> 
	                            <td>{{val.图片}}</td> 
	                            <td>{{val.姓名}}</td> 
	                            <td>{{val.性别}}</td> 
	                            <td>{{val.出生日期}}</td> 
	                            <td>{{val.电话}}</td> 
	                            <td><a class='sui-btn btn-warning btn-small sui-icon icon-pencil' href="student-update.php?kid={$row['ID']}">修改</a>&nbsp;&nbsp;<a class='sui-btn btn-small btn-danger' href="student-del.php?kid={$row['ID']}">删除</a></td>
	                    </tr> 
	              {{/each}}
	</script> -->
	<script>
$(function(){
	$.ajax({
		url:"api.php",
		type:"POST",
		dataType:"json",
		data:{
			"action":"student"
		},
		beforeSend:function(XMLHttpRequest){
			$("#studentlist").html("<tr><td>正在查询，请稍后...</td></tr>");
		},
		success:function(data,textStatus){
			console.log( data );
			if( data.code == 200 ){
				//渲染分页条
				$('.test').pagination({
				    pageSize:6,//每页显示条数
				    itemsCount:data.count,//获取记录总条数
				    styleClass: ['pagination-large'],
				    displayPage:5,
				    showCtrl: true,
				    onSelect: function (num) {
				    	console.log( num );
				        getPage(num);
				    }        
				});
				//渲染第一页数据
				renderList(data.data);
			}			
		},
		error: function(XMLHttpRequest,textStatus,errorThrown){
			//请求失败后调用此函数
			console.log( "失败原因：" + errorThrown );
		}
	});
});

function getPage(pageNum){
	$.ajax({
		url:"api.php",
		type:"POST",
		dataType:"json",
		data:{
			"action":"student",
			"pageNum":pageNum,
			"pageSize":6
		},
		success:function(data,textStatus){
			console.log( data );
			if( data.code == 200 ){
				renderList(data.data);
			}
		}	
	})
}

function renderList(datalist){
	var str = "";
	for (var i = 0; i < datalist.length; i++) {
		//console.log( data.data[i] );
		str += "<tr><td>"+ datalist[i].ID+"</td><td>"+ datalist[i].学号+"</td><td>"+datalist[i].班号+"</td><td>"+ datalist[i].姓名+"</td><td>"+ datalist[i].性别+"</td><td>"+ datalist[i].出生日期+"</td><td>"+ datalist[i].电话+"</td><td><a class='sui-btn btn-samll btn-warning' href='student-update.php?kid="+datalist[i].ID+"'>修改</a>&nbsp;&nbsp;<a class='sui-btn btn-samll btn-danger' href='student-del.php?kid="+datalist[i].ID+"'>删除</a></td></tr>";
	}
	$("#studentlist").html( str );	
}
	</script>
	
