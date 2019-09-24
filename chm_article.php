<!DOCTYPE HTML>
<!-- 版权声明
班级空间模板 by Fasd
以 知识共享-署名-非商业性使用 3.0 中国大陆 许可协议进行许可。
-->
<html>
  <head>
    <title>修改文章级别</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <h1>修改文章级别</h1>
    <p>
<?php
  include_once("lib.php");
  
  if(!ckPassword($_POST["password"]))
    die('密码错误！只有管理员可以修改文章级别。如果忘密码请<a href="mailto:fasd.snake@gmail.com">联系开发者</a>。</p><a href="articles.php">返回文章列表</a><br /><a href="index.php">返回首页</a></body></html>');

  $ID=$_GET["id"];
  if(($ID=="")||(!filter_var($ID,FILTER_VALIDATE_INT)))
    die('系统错误！没有收到文章编号。</p><a href="articles.php">返回文章列表</a><br /><a href="index.php">返回首页</a></body></html>');

  $level=$_POST["level"];
  if(!filter_var($level,FILTER_VALIDATE_INT))
    die('系统错误！没有收到级别。</p><a href="articles.php">返回文章列表</a><br /><a href="index.php">返回首页</a></body></html>');

  $con=SQLOpen();
  if(SQLSend($con,"update articles set level=".$level." where AID=".$ID)==FALSE)
    echo "很抱歉！修改失败，请检查后重试。";
  else echo "修改成功！";
  SQLClose($con);
?>

</p><a href="articles.php">返回文章列表</a><br /><a href="index.php">返回首页</a></body></html>
