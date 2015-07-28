<?php
	include_once 'config.php';
	include_once INC_PATH.'headleader.php';
	require_once INC_PATH.'aunav.php';
	include_once 'dist/news_data.php';

	$shownum = 6;

	$p = isset($_GET["p"]) ? $p = $_GET["p"] : $p = 1;

	$db = new JPDO();

	$sql = "SELECT *
			FROM `news`
			WHERE `enable`='Y'
				AND `type`=:type
		";
	$rowPerPage = $shownum;
	$pageNo = $p-1;
	$arrOrderBy = isset($_GET['_orderBy']) ? $_GET['_orderBy'] : array('`news`.`date` DESC', '`news`.`id` DESC');
	$pagerText = $db->queryFetchPage( $sql, $pageNo, 6, $arrOrderBy, array(':type'=>'圖文') );
	$pagerVideo = $db->queryFetchPage( $sql, $pageNo, 2, $arrOrderBy, array(':type'=>'影音') );

	$start = ($p-1)*$shownum;

	// 總頁數
	$maxPage = ($pagerText->pageNum>=$pagerVideo->pageNum) ? $pagerText->pageNum : $pagerVideo->pageNum;;

	if ($p>$maxPage || $p<1 || !is_int($p*1) || !isset($_GET["p"])) {
		$p = 1;
		header("Location: news.php?p={$p}");
	}

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

<body class="news_page list_page">

<?php
//app
  include_once INC_PATH.'header.php';
 ?>

 <div id="bannerTrigger"></div>
<section id="pageBanner" class="banner" style="background-image: url('<?php path_au('img'); ?>banner-news.jpg')">
	
</section>

<main class="">
<?php 
// echo '$start:'.$start."<br>";
// echo '$total:'.$total."<br>";
// echo '$maxPage:'.$maxPage."<br>";
?>
	<section class="row1">
		<div class="wrapper">
			<?php
				$last = new JTNews();
				$last->last('圖文');
			?>
			<h2 class="page_title txtImg_title-title-lu hide_txt <?php isPhone('mobile_title'); ?> title-1">Lastest Update</h2>
			<div class="metro-block-style1 cf ib">
				<div class="news-pic pic left">
				<?php 
					if ($last->data['icon']=='') {
						echo "<img src=\"dist/images/news-cover.jpg\" alt=\"\">";
					}else{
						echo "<img src=\"{$last->data['icon']}\" alt=\"\">";
					}
				?>
				</div>
<!-- 			HTML
				<div class="news-pic pic left">
					<img src="upload/news/news_051701.jpg" alt="">
				</div> -->
				<div class="metro-art right">
					<hgroup>
						<h1 class="news-title"><?=$last->data['title']?></h1>
						<p class="news-time"><?=JDate::date_format($last->data['date'],'m月d日 Y')?></p>
					</hgroup>
					<p class="news-shrink_text">
						<?=JWStdio::strip_truncate($last->data['content'], 154)?>
					</p>
					<a href="news_cnt.php?id=<?=$last->data['id']?>" class="btn btn-black btn-more">繼續閱讀</a>
				</div>
<!-- 			HTML
				<div class="metro-art right">
					<hgroup>
						<h1 class="news-title">周線連3黑 520魔咒下周上演周線連3黑 520魔咒下周上演周線連3黑 520魔咒下周上演周線連3黑 520魔咒下周上演?</h1>
						<p class="news-time">03月24日 2015</p>
					</hgroup>
					<p class="news-shrink_text">
