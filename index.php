<?php
  include_once("lib.php");
  PrintHead($TITLE);
?>

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

<?php PrintNav(); ?>

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

<?php PrintFooter(); ?>
