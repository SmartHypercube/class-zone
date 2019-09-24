<?php
  include_once("lib.php");
?>

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
		<?php echo "<title>".$TITLE."</title>"; ?>
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
	<body class="homepage">

		<!-- Header -->
			<div id="header">
						
				<!-- Inner -->
					<div class="inner">
						<header>
							<?php echo '<h1><a href="index.php" id="logo">'.$TITLE.'</a></h1>'; ?>
							<hr />
							<span class="byline">
					<?php echo '当前网站管理员为'.$ADMIN.'，负责老师为'.$TEACHER.'。有任何建议或想发布任何信息请直接联系。'; ?>
							</span>
							<hr />
<span class="byline">
<?php
  $con=SQLOpen();
  $rst=SQLSend($con,"select CID,name from contacts where extract(month from now())=extract(month from birthday) and extract(day from now())=extract(day from birthday)");
  if(mysql_num_rows($rst)>0)
  {
    echo '祝 ';
    while($row=mysql_fetch_array($rst))
      echo '<a href="contacts.php?id='.$row["CID"].'">'.base64_decode($row["name"]).'</a> ';
    echo '生日快乐！（数据来源：<a href="contacts.php">通讯录</a>）';
  }
  else
  {
    echo "点击开始进入我们的世界";
  }
  SQLClose($con);
?>
</span>
						</header>
						<footer>
							<a href="#notifications" class="button circled scrolly">开始</a>
						</footer>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.php">首页</a></li>
							<li>
								<span>正文</span>
								<ul>
									<li><a href="#notifications">班务布告板</a></li>
									<li><a href="#homework">作业数据库</a></li>
									<li><a href="#articles">文章</a></li>
									<li><a href="#contacts">通讯录</a></li>
								</ul>
							</li>
							<li>
								<span>传送门</span>
								<ul>
									<?php echo '<li><a href="'.$BBS.'">我们的论坛</a></li>'; ?>
									<?php echo '<li><a href="'.$QGROUP.'">我们的群</a></li>'; ?>
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

			</div>
			
		<!-- Carousel -->
			<div class="carousel" id="notifications">
				<div class="reel">
<!-- 此处为班务Notifications -->
<?php
  $con=SQLOpen();
  $rst=SQLSend($con,"select NID,image,title,digest from notifications where ".time()."<deadline and level>=0 order by level desc,time desc;");
  while($row=mysql_fetch_array($rst))
  {
    echo "<article>";
    if($row["image"]!="")
      echo '<a href="notifications.php?id='.$row["NID"].'" class="image featured"><img src="'.base64_decode($row["image"]).'" alt="'.base64_decode($row["title"]).'" /></a>';
    echo '<header><h3><a href="notifications.php?id='.$row["NID"].'">'.base64_decode($row["title"]).'</a></h3></header><p>'.base64_decode($row["digest"]).'</p></article>';
  }
  SQLClose($con);
?>
				</div>
    <footer><a href="notifications.php" class="button">查看全部</a><a href="new_notification.htm" class="button">发布新通告（限管理员）</a></footer>
			</div>

<div class="wrapper style1">
  <div class="container">
    <div class="row">
      <div class="8u skel-cell-mainContent" id="content">
        <article id="articles">
          <header>
            <h2>精选文章</h2>
            <span class="byline">只要你的文章够出色，就有可能放在首页进行展示！</span>
          </header>
<?php
  $con=SQLOpen();
  $rst=SQLSend($con,"select AID,title,author,time,text from articles where level>=2 order by level desc,time desc;");
  while($row=mysql_fetch_array($rst))
    echo '<hr /><section><header><h3><a href="articles.php?id='.$row["AID"].'">'.base64_decode($row["title"]).'</a></h3></header><span class="byline">'.base64_decode($row["author"]).' 发表于 '.$row["time"].'</span>'.base64_decode($row["text"]).'</section>';
  SQLClose($con);
?>
          <footer><a href="articles.php" class="button">查看全部</a><a href="new_article.htm" class="button">发布新文章</a></footer>
        </article>
      </div>
      <div class="4u" id="sidebar">
        <hr class="first" />
        <section id="homework">
          <header><h3>最近作业</h3></header>
          <ul>
<?php
  $con=SQLOpen();
  $rst=SQLSend($con,"select homework.HID as ID, subjects.name as subject, homework.description as description, homework.note as note, homework.deadline as deadline from homework inner join subjects on homework.subject=subjects.SID where ".(time()-24*3600)."<homework.deadline order by homework.deadline,homework.subject;");
  while($row=mysql_fetch_array($rst))
  {
    echo "<li>".getdate($row["deadline"])["mday"]."号-".$row["subject"]."：".base64_decode($row["description"]);
    if($row["note"]!="")
      echo "（".base64_decode($row["note"])."）";
    echo "</li>";
  }
  SQLClose($con);
?>
          </ul>
          <footer><a href="new_homework.htm" class="button">发布（限管理员）</a></footer>
        </section>
        <hr />
        <section id="contacts">
          <header><h3>班级通讯录</h3></header>
          <p>班级通讯录允许每个同学自己上传资料，如果需要修改或删除请联系管理员。</p>
<?php
  $con=SQLOpen();
  $rst=SQLSend($con,"select CID,name,birthday,tel,mail,site,QQ from contacts order by CID desc limit 5;");
  while($row=mysql_fetch_array($rst))
    echo '<h4><a href="contacts.php?id='.$row["CID"].'">'.base64_decode($row["name"]).'</a></h4><p>生日：'.$row["birthday"].'<br />电话：'.base64_decode($row["tel"]).'<br />邮箱：<a href="mailto:'.base64_decode($row["mail"]).'">'.base64_decode($row["mail"]).'</a><br />主页：<a href="'.base64_decode($row["site"]).'">'.base64_decode($row["site"]).'</a><br />QQ号：'.base64_decode($row["QQ"]).'</p>';
  SQLClose($con);
?>
          
          <footer><a href="contacts.php" class="button">查看更多</a><a href="new_contact.htm" class="button">我也要上传</a></footer>
        </section>
      </div>
    </div>
    <hr />
    <div class="row">
    </div>
  </div>
</div>

		<!-- Footer -->
			<div id="footer">
				<div class="container">

					<div class="row">
						<div class="12u">
							
							<!-- Contact -->
								<section class="contact">
<?php echo '<p>'.$TITLE.' | 技术支持：<a href="mailto:fasd.snake@gmail.com">Fasd工作室</a></p>'; ?>
								</section>
							
							<!-- Copyright -->
								<div class="copyright">
									<ul class="menu">
										<li>Fasd工作室 保留所有权利，除非您认真阅读并理解了我们的<a href="about.php#license">版权声明</a>。</li>
										<li>模板设计：<a href="http://html5up.net/">HTML5 UP</a>。</li>
										<li>一些图片是由<a href="http://mdomaradzki.deviantart.com/">Michael Domaradzki</a>提供的。</li>
									</ul>
								</div>
							
						</div>
					
					</div>
				</div>
			</div>

	</body>
</html>
