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
<section class="fullbg row2">
	<div class="bg"></div>
	<div class="wrapper">

		<div class="cnt">
			<ul class="chatroom-list cf">
				<li class="chatroom-item pdt-item" style="min-height:auto;"><a href="products_list1.php">
					<header class="text-center">
						<h1 class="txt-3" data-lang="en" style="margin-bottom:0;">Futures Fund</h1>
						<h2 class="txt-3_2" data-lang="tw" style="margin-top:0;">基金</h2>
					</header>
					<div class="chatroom-pic pic" style="padding-bottom:0;height:auto;">
						<img src="<?php path_au('img'); ?>pic-pdt1.jpg" alt="">
					</div>
				</a></li>
				<li class="chatroom-item pdt-item" style="min-height:auto;"><a href="products_list2.php">
					<header class="text-center">
						<h1 class="txt-3" data-lang="en" style="margin-bottom:0;">Futures Managed Account</h1>
						<h2 class="txt-3_2" data-lang="tw" style="margin-top:0;">全權委託</h2>
					</header>
					<div class="chatroom-pic pic" style="padding-bottom:0;height:auto;">
						<img src="<?php path_au('img'); ?>pic-pdt2.jpg" alt="">
					</div>
				</a></li>
				<li class="chatroom-item pdt-item" style="min-height:auto;"><a href="products_list3.php">
					<header class="text-center">
						<h1 class="txt-3" data-lang="en" style="margin-bottom:0;">Futures Advisory</h1>
						<h2 class="txt-3_2" data-lang="tw" style="margin-top:0;">顧問服務</h2>
					</header>
					<div class="chatroom-pic pic" style="padding-bottom:0;height:auto;">
						<img src="<?php path_au('img'); ?>pic-pdt3.jpg" alt="">
					</div>
				</a></li>

			</ul>
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
