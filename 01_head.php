<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户系统 V1.0</title>
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" type="text/css" href="css/default01.css">	
	<style media="screen">
	a{
		font-size: 12px;
	}
	.sui-container a{
		font-size: 12px;
	}
	.my-head ul li{
		width: 447px;
		height: 29px;
		float: left;
		text-align: center;
		line-height: 40px;
		/*margin: 6px 10px;*/
		border: 1px solid white;
	}
	.sui-container td{
		font-size: 13px;
	}
	.sui-container{
		width: 900px;
		height: 500px;
		background-color: #fdf9f9;
		margin: 20px auto;
		border-radius: 10px 10px 0px 0px;
		font-size: 16px;
		font-family:"Microsoft 宋体",宋体,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu
	}
	.my-head{
		width: 900px;
		height: 29px;
		border-bottom: 1px solid black;
		line-height: 45px;
		text-align: center;
		font-size: 18px;
		font-weight: 600;
		border-radius: 10px 10px 0px 0px;
		background-color: #4cb9fc;
		font-family:"Microsoft 宋体",宋体,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu
		color: #5f5a5a;
		/*color: white;*/
	}
	.input-val {
        width: 200px;
		background: #ffffff;
		/* padding: 0 0px; */
		margin-top: -35px;
		border-radius: 5px;
		border: none;
		border: 1px solid rgba(0,0,0,.2);
		font-size: 13px;
    }
  	.ipt {
       	border: 1px solid #d3d3d3;
       	padding: 10px 10px;
       	width: 290px;
       	border-radius: 4px;
       	padding-left: 35px;
       	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
       	box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
       	-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
       	-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
       	transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
   	}
    .ipt:focus {
        border-color: #66afe9;
        outline: 0;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
   	}
	#tips{
		color:red;
	}
	.act_a,.act_b,.act_c{
		display: none;
		width: 600px;
		height: 100px;
		background-color: #4cb9fc;
		text-align: center;
		font-size: 30px;
		line-height: 100px;
		margin: 0 auto;
		position: absolute;
		top: 360px;
		margin-left: 31%;
		border-radius: 10px;
	}
	.act_d{
		width: 200px;
		height: 100px;
		background-color: #4cb9fc;
		text-align: center;
		font-size: 30px;
		line-height: 100px;
		margin: 0 auto;
		position: absolute;
		top: 140px;
		margin-left: 44%;
		border-radius: 10px;
	}
	</style>
</head>
<body>
	<div class="sui-container" >
		<div class="my-head" id="box">
			<ul class="menu">
				<li class="level1"><a href="01_index.php">用户注册</a></li>
				<li class="level1"><a href="login.php">用户登录</a></li>
			</ul>
		</div>