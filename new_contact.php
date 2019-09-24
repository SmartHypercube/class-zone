<!DOCTYPE HTML>
<!-- 版权声明
班级空间模板 by Fasd
以 知识共享-署名-非商业性使用 3.0 中国大陆 许可协议进行许可。
-->
<html>
  <head>
    <title>上传个人信息</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <h1>上传个人信息</h1>
    <p>
<?php
  include_once("lib.php");
  
//姓名
  $name=$_POST["name"];
  if($name=="")
  {
    echo "姓名不能为空，已被系统自动修改为“李华”<br />";
    $name="李华";
  }
  $name=base64_encode($name);
//学号
  $number=$_POST["number"];
  if(($number!="")&&(!filter_var($number,FILTER_VALIDATE_INT)))
  {
    echo "检测到您填写的学号不是数字，系统已自动去除<br />";
    $number="";
  }
//生日
  $birthday=$_POST["birthday"];
  $birthday=filter_var($birthday, FILTER_SANITIZE_NUMBER_INT);
//电话
  $tel=base64_encode($_POST["tel"]);
//邮箱
  $mail=base64_encode($_POST["mail"]);
//网站
  $site=base64_encode($_POST["site"]);
//QQ
  $QQ=base64_encode($_POST["QQ"]);

  $con=SQLOpen();
  if(SQLSend($con,"insert into contacts(name,number,birthday,tel,mail,site,QQ) values('".$name."','".$number."','".$birthday."','".$tel."','".$mail."','".$site."','".$QQ."')")==FALSE)
    echo "很抱歉！发布失败。";
  else echo "发布成功！";
  SQLClose($con);
?>

</p><a href="contacts.php">返回通讯录</a><br /><a href="index.php">返回首页</a></body></html>
