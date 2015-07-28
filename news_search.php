<?php
	include_once 'config.php';
	include_once INC_PATH.'headleader.php';
	require_once INC_PATH.'aunav.php';

	$shownum = 6;

	$p = isset($_GET["p"]) ? $p = $_GET["p"] : $p = 1;

	$db = new JPDO();

	$sql = "SELECT *
			FROM `news`
			WHERE `enable`='Y'
				AND `type`='圖文'
				AND
				( `title` LIKE :search
					OR `content` LIKE :search
				)
		";
	$rowPerPage = $shownum;
	$pageNo = $p-1;
	$arrOrderBy = isset($_GET['_orderBy']) ? $_GET['_orderBy'] : array('`news`.`date` DESC', '`news`.`id` DESC');
	$pager = $db->queryFetchPage( $sql, $pageNo, 6, $arrOrderBy, array(':search'=>"%{$_GET['search']}%") );
	$start = ($p-1)*$shownum;

	// 總頁數
	$maxPage = $pager->pageNum;


?>
<title>文章搜尋 | <?php echo $webTitle; ?></title>

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

<body class="news_page">

<?php
//app
  include_once INC_PATH.'header.php';
 ?>

 <div id="bannerTrigger"></div>
<section id="pageBanner" class="banner" style="background-image: url('<?php path_au('img'); ?>banner-news.jpg')">
	
</section>

<main class="">
	<section class="row1">
		<div class="wrapper small">
			<header class="txtImg_title-title-search cnt_title">
				<h1 class="hidden" data-lang="en">Search</h1>
				<h2 class="hidden" data-lang="tw">文章搜尋</h2>
			</header>
		</div>
	</section>
	<section class="fullbg row2 art_search-wrap">
		<div class="bg"></div>
		<div class="wrapper">
			<div class="art_search-container">
				<span class="txt-1">文章搜尋</span>
				<form action="news_search.php" method="get" class="art_search-form cf">
					<input type="text" name="search" value="<?=htmlspecialchars($_GET['search'])?>" class="art_search-input frm__field left" placeholder="輸入關鍵字...">
					<input type="submit" class="art_search-btn frm__btn left" value="search" onclick="location.href='news_search.php'">
				</form>
				<p class="text-center">約有 <?=$pager->rowNum?> 項結果</p>
				<ul class="art_search-list">
					<?php
						foreach( $pager->rsData as $d) {
							?>
								<li class="art_search-item cf">
									<div class="news-pic pic left">
										<img src="upload/news/news_051701.jpg" alt="">
									</div>
									<div class="news-intro left">
										<hgroup class="cnt_title">
											<h1 class="news-title"><?=$d->title?>?</h1>
											<p class="news-time"><?=JDate::date_format($d->date,'m月d日 Y')?></p>
										</hgroup>
										<p class="news-shrink_text">
											<?=JWStdio::strip_truncate($d->content, 154)?>
										</p>
										<div class="news-link">
											<a href="news_cnt.php?id=<?=$d->id?>" class="btn btn-black btn-more">繼續閱讀</a>
										</div>
									</div>
								</li>
							<?php
						}
						
						
					?>
					
				</ul>

<div class="pages_btn">
	<ul>
	<?php 
		if ($p>1) {
			$prevPage = $p-1;
			echo "<li class=\"prev\"><a href=\"news_search.php?p={$prevPage}&search=".urlencode($_GET['search'])."\"><i class=\"icon ib\"></i><span class=\"txt ib\">上一頁</span></a></li><!-- 在第一頁時不顯示 -->";
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
			echo "<li class=\"number\"><a href=\"news_search.php?p={$i}&search=".urlencode($_GET['search'])."\">{$i}</a></li>";
		}
	}


		if ($p<$maxPage) {
			$nextPage = $p+1;
			echo "<li class=\"next\"><a href=\"news_search.php?p={$nextPage}&search=".urlencode($_GET['search'])."\"><span class=\"txt ib\">下一頁</span><i class=\"icon ib\"></i></a></li>";
		}
	 ?>
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

<?php
// -------------------------------
// google analytics
// -------------------------------
  include_once INC_PATH.'ga.php';
 ?>

</body>
</html>
