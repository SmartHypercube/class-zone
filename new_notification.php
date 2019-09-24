<!DOCTYPE HTML>
<!-- 版权声明
班级空间模板 by Fasd
以 知识共享-署名-非商业性使用 3.0 中国大陆 许可协议进行许可。
-->
<html>
  <head>
    <title>发布新通告</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <h1>发布新通告</h1>
    <p>
<?php
  include_once("lib.php");
  
  if(!ckPassword($_POST["password"]))
    die('密码错误！只有管理员可以发布通告。如果忘密码请<a href="mailto:fasd.snake@gmail.com">联系开发者</a>。</p><a href="new_notification.htm">返回上一页</a><br /><a href="index.php">返回首页</a></body></html>');

//标题
  $title=$_POST["title"];
  if($title=="")
  {
    echo "标题不能为空，已被系统自动修改为“无题”<br />";
    $title="无题";
  }
  $title=base64_encode($title);
//图片
  $image=$_POST["image"];
  if(($image!="")&&(!filter_var($image,FILTER_VALIDATE_URL)))
  {
    echo "检测到您填写的图片地址不正确，系统已将图片去除<br />";
    $image="";
  }
  $image=base64_encode($image);
//摘要
  $digest=$_POST["digest"];
  if($digest=="")
  {
    echo "摘要不能为空，已被系统自动修改为“呵呵”<br />";
    $digest="呵呵";
  }
  $digest=base64_encode($digest);
//正文
  $text=base64_encode(nl2br($_POST["text"]));
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
//级别
  $level=$_POST["level"];
  if($level=="")
  {
    echo "您未选择级别，系统自动设置为普通<br />";
    $level=0;
  }
  if(($level!=0)&&(!filter_var($level,FILTER_VALIDATE_INT)))
  {
    echo "检测到您选择的级别有误，系统已自动设置为普通<br />";
    $level=0;
  }

  $con=SQLOpen();
  if(SQLSend($con,"insert into notifications(title,image,digest,text,deadline,level) values('".$title."','".$image."','".$digest."','".$text."',".$deadline.",".$level.")")==FALSE)
    echo "很抱歉！发布失败。请检查是否超过限制：标题50字，摘要250字，正文1000字。";
  else echo "发布成功！";
  SQLClose($con);
?>

</p><a href="new_notification.htm">再发一篇</a><br /><a href="notifications.php">返回班务布告板</a><br /><a href="index.php">返回首页</a></body></html>
