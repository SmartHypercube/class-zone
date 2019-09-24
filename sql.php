<!DOCTYPE HTML>
<!-- 版权声明
班级空间模板 by Fasd
以 知识共享-署名-非商业性使用 3.0 中国大陆 许可协议进行许可。
-->
<html>
  <head>
    <title>SQL后台</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <h1>SQL后台</h1>
    <p>
<?php
  include_once("lib.php");
  
  if(!ckPassword($_POST["password"]))
    die('密码错误！</p></body></html>');

  $con=SQLOpen();
  if(SQLSend($con,$_POST["sql"])==false)
    echo "失败。";
  else echo "成功！";
  SQLClose($con);
?>
</p></body></html>
