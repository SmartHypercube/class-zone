<!DOCTYPE HTML>
<!-- 版权声明
班级空间模板 by Fasd
以 知识共享-署名-非商业性使用 3.0 中国大陆 许可协议进行许可。
-->
<html>
  <head>
    <title>发布新作业</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <h1>发布新作业</h1>
    <p>
<?php
  include_once("lib.php");
  
  if($_POST["password"]!=$ADMINPASS)
    die('密码错误！只有管理员可以发布通告。如果忘密码请<a href="mailto:fasd.snake@gmail.com">联系开发者</a>。</p><a href="new_homework.htm">返回上一页</a><br /><a href="index.php">返回首页</a></body></html>');

//科目
  $subject=$_POST["subject"];
  if($subject=="")
  {
    echo "您未选择科目，系统自动设置为其他<br />";
    $subject=16;
  }
  if(!filter_var($subject,FILTER_VALIDATE_INT))
  {
    echo "检测到您选择的科目有误，系统已自动设置为其他<br />";
    $subject=16;
  }
//内容
  $description=$_POST["description"];
  if($description=="")
  {
    echo "内容不能为空，已被系统自动修改为“熟读课本前言”<br />";
    $description="熟读课本前言";
  }
  $description=base64_encode($description);
//备注
  $note=base64_encode($_POST["note"]);
//过期
  $deadline=$_POST["deadline"];
  if($deadline=="")
  {
    echo "您未填写过期时间，系统自动设置为24小时后<br />";
    $deadline=1;
  }
  if(!filter_var($deadline,FILTER_VALIDATE_INT))
  {
    echo "检测到您填写的过期时间不是数字，系统已自动设置为24小时后<br />";
    $deadline=1;
  }
  $deadline=time()+24*3600*$deadline;

  $con=SQLOpen();
  if(SQLSend($con,"insert into homework(subject,description,note,deadline) values(".$subject.",'".$description."','".$note."',".$deadline.")")==FALSE)
    echo "很抱歉！发布失败。请检查是否超过限制：内容与备注各250字";
  else echo "发布成功！";
  SQLClose($con);
?>

</p><a href="new_homework.htm">再发一篇</a><br /><a href="index.php">返回首页</a></body></html>
