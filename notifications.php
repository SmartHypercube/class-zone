<?php
  include_once("lib.php");
  if(($_GET["id"]!="")&&(filter_var($_GET["id"],FILTER_VALIDATE_INT)))
  {
    //id
    $ID=$_GET["id"];
    $con=SQLOpen();
    $rst=SQLSend($con,"select * from notifications where NID=".$ID);
    if(mysql_num_rows($rst)!=1)
    {
      die("抱歉，数据库发生严重错误！");
    }
    $row=mysql_fetch_array($rst);
    if($row["NID"]!=$ID)
    {
      die("抱歉，数据库发生严重错误！");
    }
    PrintHead(base64_decode($row["title"])." - 班务布告板 - ".$TITLE);
    echo '
	<body class="no-sidebar">

		<!-- Header -->
			<div id="header">

				<!-- Inner -->
					<div class="inner">
						<header>
							<h1><a href="index.php" id="logo">'.$TITLE.'</a></h1>
						</header>
					</div>
    ';
    PrintNav();
    echo '</div>';
    //Main
echo '
		<!-- Main -->
			<div class="wrapper style1">

				<div class="container">
					<div class="row">
						<div class="12u skel-cell-mainContent" id="content">
							<article id="main" class="special">
								<header>
									<h2>'.base64_decode($row["title"]).'</h2>
									<span class="byline">
										
'.base64_decode($row["digest"]).'
									</span>
								</header>
';
if($row["image"]!="")
  echo '<img src="'.base64_decode($row["image"]).'" alt="'.base64_decode($row["title"]).'" />
';
if($row["text"]!="")
  echo '<p>'.base64_decode($row["text"]).'</p>';
echo '
<footer><a href="notifications.php" class="button">查看全部通告</a><a href="new_notification.htm" class="button">发布新通告（限管理员）</a><br /><form action="del_notification.php?id='.$ID.'" method="post"><input type="password" name="password" id="password" /><input type="submit" value="删除（请先输入管理密码）" /></form></footer>
							</article>
						</div>
					</div>
				</div>
			</div>

';
    PrintFooter();
    exit(0);
  }
  
  PrintHead("班务布告板 - ".$TITLE);
?>

	<body class="no-sidebar">

		<!-- Header -->
			<div id="header">

				<!-- Inner -->
					<div class="inner">
						<header>
							<?php echo '<h1><a href="index.php" id="logo">'.$TITLE.'</a></h1>'; ?>
						</header>
					</div>

<?php PrintNav(); ?>

			</div>
			
		<!-- Main -->
			<div class="wrapper style1">

				<div class="container">
					<div class="row">
						<div class="12u skel-cell-mainContent" id="content">
							<article id="main" class="special">
								<header>
									<h2>班务布告板</h2>
									<span class="byline">
<?php echo "这里有各种最新通知，由管理员".$ADMIN."负责发布与维护。"; ?>
									</span>
								</header>
<ul>
<?php
  $con=SQLOpen();
  $rst=SQLSend($con,"select NID,time,title from notifications where ".time()."<deadline and level>=0 order by level desc,time desc;");
  while($row=mysql_fetch_array($rst))
    echo '<li><a href="notifications.php?id='.$row["NID"].'">'.base64_decode($row["title"]).'</a> | '.$row["time"].'</li>';
  SQLClose($con);
?>
</ul>
    <footer><a href="new_notification.htm" class="button">发布新通告（限管理员）</a></footer>
							</article>
						</div>
					</div>
				</div>

			</div>

<?php PrintFooter(); ?>
