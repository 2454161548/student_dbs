<?php 
//创建连接
$conn = mysqli_connect("localhost","root","");
//选择要操作的数据库
mysqli_select_db($conn,"student_dbs");
//设置读取数据库的编码，不然显示汉字为乱码
mysqli_query($conn,"set names utf8");

$action=empty($_REQUEST['action'])?"null":$_REQUEST['action'];
$responseArr = array(
	"code"=>200,
	"data"=>null,
	"msg"=>"数据获取成功",
	"count" => 0//保存该表的总记录数
);
switch ($action) {
	case 'student':
		// $sql = "select * from ".$action;
		$sql = "select count(id) as allnum from student";
		$r = mysqli_query($conn, $sql);
		$a = mysqli_fetch_assoc($r);
		$responseArr["count"] = $a["allnum"];

		$pageNum = empty($_REQUEST['pageNum'])?1:$_REQUEST['pageNum'];
		$pageSize = empty($_REQUEST['pageSize'])?6:$_REQUEST['pageSize'];

		$sql = "select * from ".$action." limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
			$stdentlist = array();
			while($row = mysqli_fetch_assoc($result)){
				$stdentlist[]=$row;
			}
			//var_dump($stdentlist);
			$responseArr['data'] = $stdentlist;
		}else{
			$responseArr['code'] = 207;
			$responseArr['msg'] = "暂无记录";
		}
		die(json_encode($responseArr));
		break;
	case 'news':
		$sql = "select * from ".$action;
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
			$stdentlist = array();
			while($row = mysqli_fetch_assoc($result)){
				$stdentlist[]=$row;
			}
			//var_dump($stdentlist);
			$responseArr['data'] = $stdentlist;
		}else{
			$responseArr['code'] = 207;
			$responseArr['msg'] = "暂无记录";
		}
		die(json_encode($responseArr));
		break;
	default:
		echo "请指定正确的参数";
		break;
}

?>
