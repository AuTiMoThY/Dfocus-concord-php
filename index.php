<?php
	include_once 'config.php';
	include_once INC_PATH.'headleader.php';
	require_once INC_PATH.'aunav.php';
	include_once 'dist/character_data.php';
?>
<title><?php echo $webTitle; ?></title>

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

<body class="index_page">

<?php
//app
  include_once INC_PATH.'header.php';
 ?>
<section id="bannerSlider" class="banner flexslider" >
	<?php
		$slide = new JTSlide();
		$rsSlide = $slide->all();
	?>
	<ul class="slides">
		<?	foreach ( $rsSlide as $i=>$r )	{	?>
			<li class="banner" style="background-image: url('<?=$r->fpath?>');"><a href="<?=$r->link?>" class="index-banner hide_txt">more info</a></li>
		<?	}	?>
	</ul>
	
</section>

<main class="">
	<section id="netAssetValueBar" class="fullbg row0 net_asset_value">
		<?php
			$fp = new JTFundPrice();
			$fp->last();
		?>
		<div class="wrapper cf">
			<div class="col-4 txt-6">Today's Net Asset Value</div>
			<div class="col-4">
				<label for="" class="net_asset_value-label col ">
					<span class="net_asset_value-label-bg"></span>
					<span class="net_asset_value-label-cnt txt-6_1">基金淨值日</span>
				</label>
				<div class="net_asset_value-txt col txt-6"><?=JDate::date_format($fp->data['date'],'Y/m/d')?></div>
			</div>
			<div class="col-4">
				<label for="" class="net_asset_value-label col ">
					<span class="net_asset_value-label-bg"></span>
					<span class="net_asset_value-label-cnt txt-6_1">最新淨值</span>
				</label>
				<div class="net_asset_value-txt col txt-6"><?=$fp->data['price']?></div>
			</div>
			<div class="col-4">
				<button type="button" id="netAssetValueBtn" class="btn btn-more">
					more
				</button>
				<a href="product_chart.php" id="" class="btn btn-moreChart">
					詳細資訊<i class="fa fa-line-chart"></i>
				</a>
			</div>
		</div>
		<div id="netAssetValuePanel" class="net_asset_value-history">
			<div class="wrapper">
