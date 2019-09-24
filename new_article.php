<!DOCTYPE HTML>
<!-- 版权声明
班级空间模板 by Fasd
以 知识共享-署名-非商业性使用 3.0 中国大陆 许可协议进行许可。
-->
<html>
  <head>
    <title>发布新文章</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <h1>发布新文章</h1>
    <p>
<?php
  include_once("lib.php");

//标题
  $title=$_POST["title"];
  if($title=="")
  {
    echo "标题不能为空，已被系统自动修改为“无题”<br />";
    $title="无题";
  }
  $title=base64_encode($title);
//作者
  $author=$_POST["author"];
  if($author=="")
  {
    echo "作者不能为空，已被系统自动修改为“网友”<br />";
    $author="网友";
  }
  $author=base64_encode($author);
//正文
  $text=base64_encode(nl2br($_POST["text"]));

  $con=SQLOpen();
  if(SQLSend($con,"insert into articles(title,author,text) values('".$title."','".$author."','".$text."')")==FALSE)
    echo "很抱歉！发布失败。请检查是否超过限制：标题50字，正文1000字。";
  else echo "发布成功！";
  SQLClose($con);
?>

</p><a href="new_article.htm">再发一篇</a><br /><a href="index.php">返回首页</a></body></html>
