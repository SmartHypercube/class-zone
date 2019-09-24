<?php
  include_once("lib.php");
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="zh-CN" />
    <title>网站安装</title>
  </head>
  <body>
<?php
  $con=SQLOpen();
  //SQL语句
  
SQLSend($con,"create table settings(key varchar(256) not null, value varchar(4096), primary key(key))");
SQLSend($con,"create table notifications(NID int not null auto_increment, title varchar(256) not null, time timestamp not null default now(), image varchar(1024), digest varchar(1024) not null, text varchar(16384), deadline int not null, level int not null default 0, primary key(NID))");
SQLSend($con,"insert into notifications(title,image,digest,deadline) values('".base64_encode("网站终于开通啦")."','".base64_encode("9257227011867312.jpg")."','".base64_encode("今天终于开通了空间，撒花庆祝～")."',".(time()+24*3600).")");
SQLSend($con,"create table subjects(SID int not null auto_increment, name varchar(32) not null, primary key(SID))");
SQLSend($con,"insert into subjects(name) values('班级')");
SQLSend($con,"insert into subjects(name) values('语文')");
SQLSend($con,"insert into subjects(name) values('数学')");
SQLSend($con,"insert into subjects(name) values('英语')");
SQLSend($con,"insert into subjects(name) values('物理')");
SQLSend($con,"insert into subjects(name) values('化学')");
SQLSend($con,"insert into subjects(name) values('生物')");
SQLSend($con,"insert into subjects(name) values('政治')");
SQLSend($con,"insert into subjects(name) values('历史')");
SQLSend($con,"insert into subjects(name) values('地理')");
SQLSend($con,"insert into subjects(name) values('音乐')");
SQLSend($con,"insert into subjects(name) values('美术')");
SQLSend($con,"insert into subjects(name) values('体育')");
SQLSend($con,"insert into subjects(name) values('信息')");
SQLSend($con,"insert into subjects(name) values('通用')");
SQLSend($con,"insert into subjects(name) values('其他')");
SQLSend($con,"create table homework(HID int not null auto_increment, subject int not null, description varchar(1024) not null, note varchar(1024), deadline int not null, primary key(HID), foreign key(subject) references subjects(SID))");
SQLSend($con,"create table contacts(CID int not null auto_increment, number int, name varchar(256) not null, birthday date, tel varchar(256), mail varchar(256), site varchar(256), QQ varchar(256), primary key(CID))");
SQLSend($con,"create table articles(AID int not null auto_increment, title varchar(256) not null, author varchar(256) default '网友', time timestamp not null default now(), text varchar(16384), PV int not null default 0, level int not null default 0, primary key(AID))");
  
  $rst=SQLSend($con,'select title from notifications');
  $row=mysql_fetch_array($rst);
  echo '<p>结果：'.base64_decode($row["title"]).'<br />提醒：请尽快删除install.php以保护网站安全！</p>';
  SQLClose($con);
?>
</body></html>
