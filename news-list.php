<!-- 头部开始 -->
<?php include("head.php"); ?>
<?php
// 连接数据库
$conn = mysqli_connect("localhost","root","");
// 判断是否连接成功
// if ($conn) {
//  echo "<p class='pp'>连接成功</p>";

// }else{
//  die ("<p class='pp'>连接失败!</p>".mysqli_connect_error());
// }

// 选择要操作的数据库
mysqli_select_db($conn,"student_dbs");

// 设置读取数据库的编码，不然显示汉字会乱码
mysqli_query($conn,"set names utf8");
// 执行sql语句

$sql="select * from  news ";

$result =mysqli_query($conn, $sql);
// 关闭数据库
mysqli_close($conn);
?>
<div class="sui-layout">
      <div class="sidebar">
      <!-- 左菜单 -->
      <?php include("leftmenu.php"); ?>  
      </div>
      <div class="content">
      <p class="sui-text-xxlarge my-padd">新闻管理</p>
      <table class="sui-table table-primary">
                                   <tr>  
                                     <th>id</th>
                                     <th>新闻标题</th>
                                     <th>时间</th>
                                      <th>操作</th>
                                   </tr>
                                  <?php
                                  if(mysqli_num_rows($result)> 0 ){
                                     // 将查询的结果转换为下列数组
                                    while($row=mysqli_fetch_assoc($result)){
                                    echo "<tr>
                                      <td>{$row['id']}</td>
                                      <td>{$row['标题']}</td>
                                      <td>{$row['发布时间']}</td>
                        
                                      <td>
                                            <a  class='sui-btn btn-warning' title=''href='new-update.php?hid={$row['id']}' >修改</a> 
                                              &nbsp; <a class='sui-btn btn-danger' title=''
                                             href='news-save.php?hid={$row['id']}'  >删除</a>
                                      </td>   
                                      </tr>";
                                    }
                                  }else{
                                    echo "没有记录";
                                  }
                                ?>
        </table>
      </div>
    </div>  
<!-- 底部 -->
<?php include("foot.php"); ?>
