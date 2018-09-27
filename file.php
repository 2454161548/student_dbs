<?php 
<?php 
    include("06_pstyle.php");
   //创建连接
    $conn = mysqli_connect("localhost","root","");
    if ($conn) {
        // echo "连接成功！";
    }else{
        die("连接失败！".mysql_connect_error());
    }
    //选择要操作的数据库
    mysqli_select_db($conn,"student_dbs");
    //设置读取数据库的编码，不然显示汉字为乱码
    mysqli_query($conn,"set names utf8");

    $hid = empty($_GET["hid"]) ? "null": $_GET["hid"];
    if( $hid == "null"){
       $title = $_POST["title"];//标题
        $title2 = $_POST["title2"];//肩题
        $lanmu = $_POST["lanmu"];//栏目
        $writer = $_POST["writer"];//栏目
        $ftime = $_POST["ftime"];//发布时间
        $content = $_POST["content"];//内容
        $action= empty($_POST["action"])?"add":$_POST["action"];
        if (empty($_FILES["file"]['tmp_name'])) {
            if ($action=="add") {
                echo "图片为空";
            }else{
                echo "未修改图片";
            }
        }else{
            if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "video/mp4")
            || ($_FILES["file"]["type"] == "imagepeg"))
            && ($_FILES["file"]["size"] < 10241000)){
                if ($_FILES["file"]["error"] > 0) {
                  echo "错误: " . $_FILES["file"]["error"] . "<br />";
                 }else{
                    //重新给上传的文件命名，增加一个年月日时分秒的前缀，并且加上保存路径
                    $filename = "upload/".date('YmdHis').$_FILES["file"]["name"];
                    //move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
                    move_uploaded_file($_FILES["file"]["tmp_name"],$filename); 
                    // echo $filename;      
                }
            }else{
                echo "您上传的文件不符合要求！";
            }   
        }
        


        if ($action =="add"){
            $s3="select * from news where 标题= '{$title}'";
            $r8 = mysqli_query($conn,$s3);
            if (mysqli_num_rows($r8) >0) {
                echo "<p class='pp'>标题: {$title}已经重复添加</p>";
                header("Refresh:1;url=news-input.php");
                die();
            }else{
                if (empty($filename)) {
                    $sql="insert into news(标题,肩题,内容,创建时间,发布时间,userid,columnid) value('$title','$title2','$content',".time().",'$ftime','$writer','$lanmu')";
                }else{
                    $sql="insert into news(标题,肩题,图片,内容,创建时间,发布时间,userid,columnid) value('$title','$title2','$filename','$content',".time().",'$ftime','$writer','$lanmu')";
                }
                
                // var_dump($sql);
                $ad="添加";
                $dz="news-input.php";
                }
            
        }else  if($action=="update"){
                $kid = $_POST["kid"];
                if (empty($filename)) {                 
            $sql1 = "update news set 标题='{$title}',肩题='{$title2}',内容='{$content}',发布时间='{$ftime}',userid='{$writer}',columnid='{$lanmu}' where id='{$kid}'";
        }else{
            $sql1 = "update news set 标题='{$title}',肩题='{$title2}',图片='{$filename}',内容='{$content}',发布时间='{$ftime}',userid='{$writer}',columnid='{$lanmu}' where id='{$kid}'";               
        }
                $ad="修改";
                $dz="news-list.php";
        }else{
            die("请选择方法");
        }
    }else{
        $sql ="delete from news where id ='{$hid}' ";
        $ad="删除";
        $dz="news-list.php";
    }
    
    
    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo "<p class='pp'>数据{$ad}成功</p>";
        header("Refresh:1;url={$dz}");
    }else{
        echo "<p class='pp'>数据{$ad}失败</p>".mysqli_error($conn);
    }
    include("07_s.php");
    mysqli_close($conn);
 ?>

} ?>
