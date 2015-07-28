<?php
	include_once 'config.php';
	include_once INC_PATH.'headleader.php';
	require_once INC_PATH.'aunav.php';

	$news = new JTNews();
	$news->select($_GET['id']);
?>
<title>市場消息 / 康和快訊 | <?php echo $webTitle; ?></title>

<?php
// -------------------------------
// SEO
// CSS
// Script in the HEAD
// -------------------------------
  include_once INC_PATH.'head.php';
 ?>


<?php
//app
  include_once INC_PATH.'social.php';
 ?>

<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="news_page cnt_page">

<?php
//app
  include_once INC_PATH.'header.php';
 ?>

 <div id="bannerTrigger"></div>
<section id="pageBanner" class="banner" style="background-image: url('<?php path_au('img'); ?>banner-news.jpg')">
	
</section>

<main class="">
	<header class="cnt_title">
		<div class="wrapper small">
			<h2 class="news-title">
				<?=$news->data['title']?>
			</h2>
			<p class="news-time">
				<?=JDate::date_format($news->data['date'],'m月d日 Y')?>
			</p>
		</div>
	</header>
	<section class="fullbg row2">
		<div class="bg"></div>
		<div class="wrapper">
			<div class="cnt cf">
				<article class="editorDF">
					<?=$news->data['content']?>
				</article>
				<!--<img src="<?php// path_au('img'); ?>news-cnt.jpg" alt="" class="temporary">-->
				<footer class="share_bar cf">
					<div class="social_share left" style="margin-top: 2.5em;">
						<span class="txt-1">分享文章</span>
						<ul class="cf">
							<li><a href="javascript:void 0;" class="icon icon-rss"></a></li>
							<li><a href="javascript:void 0;" class="icon icon-fasebook"></a></li>
							<li><a href="javascript:void 0;" class="icon icon-googleplus"></a></li>
							<li><a href="javascript:void 0;" class="icon icon-twitter"></a></li>
							<li><a href="javascript:void 0;" class="icon icon-in"></a></li>
							<li><a href="javascript:void 0;" class="icon icon-pinterest"></a></li>
						</ul>
					</div>
				</footer>
			</div>
			<div class="" style="margin: 1em auto 5em;">
				<a href="javascript:history.go(-1)" class="btn-goback link-2 txt-1">回上一頁</a>
			</div>
		</div>
	</section>

</main>

<?php
//app
  include_once INC_PATH.'footer.php';
 ?>

<?php
// -------------------------------
// Script in the FOOT
// -------------------------------
  include_once INC_PATH.'scriptfoot.php';
 ?>

<?php
// -------------------------------
// google analytics
// -------------------------------
  include_once INC_PATH.'ga.php';
 ?>

</body>
</html>