<?php
// //  此處示意 顯示內文前 77 個字，超果以...取代
// $cnt0 = "美國升息議題牽動全球資本市場，18日美國公開市場操作委員會（FOMC）會議在即影響，台股期現貨周一走弱，外資進出也偏空。法人認為，最近資金持續往利率寬鬆的美國升息議題牽動全球資本市場，18日美國公開市場操作委員會（FOMC）會議在即影響，台股期現貨周一走弱，外資進出也偏空。法人認為，最近資金持續往利率寬鬆的";
// $showCount = 77;
// $content0 = strip_tags($cnt0);
// $content = mb_substr($content0,0,$showCount,'UTF-8');
// if ( $content != $content0 ) { $content .= "&nbsp;...&nbsp;"; }
// echo $content;
?>
					</p>
					<a href="news_cnt.php" class="btn btn-black btn-more">繼續閱讀</a>
				</div>
 -->
 			</div><!-- /.metro-block-style1  END  !! -->
		</div>
	</section>
	<section class="fullbg row2">
		<div class="bg"></div>
		<div class="wrapper">
			<header class="txtImg_title-title-news <?php isPhone('mobile_title-group'); ?>">
				<h1 class="hidden <?php isPhone('mobile_title'); ?> title-1" data-lang="en">News & Updates</h1>
				<h2 class="hidden <?php isPhone('mobile_title'); ?> title-2" data-lang="tw">市場消息</h2>
			</header>
			<?php
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
								<p class="news-shrink_text"></p>
							</div>
						<?php
					}
				}
				function textNewsStyle2($d=null)	{
					if( $d!=null )	{
						?>
							<a href="news_cnt.php?id=<?=$d->id?>"></a>
							<div class="metro-art left">
								<hgroup>
									<h1 class="news-title"><?=$d->title?></h1>
									<p class="news-time"><?=JDate::date_format($d->date,'m月d日 Y')?></p>
								</hgroup>
								<p class="news-shrink_text">
									<?=JWStdio::strip_truncate($d->content, 154)?>
								</p>
							</div>
							<div class="news-pic pic right">
								<img src="<?=$d->icon?>" />
							</div>
						<?php
					}	else	{
						?>
							<a href="Javascript:void(0);"></a>
							<div class="metro-art left">
								<hgroup>
									<h1 class="news-title"></h1>
									<p class="news-time"></p>
								</hgroup>
								<p class="news-shrink_text"></p>
							</div>
							<div class="news-pic pic right">
								<img src="dist/images/news-cover.jpg" />
							</div>
						<?php
					}
				}
				function textNewsStyle3($d=null)	{
					if( $d!=null )	{
						?>
							<a href="news_cnt.php?id=<?=$d->id?>"></a>
							<div class="news-pic pic">
								<img src="<?=$d->icon?>" />
							</div>
							<div class="metro-art">
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
							<div class="news-pic pic">
								<img src="dist/images/news-cover.jpg" />
							</div>
							<div class="metro-art">
								<hgroup>
									<h1 class="news-title"></h1>
									<p class="news-time"></p>
								</hgroup>
								<p class="news-shrink_text"></p>
							</div>
						<?php
					}
				}
				function textNewsStyleS($d=null)	{
					if( $d!=null )	{
						?>
							<a href="news_cnt.php?id=<?=$d->id?>"></a>
							<div class="metro-art">
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
							<div class="metro-art">
								<hgroup>
									<h1 class="news-title"></h1>
									<p class="news-time"></p>
								</hgroup>
								<p class="news-shrink_text"></p>
							</div>
						<?php
					}
				}
				function videoNews($d=null)	{
					if( $d!=null )	{
						?>
							<a href="news_cnt.php?id=<?=$d->id?>"></a>
							<div class="news-pic news-video pic">
								<img src="<?=$d->icon?>" />
							</div>
						<?php
					}	else	{
						?>
							<a href="Javascript:void(0);"></a>
							<div class="news-pic news-video pic">
								<img src="dist/images/temp/tem4.jpg" />
							</div>
						<?php
					}
				}
			?>
			<div class="metro-wrap">
				<div class="metro-container cf">
					<div class="metro-block-style1 cf ib">
						<?php	textNewsStyle1( isset($pagerText->rsData[0]) ? $pagerText->rsData[0] : null );	?>
					</div><!-- /.metro-block-style1  END  !! -->
					<div class="metro-block-video ib">
						<?php	videoNews( isset($pagerVideo->rsData[0]) ? $pagerVideo->rsData[0] : null );	?>
					</div><!-- /.metro-block-video  END  !! -->
					<div class="metro-block-single ib">
						<?php	textNewsStyleS( isset($pagerText->rsData[1]) ? $pagerText->rsData[1] : null );	?>
					</div><!-- /.metro-block-single  END  !! -->
					<div class="metro-block-style1 cf ib">
						<?php	textNewsStyle1( isset($pagerText->rsData[2]) ? $pagerText->rsData[2] : null );	?>
					</div><!-- /.metro-block-style1  END  !! -->
					<div class="metro-row cf">
						<div class="metro-block-style3 col">
							<?php	textNewsStyle3( isset($pagerText->rsData[3]) ? $pagerText->rsData[3] : null );	?>
						</div><!-- /.metro-block-style3  END  !! -->
						<div class="metro-col col">
							<div class="metro-block-style2 cf">
								<?php	textNewsStyle2( isset($pagerText->rsData[4]) ? $pagerText->rsData[4] : null );	?>
							</div><!-- /.metro-block-style2  END  !! -->
							<div class="metro-block-video ib">
								<?php	videoNews( isset($pagerVideo->rsData[1]) ? $pagerVideo->rsData[1] : null );	?>
							</div><!-- /.metro-block-video  END  !! -->
							<div class="metro-block-single ib">
								<?php	textNewsStyleS( isset($pagerText->rsData[5]) ? $pagerText->rsData[5] : null );	?>
							</div><!-- /.metro-block-single  END  !! -->
						</div>
					</div><!-- /.metro-row  END  !! -->
				</div>
			</div><!-- /.metro-wrap  END  !! -->
