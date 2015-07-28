<?php
	include_once 'config.php';
	include_once INC_PATH.'headleader.php';
	require_once INC_PATH.'aunav.php';

	$shownum = 6;

	$p = isset($_GET["p"]) ? $p = $_GET["p"] : $p = 1;

	$db = new JPDO();

	$data = array();
	$where_search = empty($_GET['search']) ? "1" : "`report`.`title` LIKE :search OR `report`.`stitle` LIKE :search OR `report_group`.`name` LIKE :search";
	if( !empty($_GET['search']) )	$data[':search']=$_GET['search'];
	$where_group_id = empty($_GET['group_id']) ? "1" : "`report`.`group_id`=:group_id";
	if( !empty($_GET['group_id']) )	$data[':group_id']=$_GET['group_id'];
	$sql = "SELECT `report`.* ,
				`report_group`.`name` AS `group_name`
			FROM `report`
				INNER JOIN `report_group` ON `report`.`group_id`=`report_group`.`id`
			WHERE `report`.`enable`='Y'
				AND ({$where_search})
				AND ({$where_group_id})
		";
	$rowPerPage = $shownum;
	$pageNo = $p-1;
	$arrOrderBy = isset($_GET['_orderBy']) ? $_GET['_orderBy'] : array('`report_group`.`ord` ASC', '`report`.`id` DESC');
	$pager = $db->queryFetchPage( $sql, $pageNo, $shownum, $arrOrderBy, $data );

	$start = ($p-1)*$shownum;

	// 總頁數
	$maxPage = $pager->pageNum;

	if ($p>$maxPage || $p<1 || !is_int($p*1) || !isset($_GET["p"])) {
		$p = 1;
		header("Location: monthlyreport.php?p={$p}");
	}

?>
<title>投資月報 | <?php echo $webTitle; ?></title>

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
			<header class="txtImg_title-title-monthlyreport cnt_title <?php isPhone('mobile_title-group'); ?>">
				<h1 class="hidden <?php isPhone('mobile_title'); ?> title-1" data-lang="en">Monthly Report</h1>
				<h2 class="hidden <?php isPhone('mobile_title'); ?> title-2" data-lang="tw">投資月報</h2>
			</header>
		</div>
	</section>
	<section class="fullbg row2 monthlyreport-wrap serviceCnt-wrap">
		<div class="bg"></div>
		<div class="wrapper">
			<div class="monthlyreport-container serviceCnt-container">
				<?php
					$group = new JTReportGroup();
					$rsGroup = $group->all();
				?>
				<div class="row1 cf">
					<form method="get" action="monthlyreport.php" class="cf">
						<input type="hidden" name="p" value="1" />
						<div class="col-2">
							<span class="txt-1">分類</span>
							<select name="group_id" id="" class="monthlyreport-select">
								<option value="">所有</option>
								<?php
									foreach( $rsGroup as $d ) {
										?>
											<option value="<?=$d->id?>" <?=(isset($_GET['group_id'])&&$_GET['group_id']==$d->id)?' selected':''?>><?=$d->name?></option>
										<?php
									}
								?>
							</select>
						</div>
						<div class="col-2">
							<span class="txt-1">搜尋</span>
							<div>
								<input type="text" name="search" value="<?=isset($_GET['search']) ? $_GET['search'] : '' ?>" class="art_search-input frm__field left" placeholder="輸入關鍵字...">
								<input type="submit" name="" id="" class="art_search-btn frm__btn left" value="search" onclick="">
							</div>
						</div>
					</form>
				</div>
				<ul class="art_search-list monthlyreport-list">
					<?php
						function month_name( $month )	{
							$monthName = date("F", mktime(0, 0, 0, $month, 10));
							return strtoupper( $monthName );
						}
						foreach( $pager->rsData as $d) {
							?>
								<li class="art_search-item monthlyreport-item cf">
									<div class="news-pic pic left">
										<img src="<?=$d->icon?>" />
									</div>
									<div class="news-intro left">
										<hgroup class="cnt_title">
											<h1 class="txt-1_1"><?=$d->title?></h1>
											<p class="txt-1_4"><?=$d->stitle?></p>
										</hgroup>
										<div class="monthlyreport-time">
											<span class="txt-4 txt-ff1"><span class="txt-5"><?=$d->month?></span>月</span>
											<span class="txt-1"><?=str_replace( '年', ' / ', $d->group_name )?> / <?=month_name($d->month)?></span>
										</div>
										<div class="news-link">
											<a href="<?=$d->link?>" class="txt-r1"><?=$d->link?></a>
										</div>
									</div>
								</li>
							<?php
						}
						
						
					?>
				</ul>


			</div>

		</div>
<div class="pages_btn">
	<ul>
	<?php 
		$add_url = '';
		if( !empty($_GET['search']) )	$add_url.= '&search='.urlencode($_GET['search']);
		if( !empty($_GET['group_id']) )	$add_url.= '&group_id='.urlencode($_GET['group_id']);

		if ($p>1) {
			$prevPage = $p-1;
			echo "<li class=\"prev\"><a href=\"monthlyreport.php?p={$prevPage}{$add_url}\"><i class=\"icon ib\"></i><span class=\"txt ib\">上一頁</span></a></li><!-- 在第一頁時不顯示 -->";
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
			echo "<li class=\"number\"><a href=\"monthlyreport.php?p={$i}{$add_url}\">{$i}</a></li>";
		}
	}


		if ($p<$maxPage) {
			$nextPage = $p+1;
			echo "<li class=\"next\"><a href=\"monthlyreport.php?p={$nextPage}{$add_url}\"><span class=\"txt ib\">下一頁</span><i class=\"icon ib\"></i></a></li>";
		}
	 ?>
	</ul>
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

<?php
// -------------------------------
// google analytics
// -------------------------------
  include_once INC_PATH.'ga.php';
 ?>

</body>
</html>
