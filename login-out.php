<?php 
session_start();
unset($_SESSION['usname'] );//删除指定的session
header("Refresh:0;url=login.php");
?>