<!DOCTYPE HTML>
<!-- 版权声明
班级空间模板 by Fasd
以 知识共享-署名-非商业性使用 3.0 中国大陆 许可协议进行许可。
-->
<html>
  <head>
    <title>删除通告</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <h1>删除通告</h1>
    <p>
<?php
  include_once("lib.php");
  
  if(!ckPassword($_POST["password"]))
    die('密码错误！只有管理员可以删除通告。如果忘密码请<a href="mailto:fasd.snake@gmail.com">联系开发者</a>。</p><a href="notifications.php">返回通告列表</a><br /><a href="index.php">返回首页</a></body></html>');

  $ID=$_GET["id"];
  if(($ID=="")||(!filter_var($ID,FILTER_VALIDATE_INT)))
    die('系统错误！没有收到要删除的通告编号。</p><a href="notifications.php">返回通告列表</a><br /><a href="index.php">返回首页</a></body></html>');

  $con=SQLOpen();
  if(SQLSend($con,"update notifications set level=-1 where NID=".$ID)==FALSE)
    echo "很抱歉！删除失败，请检查后重试。";
  else echo "删除成功！";
  SQLClose($con);
?>

</p><a href="notifications.php">返回通告列表</a><br /><a href="index.php">返回首页</a></body></html>
