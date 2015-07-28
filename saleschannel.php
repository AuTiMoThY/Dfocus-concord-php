<?php
	include_once 'config.php';
	include_once INC_PATH.'headleader.php';
	require_once INC_PATH.'aunav.php';
?>
<title>銷售機構 | <?php echo $webTitle; ?></title>

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

<body class="service_page serviceCnt">

<?php
//app
  include_once INC_PATH.'header.php';
 ?>

 <div id="bannerTrigger"></div>
<section id="pageBanner" class="banner" style="background-image: url('<?php path_au('img'); ?>banner-service.jpg')">
	
</section>

<main class="">
	<section class="row1">
		<div class="wrapper small">
			<h2 class="title">
				<img src="<?php path_au('img'); ?>title-saleschannel.png" alt="" class="temporary">
			</h2>
		</div>
	</section>
	<section class="fullbg row2 serviceCnt-wrap sales-wrap">
		<div class="bg"></div>
		<div class="wrapper">
			<?php
				$sc = new JTSaleschannel();
			?>
			<div class="sales-container serviceCnt-container cf">
				<div class="row1 left">
					<h3 class="txtImg_title-title-sales1 hide_txt">銀行</h3>
					<?php
						$rs = $sc->all('銀行');
					?>
					<ul class="sales-list cf">
						<?php
							foreach ($rs as $d) {
								?>
									<li class="sales-item">
										<a href="<?=$d->link?>" target="_blank">
											<div class="sales-title"><?=$d->name?></div>
											<p class="txt-1_4"><?=$d->telno?></p>
											<i class="icon icon-sales"></i>
										</a>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
				<div class="row2 left">
					<h3 class="txtImg_title-title-sales2 hide_txt">證券 ／期貨</h3>
					<?php
						$rs = $sc->all('證劵/期貨');
					?>
					<ul class="cf">
						<?php
							foreach ($rs as $d) {
								?>
									<li class="sales-item">
										<a href="<?=$d->link?>" target="_blank">
											<div class="sales-title"><?=$d->name?></div>
											<p class="txt-1_4"><?=$d->telno?></p>
											<i class="icon icon-sales"></i>
										</a>
									</li>
								<?php
							}
						?>
					</ul>
				</div>
			</div>


		</div>
<div class="" style="display: table; margin: auto; width: 134px;"><a href="service.php" class="txt_img-goService hide_txt btn-goService btn link-2">回客服中心</a></div>
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
<script>
$(function() {
	
	$(".sales-item").hover(function() {
		$(this).find(".icon-sales").addClass('animated').addClass('flip');
	}, function() {
		$(this).find(".icon-sales").removeClass('animated');
	});

});
</script>
<?php
// -------------------------------
// google analytics
// -------------------------------
  include_once INC_PATH.'ga.php';
 ?>

</body>
</html>