<?php 
if ($deviceType == 'phone') {
	$rsFundPrice = $fp->all(5);
?>
<ul class="cf">
	<?php
		foreach($rsFundPrice as $d)	{
	?>
		<li><span class="date"><?=JDate::date_format($d->date,'Y/m/d')?></span><span class="num"><?=$d->price?></span></li>
	<?php
		}
	?>
</ul>
<?
}else {
	$rsFundPrice = $fp->all(15);
?>
<ul class="cf">
	<?php
		foreach($rsFundPrice as $d)	{
	?>
		<li><span class="date"><?=JDate::date_format($d->date,'Y/m/d')?></span><span class="num"><?=$d->price?></span></li>
	<?php
		}
	?>
</ul>
<?php } ?>
			</div>
		</div>
	</section>
	<section class="fullbg row1">
		<div class="wrapper xs">
			<div class="row1-cnt">
				<hgroup id="txtImg1" class="txtImg_title-title-index_row1">
					<h1 class="hidden">康和期貨經理事業，國內唯一專營期貨經理與期貨信託<br>滿足您資產配置及財務風險規劃的服務需求</h1>
				</hgroup>
				<!-- <p class="txt-2">康和期貨經理事業股份有限公司為康和證券集團成員，資本額3億，基於金融市場長期的發展趨勢，陸續設置期貨服務事業之相關部門，秉持專業、積極的服務態度，提供客戶健全、客制化的投資工具及多樣化的金融商品，滿足投資人資產配置及財務風險規劃的服務需求，替大型投資法人與一般自然人做完整之金融代工、商品設計、顧問輔導咨詢與期貨信託受益憑證發行服務，相關業務拓展至兩岸三地華人市場。 </p> -->
				<p class="txt-2 text-center">
					<?php
						$wc = new JTWebContent();
						$wc->select('index.slogan');
						echo nl2br($wc->data['content']);
					?>
				</p>
			</div>
		</div>
	</section>
	<!--  section.row2  康和期經三大事業體  START  -->
	<section id="futures" class="row2">
		<div class="wrapper">
			<hgroup>
				<h1 class="hide_txt txt_img-BusinessDivisons <?php isPhone('mobile_title'); ?> title-1" data-lang="en">Business Divisons</h1>
				<h2 class="hide_txt txt_img-BusinessDivisons <?php isPhone('mobile_title'); ?> title-2" data-lang="tw">康和期經三大事業體</h2>
			</hgroup>
			<div class="cnt">
				<ul class="futures-list cf">
					<li class="futures-item">
						<figure><a href="<?php webPageUrlAu('futures_managed'); ?>">
							<div class="futures-pic pic">
								<img src="<?php path_au('img'); ?>pic1.jpg" alt="">
							</div>
							<figcaption>
								<!-- <p class="futures-item-intro txt-2">期貨經理事業係指經營接受特定人委任，對委任人之委託交易資產，就有關期貨交易、期貨相關現貨商品或其他經主管機關核准項目之交易或投資為分析、判斷，並基於該分析、判斷，為委任人執行期貨交易之業務者</p> -->
							</figcaption>
						</a></figure>
						<p class="txt-ff1 txt-1">Futures Managed Account</p>
						<p class="txt-ff1 txt-1">期貨經理事業</p>
					</li>
					<li class="futures-item">
						<figure><a href="<?php webPageUrlAu('futures_fund'); ?>">
							<div class="futures-pic pic">
								<img src="<?php path_au('img'); ?>pic2.jpg" alt="">
							</div>
							<figcaption>
								<!-- <p class="futures-item-intro txt-2">國內期貨信託事業係以向不特定人或符合主管機關所定資格條件之人募集期貨信託基金發行受益憑證，並運用期貨信託基金從事交易或投資之事業。聚集更多的小額資金，配合專業穩健的研究投資團隊，為廣大投資人進行審慎與安全的期貨交易，提供一個可參與國內外期貨市場的管道。</p> -->
							</figcaption>
						</a></figure>
						<p class="txt-ff1 txt-1">Futures Fund</p>
						<p class="txt-ff1 txt-1">期貨信託事業</p>
					</li>
					<li class="futures-item">
						<figure><a href="<?php webPageUrlAu('futures_advisory'); ?>">
							<div class="futures-pic pic">
								<img src="<?php path_au('img'); ?>pic3.jpg" alt="">
							</div>
							<figcaption>
								<!-- <p class="futures-item-intro txt-2">期貨顧問事業業務係以接受委任，對期貨交易、期貨信託基金、期貨相關現貨商品或其他經主管機關公告與核准項目之交易或投資有關事項提供研究分析意見或建議咨詢服務，與執行前款有關期貨交易或投資之出版品發行及舉辦講習者。</p> -->
							</figcaption>
						</a></figure>
						<p class="txt-ff1 txt-1">Futures Advisory</p>
						<p class="txt-ff1 txt-1">期貨顧問事業</p>
					</li>
				</ul>

				<!-- <img src="<?php //path_au('img'); ?>index-row2.jpg" alt=""> -->
			</div>
		</div>
	</section><!--  / section.row2  康和期經三大事業體  END  !!  -->
	<!--  section.row3  堅強團隊  START  -->
	<section id="team" class="row3">
		<div class="wrapper small">
			<hgroup class="txtImg_title txtImg_title-title-team <?php isPhone('mobile_title-group'); ?>">
				<h1 class="hidden <?php isPhone('mobile_title'); ?> title-1" data-lang="en">Managment Team</h1>
				<h2 class="hidden <?php isPhone('mobile_title'); ?> title-1" data-lang="tw">經營團隊</h2>
			</hgroup>
		</div>
		<footer class="character-ft">
			<div id="charMarquee" class="character-caroul">
				<?php
					$team = new JTTeam();
					$rsTeam = $team->all(3);
				?>
				<ul class="character-caroul-list cf">
				<?php foreach ($rsTeam as $d) { ?>
					<li class="character-item"><a href="character.php?character=<?=$d->id?>">
						<figure>
							<div class="character-pic pic about-character<?=$d->id?>">
								<img src="<?=$d->thumb?>">
							</div>
							<figcaption>
								<div class="left">
									<span class="inner character-name"><?=$d->name?></span>
								</div>
								<div class="right">
									<span class="inner character-title"><?=$d->job?></span>
								</div>
							</figcaption>
						</figure>
					</a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="character-caroul-ctrl">
				<div id="marquee_prev_btn" class="btn btn-faq-tabs-prev faq-tabs-btn">
					<i class="fa fa-caret-left"></i>
				</div>
				<div id="marquee_next_btn" class="btn btn-faq-tabs-next faq-tabs-btn">
					<i class="fa fa-caret-right"></i>
				</div>
			</div>
		</footer>
<!-- <div class="character-wrap">
	<ul class="cf character-list">
		<li class="character-item"><a href="character.php?character=6">
			<figure>
				<div class="character-pic pic index-character6">
					<img src="upload/character/character6.png" alt="" class="">
				</div>
				<figcaption>
					<div class="left">
						<span class="inner character-name">謝增泉</span>
					</div>
					<div class="right">
						<span class="inner character-title">全權委託協理<br>交易決定人</span>
					</div>
				</figcaption>
			</figure>
		</a></li>
		<li class="character-item"><a href="character.php?character=3">
			<figure>
				<div class="character-pic pic index-character3">
					<img src="upload/character/character3.png" alt="" class="">
				</div>
				<figcaption>
					<div class="left">
						<span class="inner character-name">林豪威</span>
					</div>
					<div class="right">
						<span class="inner character-title">投資長</span>
					</div>
				</figcaption>
			</figure>
		</a></li>
		<li class="character-item"><a href="character.php?character=1">
			<figure>
				<div class="character-pic pic index-character1">
					<img src="upload/character/character1.png" alt="" class="">
				</div>
				<figcaption>
					<div class="left">
						<span class="inner character-name">葉一豐</span>
					</div>
					<div class="right">
						<span class="inner character-title">董事長</span>
					</div>
				</figcaption>
			</figure>
		</a></li>
		<li class="character-item"><a href="character.php?character=2">
			<figure>
				<div class="character-pic pic index-character2">
					<img src="upload/character/character2.png" alt="" class="">
				</div>
				<figcaption>
					<div class="left">
						<span class="inner character-name">林彥全</span>
					</div>
					<div class="right">
						<span class="inner character-title">首席投資顧問<br>總經理</span>
					</div>
				</figcaption>
			</figure>
		</a></li>
		<li class="character-item"><a href="character.php?character=4">
			<figure>
				<div class="character-pic pic index-character4">
					<img src="upload/character/character4.png" alt="" class="">
				</div>
				<figcaption>
					<div class="left">
						<span class="inner character-name">方琮櫻</span>
					</div>
					<div class="right">
						<span class="inner character-title">副總經理</span>
					</div>
				</figcaption>
			</figure>
		</a></li>
	</ul>
</div> -->
		<p class="txt-1">繼2014年多空成長成功募集後，2015年康和期經再度網羅業內菁英，完整不同投資人投資標的。
		<!-- <a href="about.php#teamProfile" class="txt-r1 link-1">認識我們的團隊</a> -->
		</p>
		<!-- <img src="<?php //path_au('img'); ?>index-row3.jpg" alt=""> -->
	</section><!--  / section.row3  堅強團隊  END  !!  -->
	<!-- section.row4  市場消息  START  -->
	<section class="fullbg row4">
		<div class="wrapper">
			<hgroup class="txtImg_title-title-news <?php isPhone('mobile_title-group'); ?>">
				<h1 class="hidden <?php isPhone('mobile_title'); ?> title-1" data-lang="en">News & Updates</h1>
				<h2 class="hidden <?php isPhone('mobile_title'); ?> title-2" data-lang="tw">市場消息</h2>
			</hgroup>
			<div class="metro-wrap">
				<?php
					$news = new JTNews();
					$rsTextNews = $news->latest(3, '圖文');
					$rsVideoNews = $news->latest(1, '影音');

					function textNewsStyle1($d=null)	{
						if( $d!=null )	{
							?>
								<a href="news_cnt.php?id=<?=$d->id?>"></a>
								<div class="news-pic pic left">
									<img src="<?=$d->icon?>" />
								</div>
								<div class="metro-art right">
									<hgroup>
										<h1 class="news-title"><?=$d->title?></h1>
										<p class="news-time"><?=JDate::date_format($d->date,'m月d日 Y')?></p>
									</hgroup>
									<p class="news-shrink_text">
										<?=JWStdio::strip_truncate($d->content, 154)?>
									</p>
								</div>
							<?php
						}	else	{
							?>
								<a href="Javascript:void(0);"></a>
								<div class="news-pic pic left">
									<img src="dist/images/news-cover.jpg" />
								</div>
								<div class="metro-art right">
									<hgroup>
										<h1 class="news-title"></h1>
										<p class="news-time"></p>
									</hgroup>
									<p class="news-shrink_text">
									</p>
								</div>
							<?php
						}
					}
				?>
				<div class="metro-container">
					<div class="metro-block-style1 cf ib">
						<?php	textNewsStyle1( isset($rsTextNews[0]) ? $rsTextNews[0] : null );	?>
					</div><!-- /.metro-block-style1  END  !! -->
					<div class="metro-block-video ib">
						<?php	if( isset($rsVideoNews[0]) )	{	?>
							<a href="news_cnt.php?id=<?=$rsVideoNews[0]->id?>"></a>
							<div class="news-pic news-video pic">
								<img src="<?=$rsVideoNews[0]->icon?>" />
							</div>
						<?php	}	else	{	?>
							<a href="Javascript:void(0);"></a>
							<div class="news-pic news-video pic">
								<img src="dist/images/temp/tem4.jpg" alt="">
							</div>
						<?php	}	?>
					</div><!-- /.metro-block-video  END  !! -->
					<div class="metro-block-single ib">
						<?php	if( isset($rsTextNews[1]) )	{	?>
							<a href="news_cnt.php?id=<?=$rsTextNews[1]->id?>"></a>
							<div class="metro-art">
								<hgroup>
									<h1 class="news-title"><?=$rsTextNews[1]->title?></h1>
									<p class="news-time"><?=JDate::date_format($rsTextNews[1]->date,'m月d日 Y')?></p>
								</hgroup>
								<p class="news-shrink_text">
									<?=JWStdio::strip_truncate($rsTextNews[1]->content, 154)?>
								</p>
							</div>
						<?php	}	else	{	?>
							<a href="Javascript:void(0);"></a>
							<div class="metro-art">
								<hgroup>
									<h1 class="news-title"></h1>
									<p class="news-time"></p>
								</hgroup>
								<p class="news-shrink_text">
								</p>
							</div>
						<?php	}	?>
					</div><!-- /.metro-block-single  END  !! -->
					<div class="metro-block-style1 cf ib">
						<?php	textNewsStyle1( isset($rsTextNews[2]) ? $rsTextNews[2] : null );	?>
					</div><!-- /.metro-block-style1  END  !! -->
				</div>
			</div>
		</div>
	</section><!-- / section.row4  END  !!-->
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
$(window).load(function() {
	$("#bannerSlider").flexslider({
		animation      : "fade",
		controlNav     : true,
		directionNav   : false,
		slideshowSpeed : 5000
	})
});
$(function() {
	var $charMarquee = $("#charMarquee");
	var charMarqueeH = $charMarquee.outerHeight();
	var charLength = $("#charMarquee li").length;
	console.log(charLength);
	$("#marquee_prev_btn").css({
		top: (charMarqueeH-100)/2
	});
	$("#marquee_next_btn").css({
		top: (charMarqueeH-100)/2
	});
	if (charLength<=5) {
		$(".character-caroul-ctrl").hide();
		$("ul.character-caroul-list").css({
			width: 'auto',
			display: 'table',
			margin: 'auto'
		});
	};

 //     var dis = $('.character-item').outerHeight();
 //     $("#charMarquee").scrollbox({
 //               // distance: dis,
 //               speed: 60,
 //               direction: 'h'
 //          })
 //     $('#marquee_prev_btn').click(function () {
 //          $('#charMarquee').trigger('backward');
 //     });
 //     $('#marquee_next_btn').click(function () {
 //          $('#charMarquee').trigger('forward');
 //     });

     // $("#netAssetValuePanel").hide();
    $("#netAssetValueBtn").click(function() {
    	isOpen($("#netAssetValueBar"), $("#netAssetValueBar.open"));
    	$("#netAssetValuePanel").slideToggle(400);
    });
    // $("#netAssetValueBar")
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