<div class="pages_btn">
	<ul>
	<?php 
		if ($p>1) {
			$prevPage = $p-1;
			echo "<li class=\"prev\"><a href=\"news.php?p={$prevPage}\"><i class=\"icon ib\"></i><span class=\"txt ib\">上一頁</span></a></li><!-- 在第一頁時不顯示 -->";
		}

	// 頁碼
	$end = $p+2 <= $maxPage ? $p+2 : $maxPage;
	$start = $end-4 >= 1 ? $end-4 : 1;
	if ($end - $start < 4) {
		$end = $start+4 <= $maxPage ? $start+4 : $maxPage;
	}
	for ($i=$start; $i <= $end ; $i++) { 
		if ($i == $p) {
			echo "<li class=\"number active\"><a href=\"javascript:void 0;\">{$i}</a></li>";
		}else {
			echo "<li class=\"number\"><a href=\"news.php?p={$i}\">{$i}</a></li>";
		}
	}


		if ($p<$maxPage) {
			$nextPage = $p+1;
			echo "<li class=\"next\"><a href=\"news.php?p={$nextPage}\"><span class=\"txt ib\">下一頁</span><i class=\"icon ib\"></i></a></li>";
		}
	 ?>
	</ul>
</div>
		</div>
	</section>
	<section class="row3">
		<div class="wrapper">
			<header class="txtImg_title-title-cale <?php //isPhone('mobile_title-group'); ?>">
				<!-- <h1 class="hidden <?php //isPhone('mobile_title'); ?> title-1" data-lang="en">News & Updates</h1> -->
				<h2 class="mobile_title title-2" data-lang="tw">今日國際財經日曆</h2>
			</header>
<div class="iframe-rwd economic_Calendar">
<iframe src="http://ec.hk.forexprostools.com?columns=exc_flags,exc_currency,exc_importance,exc_actual,exc_forecast,exc_previous&features=datepicker,timezone&countries=37,56,6,110,11,48,14,46,32,17,10,36,43,35,72,22,41,25,12,5,4,45,26,178,39,42&calType=week&timeZone=86&lang=55" width="636" height="467" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0"></iframe><div class="poweredBy" style="font-family: Arial, Helvetica, sans-serif;"><span style="font-size:11px;color:#333333;text-decoration: none;">即時經濟日誌係由<a href="http://hk.investing.com/" rel="nofollow" target="_blank" style="font-size:11px;color:#06529D; font-weight: bold;" class="underline_link">Investing.com 香港</a></span>提供。</div>
</div>
<p>免責聲明:康和快訊所提供新聞及今日國際財經日曆內容僅提供一般交易資訊，不能依此作為交易依據。康和期經提供最準確的內容服務投資人，但由於大量的資料和消息來源皆出自於官方，康和期經不會為這些資料的準確性承擔任何責任。即時經濟日曆也有可能在未事先通知的情況下作出修改.還請投資人注意風險.
</p>
			<footer class="share_bar cf">
				<div class="social_share left">
					<span class="txt-1">文章分享</span>
					<ul class="cf">
						<li><a href="javascript:void 0;" class="icon icon-rss"></a></li>
						<li><a href="javascript:void 0;" class="icon icon-fasebook"></a></li>
						<li><a href="javascript:void 0;" class="icon icon-googleplus"></a></li>
						<li><a href="javascript:void 0;" class="icon icon-twitter"></a></li>
						<li><a href="javascript:void 0;" class="icon icon-in"></a></li>
					</ul>
				</div>
				<div class="art_search right">
					<span class="txt-1">文章搜尋</span>
					<form action="news_search.php" method="get" class="art_search-form cf">
						<input type="text" name="search" class="art_search-input frm__field left" placeholder="輸入關鍵字...">
						<input type="submit" class="art_search-btn frm__btn left" value="search">
					</form>
				</div>
			</footer>
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
