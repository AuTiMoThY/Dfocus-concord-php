<?php
	include_once 'config.php';
	include_once INC_PATH.'headleader.php';
	require_once INC_PATH.'aunav.php';
?>
<title>康和期經產品介紹 | <?php echo $webTitle; ?></title>

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

<body class="products_page">

<?php
//app
  include_once INC_PATH.'header.php';
 ?>

 <div id="bannerTrigger"></div>
<section id="pageBanner" class="banner" style="background-image: url('<?php path_au('img'); ?>banner-chatroom.jpg')">
	
</section>

<main class="">
	<section class="row1 fullbg">
		<div class="bg"></div>
		<div class="wrapper">
			<?php
				$o = new JTTrust();
				$rs = $o->all();
			?>
			<div class="cnt">
				<?php
					foreach( $rs as $r )	{
						?>
						<div class="metro-row cf">
							<div class="metro-block-style1 pdt">
								<div class="news-pic pic left">
									<img src="<?=$r->icon?>" />
								</div>
								<div class="metro-art right">
									<hgroup>
										<h1 class="pdt-title txt-3"><?=$r->stitle?></h1>
										<h2 class="pdt-subtitle txt-4"><?=$r->title?></h2>
									</hgroup>
									<p class="pdt-shrink_text">
										<?=nl2br($r->brief)?>
									</p>
									<?php	if( empty($r->link) )	{	?>
										<a href="products_cnt.php?products=<?=$r->id?>&type=trust" class="btn btn-pdtMore txt-r1 link-3">深入了解</a>
									<?php	}	else	{	?>
										<a href="<?=$r->link?>" target="_blank" class="btn btn-pdtMore txt-r1 link-3">深入了解</a>
									<?php	}	?>
								</div>
							</div><!-- /.metro-block-style1  END  !! -->
						</div><!-- /.metro-row  END  !! -->
						<?php
					}
				?>

		<div class="" style="margin: 1em auto 5em;">
			<a href="products.php" class="txt_img-goback btn-getmore hide_txt link-2">回產品介紹</a>
		</div>
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
