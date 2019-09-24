<?php
  include_once("lib.php");
  if(($_GET["id"]!="")&&(filter_var($_GET["id"],FILTER_VALIDATE_INT)))
  {
    //id
    $ID=$_GET["id"];
    $con=SQLOpen();
    $rst=SQLSend($con,"select * from articles where AID=".$ID);
    if(mysql_num_rows($rst)!=1)
    {
      die("抱歉，数据库发生严重错误！");
    }
    $row=mysql_fetch_array($rst);
    if($row["AID"]!=$ID)
    {
      die("抱歉，数据库发生严重错误！");
    }
    PrintHead(base64_decode($row["title"])." - 阅读文章 - ".$TITLE);
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
										
'.base64_decode($row["author"]).' 发表于 '.$row["time"].'
									</span>
								</header>
<p>'.base64_decode($row["text"]).'</p>
<footer><a href="articles.php" class="button">查看全部文章</a><a href="new_article.htm" class="button">发布新文章</a><br /><form action="chm_article.php?id='.$ID.'" method="post"><label for="level">级别</label>
        <select name="level" id="level">
          <option value="-1">删除</option>
          <option value="0">普通</option>
          <option value="1">置顶</option>
          <option value="2">最高</option>
        </select><input type="password" name="password" id="password" /><input type="submit" value="修改级别（请先输入管理密码）" /></form></footer>
							</article>
						</div>
					</div>
				</div>
			</div>

';
    PrintFooter();
    exit(0);
  }
  
  PrintHead("文章列表 - ".$TITLE);
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
									<h2>文章列表</h2>
									<span class="byline">
<?php echo "这里有所有同学们上传的文章，希望大家积极上传。"; ?>
									</span>
								</header>
<ul>
<?php
  $con=SQLOpen();
  $rst=SQLSend($con,"select AID,author,time,title from articles where level>=0 order by level desc,time desc;");
  while($row=mysql_fetch_array($rst))
    echo '<li><a href="articles.php?id='.$row["AID"].'">'.base64_decode($row["title"]).'</a> | '.base64_decode($row["author"]).' 发表于 '.$row["time"].'</li>';
  SQLClose($con);
?>
</ul>
    <footer><a href="new_article.htm" class="button">发布新文章</a></footer>
							</article>
						</div>
					</div>
				</div>

			</div>

<?php PrintFooter(); ?>
