<?php
  include_once("lib.php");
  if(($_GET["id"]!="")&&(filter_var($_GET["id"],FILTER_VALIDATE_INT)))
  {
    //id
    $ID=$_GET["id"];
    $con=SQLOpen();
    $rst=SQLSend($con,"select * from contacts where CID=".$ID);
    if(mysql_num_rows($rst)!=1)
    {
      die("抱歉，数据库发生严重错误！");
    }
    $row=mysql_fetch_array($rst);
    if($row["CID"]!=$ID)
    {
      die("抱歉，数据库发生严重错误！");
    }
    PrintHead(base64_decode($row["name"])." - 班级通讯录 - ".$TITLE);
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
									<h2>'.base64_decode($row["name"]).'</h2>
								</header>
<p>学号：'.$row["number"].'<br />生日：'.$row["birthday"].'<br />电话：'.base64_decode($row["tel"]).'<br />邮箱：<a href="mailto:'.base64_decode($row["mail"]).'">'.base64_decode($row["mail"]).'</a><br />主页：<a href="'.base64_decode($row["site"]).'">'.base64_decode($row["site"]).'</a><br />QQ号：'.base64_decode($row["QQ"]).'</p>
<footer><a href="contacts.php" class="button">查看全部通讯录</a><a href="new_contact.htm" class="button">我也要上传</a><br /><form action="del_contact.php?id='.$ID.'" method="post"><input type="password" name="password" id="password" /><input type="submit" value="删除（请先输入管理密码）" /></form></footer>
							</article>
						</div>
					</div>
				</div>
			</div>

';
    PrintFooter();
    exit(0);
  }
  
  PrintHead("班级通讯录 - ".$TITLE);
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
									<h2>班级通讯录</h2>
									<span class="byline">
<?php echo "班级通讯录允许每个同学自己上传资料，如果需要修改或删除请联系管理员 ".$ADMIN." 。"; ?>
									</span>
								</header>
<ul>
<?php
  $con=SQLOpen();
  $rst=SQLSend($con,"select CID,name,number from contacts");
  while($row=mysql_fetch_array($rst))
  {
    echo '<li><a href="contacts.php?id='.$row["CID"].'">'.base64_decode($row["name"]);
    if($row["number"]!="")
      echo '（'.$row["number"].'）';
    echo '</a></li>';
  }
  SQLClose($con);
?>
</ul>
    <footer><a href="new_contact.htm" class="button">我也要上传</a></footer>
							</article>
						</div>
					</div>
				</div>

			</div>

<?php PrintFooter(); ?>
