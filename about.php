<?php
  include_once("lib.php");
  PrintHead("关于 - ".$TITLE);
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
									<h2>关于</h2>
									<span class="byline">
										不能没有的关于页……论程序猿和这个网站不能不说的故事
									</span>
								</header>
								<p>
<?php echo '
班级网站模板（1.0版）是Fasd工作室的开山之作，您现在正在浏览的网站是由Fasd工作室授权给 '.$TITLE.' 使用的。<br />
Fasd工作室一直坚信，信息化是21世纪世界发展的必然趋势，我们开发这个模板，旨在为广大师生们提供一个更方便、更生动的信息交流平台。<br />
这个模板的开发得到了许多人或组织的帮助，在此先向 <a href="html5up.net">HTML5 UP</a> 与Fasd工作室的程序员们表示感谢！<br />
如果在使用中发现任何问题，请立刻联系我们： <a href="mailto:fasd.snake@gmail.com">fasd.snake@gmail.com</a> ，谢谢！'; ?>
								</p>
								<section id="fasd">
									<header>
										<h3>关于Fasd工作室</h3>
									</header>
									<p>
“Fasd工作室”成立于2009年，前身为“闪电创意工作室”。自成立以来一直在寻找有理想、有志向在这个信息时代“做点什么”，同时又对于计算机、网络、编程有所了解的同龄人。至今为止，著名产品有：在线班级通讯录、“一路走过”回忆集模板、班级网站模板、“一框”搜索工具（待开发）等。主管邮箱： <a href="mailto:fasd.snake@gmail.com">fasd.snake@gmail.com</a> 。
									</p>
								</section>
								<section id="join">
									<header>
										<h3>用这份模板搭建你自己的网站</h3>
									</header>
									<p>
这份模板以“知识共享-署名-非商业性使用 3.0 中国大陆许可协议”进行许可，对于许可协议的详情请看下一节。这个协议意味着任何人可以免费、自由得到完整的源代码，您可以向 <a href="mailto:fasd.snake@gmail.com">fasd.snake@gmail.com</a> 发邮件来索取代码包和说明文档。<br />
不过，如果您对于服务器、网站运行等知识不够了解，我们也可以收费，帮您处理从发布网站到后期升级维护的所有问题。发邮件给 <a href="mailto:fasd.snake@gmail.com">fasd.snake@gmail.com</a> ，说清楚您的想法，我们就会尽快与您联系。
									</p>
								</section>
								<section id="license">
									<header>
										<h3>版权声明</h3>
									</header>
<a rel="license" href="http://creativecommons.org/licenses/by-nc/3.0/cn/"><img alt="知识共享许可协议" style="border-width:0" src="http://i.creativecommons.org/l/by-nc/3.0/cn/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">班级网站模板</span> 由 <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Fasd工作室</span> 创作，全部源代码、文档及图片（也就是可以用来安装网站的安装包中所含有的全部文件，包括图片、说明文档及HTML代码、PHP脚本、CSS、JavaScript脚本、SQL语句，但不包括数据库中存储的、由使用者上传的内容，也不包括使用者在lib.php中自行设置的环境变量）采用 <a rel="license" href="http://creativecommons.org/licenses/by-nc/3.0/cn/">知识共享 署名-非商业性使用 3.0 中国大陆 许可协议</a>进行许可。<br />基于<a xmlns:dct="http://purl.org/dc/terms/" href="http://html5up.net/helios/" rel="dct:source">http://html5up.net/helios/</a>上的作品创作。
									<p>
Fasd工作室非常重视版权问题，如果您不明白上面这些文字的意思，那么简单地说：如果您要使用这个模板或它的任何部分时，记得标注清楚“HTML5 UP”和“Fasd工作室”是原作者，并且不可以以赚钱为目的，我们就不会追究。（这只是知识共享协议法律文本的简单解释，目的是帮助读者理解，既与知识共享官方无关，也不是我们的版权条款的一部分，一切以法律文本为准）
									</p>
								</section>
							</article>
						</div>
					</div>
				</div>

			</div>

<?php PrintFooter(); ?>
