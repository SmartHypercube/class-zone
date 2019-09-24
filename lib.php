<?php

  //environment
  $TITLE="9班空间";
  $BBS="http://www.baidu.com/";
  $QGROUP="http://www.qq.com/";
  $ADMIN="王子博";
  $TEACHER="樊新梅老师";
  $SQLUSER="root";
  $SQLPASSWORD="";
  $SQLDBNAME="zonetest";
  $ADMINPASS="123456";
  
  //lib
  function SQLOpen()
  {
    global $SQLUSER, $SQLPASSWORD, $SQLDBNAME;
    $con=mysql_connect("localhost",$SQLUSER,$SQLPASSWORD);
    if(!$con)
      die('对不起，发生严重错误：无法连接数据库。');
    mysql_select_db($SQLDBNAME,$con);
    return $con;
  }
  
  function SQLSend($con,$sql)
  {return mysql_query($sql,$con);}
  
  function SQLClose($con)
  {mysql_close($con);}
  
  function myShowTime($time)
  {
  //TODO!
  }
  
  //print
  function print_head($title){echo '
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="zh-CN" />
    <link rel="stylesheet" type="text/css" href="default.css" />
    <title>'.$title.'</title>
  </head>
  <body>
    <div id="wrapper">
      <div id="top">
        <div id="title">
          <h1><a title="'.$TITLE.'" href="index.php">'.$TITLE.'</a></h1>
        </div>
        <div id="navigation">
          <ul>
            <li><a href="index.php">首页</a></li>
            <li><a href="notifications.php">班务</a></li>
            <li><a href="homework.php">作业</a></li>
            <li><a href="articles.php">文章</a></li>
            <li><a href="contacts.php">通讯录</a></li>
            <li><a href="'.$BBSURL.'">论坛</a></li>
            <li><a href="download.php">课件下载</a></li>
            <li><a href="about.php">关于</a></li>
          </ul>
        </div>
      </div>
';
  $con=SQLOpen();
  $rst=SQLSend($con,"select CID,name from contacts where extract(month from now())=extract(month from birthday) and extract(day from now())=extract(day from birthday);");
  if(mysql_num_rows($rst)>0)
  {
    echo '<div id="birth"><p>祝 ';
    while($row=mysql_fetch_array($rst))
      echo '<a href="contacts.php?id='.$row["CID"].'">'.$row["name"].'</a> ';
    echo '生日快乐！（数据来源：<a href="contacts.php">通讯录</a>）</p></div>';
  }
  SQLClose($con);}

  function print_bottom(){echo '
      <div id="bottom">
        
      </div>
    </div>
  </body>
</html>
';}
