<?php

error_reporting(0);

  //environment
  $TITLE="9班空间";
  $BBS="http://www.baidu.com/";
  $QGROUP="http://www.qq.com/";
  $ADMIN="王子博";
  $TEACHER="樊新梅老师";
  $SQLHOST="localhost";
  $SQLUSER="username";
  $SQLPASSWORD="password";
  $SQLDBNAME="zonetest";
  $ADMINPASS="123456";
  
  //lib
  function SQLOpen()
  {
    global $SQLHOST, $SQLUSER, $SQLPASSWORD, $SQLDBNAME;
    $con=mysqli_connect($SQLHOST,$SQLUSER,$SQLPASSWORD,$SQLDBNAME);
    if(mysqli_connect_errno())
      die('对不起，发生严重错误：无法连接数据库。' . mysqli_connect_error());
    return $con;
  }
  
  function SQLSend($con,$sql)
  {return mysqli_query($con,$sql);}
  
  function SQLClose($con)
  {mysqli_close($con);}
  
  function mysql_num_rows($a){return mysqli_num_rows($a);}
  function mysql_fetch_array($a){return mysqli_fetch_array($a);}
  
  function ckPassword($password)
  {
    global $ADMINPASS;
    return ($password==$ADMINPASS);
  }
  
  
  function PrintHead($title)
  {echo '
<!DOCTYPE HTML>
<!-- 模板原版权声明
	Helios 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<!-- 版权声明
	班级空间模板 by Fasd
	以 知识共享-署名-非商业性使用 3.0 中国大陆 许可协议进行许可。原作者 HTML5 UP 由 Fasd 创建本演绎作品
-->
<html>
	<head>
		<title>'.$title.'</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
	</head>
    ';}
    
  function PrintNav()
  {
    global $BBS, $QGROUP;
    echo '
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.php">首页</a></li>
							<li>
								<span>正文</span>
								<ul>
									<li><a href="notifications.php">班务布告板</a></li>
									<li><a href="index.php#homework">作业数据库</a></li>
									<li><a href="articles.php">文章</a></li>
									<li><a href="contacts.php">通讯录</a></li>
								</ul>
							</li>
							<li>
								<span>传送门</span>
								<ul>
									<li><a href="'.$BBS.'">我们的论坛</a></li>
									<li><a href="'.$QGROUP.'">我们的群</a></li>
								</ul>
							</li>
							<li>
								<span>关于</span>
								<ul>
									<li><a href="about.php">关于这个网站</a></li>
									<li><a href="about.php#fasd">联系开发者</a></li>
									<li><a href="about.php#join">你也想要这样的网站吗？</a></li>
									<li><a href="about.php#license">版权声明</a></li>
								</ul>
							</li>
						</ul>
					</nav>
  ';}
  
  function PrintFooter()
  {
    global $TITLE;
    echo '
		<!-- Footer -->
			<div id="footer">
				<div class="container">

					<div class="row">
						<div class="12u">
							
							<!-- Contact -->
								<section class="contact">
<p>'.$TITLE.' | 技术支持：<a href="mailto:fasd.snake@gmail.com">Fasd工作室</a></p>
								</section>
							
							<!-- Copyright -->
								<div class="copyright">
<a rel="license" href="http://creativecommons.org/licenses/by-nc/3.0/cn/"><img alt="知识共享许可协议" style="border-width:0" src="http://i.creativecommons.org/l/by-nc/3.0/cn/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">班级网站模板</span> 由 <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Fasd工作室</span> 创作，采用 <a rel="license" href="http://creativecommons.org/licenses/by-nc/3.0/cn/">知识共享 署名-非商业性使用 3.0 中国大陆 许可协议</a>进行许可。<br />基于<a xmlns:dct="http://purl.org/dc/terms/" href="http://html5up.net/helios/" rel="dct:source">http://html5up.net/helios/</a>上的作品创作。
									<ul class="menu">
										<li>一些图片是由<a href="http://mdomaradzki.deviantart.com/">Michael Domaradzki</a>提供的。</li>
									</ul>
								</div>
							
						</div>
					
					</div>
				</div>
			</div>
</body></html>
  ';}
  
?>
