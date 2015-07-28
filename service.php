<?php
	include_once 'config.php';
	include_once INC_PATH.'headleader.php';
	require_once INC_PATH.'aunav.php';
?>
<title>客服中心 | <?php echo $webTitle; ?></title>

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

<body class="service_page">

<?php
//app
  include_once INC_PATH.'header.php';
 ?>

  <div id="bannerTrigger"></div>
<section id="bigBanner" >
	<div  id="pageBanner" class="banner" style="background-image: url('<?php path_au('img'); ?>banner-service.jpg')">
		<div class="wrapper">
<div class="phone">
	<a href="tel:0800003958"><span class="txt-1_1 txt-ff1">0800-003-958</span></a>
	<a href="tel:0237653688"><span class="txt-1_1 txt-ff1">(02)3765-3688</span></a>
</div>
		</div>
	</div>
</section>

<main class="">
<?php 	if ($deviceType == 'phone') { ?>
	<div class="phone" style="text-align: center;">
		<a href="tel:0800003958"><span class="txt-1_1 txt-ff1">0800-003-958</span></a>
		<a href="tel:0237653688"><span class="txt-1_1 txt-ff1">(02)3765-3688</span></a>
	</div>
<?php } ?>
	<section class="row1" <?php if ($deviceType == 'phone') { echo "style=\"padding-top:0;\"";} ?>>
		<div class="wrapper">
			<div class="cnt service-category">
				<div class="row1 cf">
					<div class="service1 service-col">
						<a href="monthlyreport.php"></a>
						<div class="service1-bg service-pic pic">
							<img src="<?php path_au('img'); ?>service1.jpg" alt="">
						</div>
						<div class="service-txt">
							<div class="service-txt-inner txtImg_title-title-service1">
								<span class="hidden" data-lang="en">Monthly Report</span>
								<span class="hidden" data-lang="tw">投資月報</span>
							</div>
						</div>
					</div>
					<div class="service2 service-col">
						<a href="download.php"></a>
						<div class="service2-bg service-pic pic">
							<img src="<?php path_au('img'); ?>service2.jpg" alt="">
						</div>
						<div class="service-txt">
							<div class="service-txt-inner txtImg_title-title-service2">
								<span class="hidden" data-lang="en">Download</span>
								<span class="hidden" data-lang="tw">文件下載</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row2 cf">
					<div class="service3 service-col">
						<a href="saleschannel.php"></a>
						<div class="service3-bg service-pic pic">
							<img src="<?php path_au('img'); ?>service3.jpg" alt="">
						</div>
						<div class="service-txt">
							<div class="service-txt-inner txtImg_title-title-service3">
								<span class="hidden" data-lang="en">Sales Channel</span>
								<span class="hidden" data-lang="tw">銷售機構</span>
							</div>
						</div>
					</div>
					<div class="service4 service-col">
						<a href="qa.php"></a>
						<div class="service4-bg service-pic pic">
							<img src="<?php path_au('img'); ?>service4.jpg" alt="">
						</div>
						<div class="service-txt">
							<div class="service-txt-inner txtImg_title-title-service4">
								<span class="hidden" data-lang="en">Q&A</span>
								<span class="hidden" data-lang="tw">常見問題</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="row2 fullbg map">
<div class="wrapper">
	<div class="iframe-rwd">
	     <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.7389305396496!2d121.56517119999998!3d25.0429324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abbea42bcd13%3A0x82c3dcada6a1a738!2zMTEw5Y-w5YyX5biC5L-h576p5Y2A5Z-66ZqG6Lev5LiA5q61MTc26Jmf56uL5qWt5aSn5qiT!5e0!3m2!1szh-TW!2stw!4v1434957132505"></iframe><br /><small><a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.7389305396496!2d121.56517119999998!3d25.0429324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abbea42bcd13%3A0x82c3dcada6a1a738!2zMTEw5Y-w5YyX5biC5L-h576p5Y2A5Z-66ZqG6Lev5LiA5q61MTc26Jmf56uL5qWt5aSn5qiT!5e0!3m2!1szh-TW!2stw!4v1434957132505" style="color:#0000FF;text-align:left">View Larger Map</a></small>
	 </div>
