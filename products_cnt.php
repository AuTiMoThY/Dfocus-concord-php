<?php
	include_once 'config.php';
	include_once INC_PATH.'headleader.php';
	require_once INC_PATH.'aunav.php';
	include_once 'dist/products_data.php';


	$get_pdt = isset($_GET['products']) ? $_GET['products'] : 1;

	
	switch($_GET['type']) {
		case 'trust':
			$obj = new JTTrust();
			$obj->select($get_pdt);
			break;
		case 'fund':
			$obj = new JTFund();
			$obj->select($get_pdt);
			break;
		default:
	}

	$pdt_index = $obj->data['id'];
	$pdt_title = $obj->data['title'];
	$pdt_subtitle = $obj->data['stitle'];
	$pdt_editorDF = $obj->data['content'];


	$rs = $obj->all();
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

<body class="products_page prodCnt">

<?php
//app
  include_once INC_PATH.'header.php';
 ?>

 <div id="bannerTrigger"></div>
<section id="pageBanner" class="banner" style="background-image: url('<?php path_au('img'); ?>banner-chatroom.jpg')">
	
</section>

<main class="">
	<section class="row1">
		<div class="wrapper small">
<!-- 			<h2 class="title">
				<img src="<?php //path_au('img'); ?>title-prodCnt.png" alt="" class="temporary">
			</h2> -->
			<hgroup>
				<h1 class="pdt-title txt-3 text-center"><?php echo $pdt_title; ?></h1>
				<h2 class="pdt-subtitle txt-4 text-center"><?php echo $pdt_subtitle; ?></h2>
<!-- 				<h1 class="pdt-title txt-3 text-center">Futures Fund</h1>
				<h2 class="pdt-subtitle txt-4 text-center">多空成長期貨信託基金</h2>
 -->			</hgroup>
		</div>
	</section>
	<section class="fullbg row2">
		<div class="bg"></div>
		<div class="wrapper">
			<div id="" class="faq-container serviceCnt-container tab_block cf">
				<div class="row1 cf">
					<div id="tabsMarquee" class="faq-tabs-wrap left">
						<ul class="tabs faq-tabs cf">
							<?php
								foreach( $rs as $d )	{
									if( empty($d->link) )	{
										?>
											<li>
												<a href="products_cnt.php?products=<?=$d->id?>&type=<?=$_GET['type']?>" class="txt-2" title="<?=$d->title?>"><?=$d->title?></a>
											</li>
										<?php
									}	else	{
										?>
											<li>
												<a href="<?=$d->link?>" target="_blank" class="txt-2" title="<?=$d->title?>"><?=$d->title?></a>
											</li>
										<?php
									}
								}
							?>
						</ul>
					</div>
				    <div class="faq-tabs-change right">
				    	<div id="marquee_prev_btn" class="btn btn-faq-tabs-prev faq-tabs-btn left">
				    		<i class="fa fa-caret-down"></i>
				    	</div>
				    	<div id="marquee_next_btn" class="btn btn-faq-tabs-next faq-tabs-btn left">
				    		<i class="fa fa-caret-up"></i>
				    	</div>
				    </div>
				</div>
			</div>
			<div class="cnt editorDF">
				<!-- 圖文編輯器 -->
				<?php echo $pdt_editorDF; ?>
			</div>
			<div class="" style="margin: 1em auto 5em;">
				<a href="products.php" class="txt_img-goProdList btn-getmore hide_txt"></a>
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
<script>

$(function() {
	var tabs = $("ul.tabs");
	var tabsH = $("ul.tabs").height();
	// var tabsH2 = tabsH*-1;
	tabs.css({'top': '0'});
	var tabsPrev = $("#marquee_prev_btn");
	var tabsNext = $("#marquee_next_btn");
	var pos = 40;

	tabsPrev.click(function() {
		if (tabs.css('top') == tabsH/2*-1+"px") {
			console.log('yoyo');
			// return false;
		}else {
			tabs.css({
				top: "-=40"
			});
		};
	});
	tabsNext.click(function() {
		if (tabs.css('top') == 0+"px") {
			console.log('yoyo');
			// return false;
		}else {
			tabs.css({
				top: "+=40"
			});
		};
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