</div>
<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.7389305396496!2d121.56517119999998!3d25.0429324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abbea42bcd13%3A0x82c3dcada6a1a738!2zMTEw5Y-w5YyX5biC5L-h576p5Y2A5Z-66ZqG6Lev5LiA5q61MTc26Jmf56uL5qWt5aSn5qiT!5e0!3m2!1szh-TW!2stw!4v1434957132505" width="600" height="450" frameborder="0" style="border:0"></iframe> -->
		<!-- <img src="<?php //path_au('img'); ?>map.jpg" alt=""> -->
	</section>
	<section class="row3">
		<div class="wrapper cf">
			<div class="col-2">
				<header class="txtImg_title-title-concordInf <?php isPhone('mobile_title-group'); ?>">
					<h1 class="hidden <?php isPhone('mobile_title'); ?> title-1" data-lang="en">Advisory Chat Room</h1>
					<h2 class="hidden <?php isPhone('mobile_title'); ?> title-2" data-lang="tw">康和期顧相談室</h2>
				</header>
				<div class="concordInf">
					<p class="txt-1_2">許可證字號︰103年金管期經字第001號<br>
						地址：110 台北市信義區基隆路一段176號14樓<br>
						客服專線：02-3765-3688 轉702、0800-003-958</p>
					<p class="txt-1_2">親愛的投資人您好，若您有基金交易相關問題，建議您可先點選<a href="qa.php" class="txt-spec">Q&A</a> 解答，以節省您寶貴時間。若相關解答仍無法排除疑問，請利用右側留言系統，我們將儘速為您處理，謝謝!</p>
				</div>
			</div>
			<div class="col-2">
				<div class="contact-form">
					<form class="edit" method="post" action="contactus.php">
						<input type="hidden" name="src" value="客服中心" />
						<input type="hidden" name="url" value="<?=$_SERVER['REQUEST_URI']?>" />
						<ul>
							<li>
								<span class="input input--df input_required">
									<label class="frm__label col" for="c_name">大名：</label>
									<input class="frm__field col validate[required]" type="text" name="name" id="c_name">
								</span>
							</li>
							<li>
								<span class="input input--df input_required">
									<label class="frm__label col" for="c_email">電子信箱：</label>
									<input class="frm__field col validate[required,custom[email]]" type="text" name="email" id="c_email">
								</span>
							</li>
							<li>
								<span class="input input--df input_required">
									<label class="frm__label col" for="c_phone">聯絡電話：</label>
									<input class="frm__field col validate[required]" type="text" name="telno" id="c_phone">
								</span>
							</li>
							<li>
								<span class="input input--df input_required">
									<label class="frm__label col" for="c_calltime">聯絡時間：</label>
									<select name="time" id="" class="frm__field col frm__select validate[required]">
										<option value="">請選擇...</option>
										<option>選項1</option>
										<option>選項2</option>
										<option>選項3</option>
									</select>
								</span>
							</li>
							<li>
								<span class="input input--df input_required">
									<label class="frm__label col" for="c_category">問題或建議類別：</label>
									<select name="category" id="" class="frm__field col frm__select validate[required]">
										<option value="">請選擇...</option>
										<option>選項1</option>
										<option>選項2</option>
										<option>選項3</option>
									</select>
								</span>
							</li>
							<li>
								<span class="input input--df input_required">
									<label class="frm__label col" for="c_msg">留言：</label>
									<textarea class="frm__field col validate[required]" type="text" name="content" id="c_msg"></textarea>
									<button type="submit" class="contact-form-send">SEND</button>
								</span>
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>
	</section>
	<section id="siteMap" class="fullbg row4">
		<div class="bg"></div>
		<div class="wrapper">
			<header class="txtImg_title-title-map <?php isPhone('mobile_title-group'); ?>">
				<h1 class="hidden <?php isPhone('mobile_title'); ?> title-1" data-lang="en">Site Map</h1>
				<h2 class="hidden <?php isPhone('mobile_title'); ?> title-2" data-lang="tw">網站地圖</h2>
			</header>
			<div class="sitemap-sec cnt cf">
				<div class="col-2">
					<ul>
						<li>
							<a href="<?php webPageUrlAu('index'); ?>" class="txt-1">首頁 Home Page</a>
						</li>
						<li>
							<a href="<?php webPageUrlAu('about'); ?>" class="txt-1">康和期經介紹 About Us</a>
							<div class="subSitemap">
								<a href="about.php#futuresBar" class="txt-1_4">康和期經事業</a> / 
								<a href="aboutCPCS.php" class="txt-1_4">資產保護</a> / 
								<a href="about.php#teamProfile" class="txt-1_4">堅強團隊</a>
							</div>
						</li>
						<li>
							<a href="<?php webPageUrlAu('index_futures'); ?>" class="txt-1">康和期經事業 Business </a>
							<div class="subSitemap">
								<a href="<?php webPageUrlAu('futures_managed'); ?>" class="txt-1_4">期貨經理事業</a> / 
								<a href="<?php webPageUrlAu('futures_fund'); ?>" class="txt-1_4">期貨信託事業</a> / 
								<a href="<?php webPageUrlAu('futures_advisory'); ?>" class="txt-1_4">期貨顧問事業</a>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-2">
					<ul>
						<li>
							<a href="<?php webPageUrlAu('news'); ?>" class="txt-1">市場消息 News</a>
						</li>
						<li>
							<a href="<?php webPageUrlAu('products'); ?>" class="txt-1">產品介紹 Products</a>
							<div class="subSitemap">
								<a href="<?php webPageUrlAu('products'); ?>" class="txt-1_4">康和期經產品列表</a> / 
								<a href="chatroom.php" class="txt-1_4">康和期顧相談室</a>
							</div>
						</li>
						<li>
							<a href="<?php webPageUrlAu('service'); ?>" class="txt-1">客服中心 Customer Service </a>
							<div class="subSitemap">
								<a href="monthlyreport.php" class="txt-1_4">投資月報</a> / 
								<a href="saleschannel.php" class="txt-1_4">銷售機構</a> / 
								<a href="download.php" class="txt-1_4">文件下載</a> / 
								<a href="qa.php" class="txt-1_4">Q&A</a> / 
								<a href="service.php#map" class="txt-1_4">網站地圖</a>
							</div>
						</li>
					</ul>
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

	<script type="text/javascript" src="<?=$_SERVER['JASONWANG826_CONFIG']['JASONWANG826_URL']?>/config.js"></script>
	<script type="text/javascript" src="<?=$_SERVER['JASONWANG826_CONFIG']['JASONWANG826_URL']?>/js/jquery-migrate-1.2.1.js"></script>
	<script type="text/javascript" src="<?=$_SERVER['JASONWANG826_CONFIG']['JQUERY_UI_INCLUDE']?>"></script>
	<script type="text/javascript" src="<?=$_SERVER['JASONWANG826_CONFIG']['JQUERY_UI_I18N']?>" id="jquery-ui-i18n" data-lang-id="zh-tw"></script>
	<link rel="stylesheet" href="<?=$_SERVER['JASONWANG826_CONFIG']['JQUERY_UI_CSS']?>" type="text/css" />
	<script type="text/javascript" src="<?=$_SERVER['JASONWANG826_CONFIG']['JASONWANG826_URL']?>/js/validationEngine/jquery.validationEngine.js"></script>
	<script type="text/javascript" src="<?=$_SERVER['JASONWANG826_CONFIG']['JASONWANG826_URL']?>/js/validationEngine/languages/jquery.validationEngine-zh_TW.js"></script>
	<script type="text/javascript" src="/admin/js/jquery.validationEngine-custom.js"></script>
	<link rel="stylesheet" href="<?=$_SERVER['JASONWANG826_CONFIG']['JASONWANG826_URL']?>/css/validationEngine/validationEngine.jquery.ciaoca.css" type="text/css" />
	<script type="text/javascript" src="/admin/js/edit.js"></script>

<?php
// -------------------------------
// google analytics
// -------------------------------
  include_once INC_PATH.'ga.php';
 ?>

</body>
</html>
