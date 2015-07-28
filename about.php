<?php
	include_once 'config.php';
	include_once INC_PATH.'headleader.php';
	require_once INC_PATH.'aunav.php';
	include_once 'dist/character_data.php';
?>
<title>康和期經介紹 | <?php echo $webTitle; ?></title>

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

<body class="about_page">

<?php
//app
  include_once INC_PATH.'header.php';
 ?>
<div id="bannerTrigger"></div>
<section id="pageBanner" class="banner" style="background-image: url('<?php path_au('img'); ?>banner-aboutCPCS.jpg')">
	
</section>

<main class="">
	<?php
		$wc = new JTWebContent();
	?>
	<section class="row1">
		<div class="wrapper small">
			<hgroup class="txtImg_title-title-solution <?php isPhone('mobile_title-group'); ?>">
				<h1 class="hidden <?php isPhone('mobile_title'); ?> title-1" data-lang="en">Customized Solutions</h1>
				<h2 class="hidden <?php isPhone('mobile_title'); ?> title-2" data-lang="tw">選擇康和期經</h2>
			</hgroup>
			<div class="cnt">
				<p class="txt-1_3">
					<?php
						$wc->select('about.choose');
						echo ($wc->data['content']);
					?>
				</p>
			</div>
		</div>
	</section>
	<section id="futuresBar" class="row2 fullbg futures_bar futuresSec1-active">
		<div class="futures_bar-wrap">
			<div class="futures_bar-banner">
				<div class="futures_bar-bg"></div>
				<div class="futures_bar-list wrapper small">
					<ul class="cf">
						<li id="futuresSec1" class="futures_bar-item active">
							<a href="<?php webPageUrlAu('futures_managed'); ?>"></a>
							<div class="txtImg_futures-futures-1 hide_txt txt">期貨經理事業</div>
						</li>
						<li id="futuresSec2" class="futures_bar-item">
							<a href="<?php webPageUrlAu('futures_fund'); ?>"></a>
							<div class="txtImg_futures-futures-2 hide_txt txt">期貨信託事業</div>
						</li>
						<li id="futuresSec3" class="futures_bar-item">
							<a href="<?php webPageUrlAu('futures_advisory'); ?>"></a>
							<div class="txtImg_futures-futures-3 hide_txt txt">期貨顧問事業</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="futures_bar-container">
				<div class="wrapper small">
					<ul class="futures_intro-list cf">
						<li id="futuresSec1Intro" class="futures_intro-item">
							<p class="txt-2">
								<?php
									$wc->select('about.managed');
									echo ($wc->data['content']);
								?>
							</p>
							<div class="change_bar">
								<a href="javascript:void 0;" class="btn btn-goPrev ib"></a>
								<a href="<?php webPageUrlAu('futures_managed'); ?>" class="btn btn-futuresSec1-active txt-2 ib">期貨經理事業</a>
								<a href="javascript:void 0;" class="btn btn-goNext ib"></a>
							</div>
						</li>
						<li id="futuresSec2Intro" class="futures_intro-item">
							<p class="txt-2">
								<?php
									$wc->select('about.fund');
									echo ($wc->data['content']);
								?>
							</p>
							<div class="change_bar">
								<a href="javascript:void 0;" class="btn btn-goPrev ib"></a>
								<a href="<?php webPageUrlAu('futures_fund'); ?>" class="btn btn-futuresSec1-active txt-2 ib">期貨信託事業</a>
								<a href="javascript:void 0;" class="btn btn-goNext ib"></a>
							</div>
						</li>
						<li id="futuresSec3Intro" class="futures_intro-item">
							<p class="txt-2">
								<?php
									$wc->select('about.advisory');
									echo ($wc->data['content']);
								?>
							</p>
							<div class="change_bar">
								<a href="javascript:void 0;" class="btn btn-goPrev ib"></a>
								<a href="<?php webPageUrlAu('futures_advisory'); ?>" class="btn btn-futuresSec1-active txt-2 ib">期貨顧問事業</a>
								<a href="javascript:void 0;" class="btn btn-goNext ib"></a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section id="capitalPreservation" class="row3">
		<div class="wrapper small">
			<hgroup class="txtImg_title-title-cp <?php isPhone('mobile_title-group'); ?>">
				<h1 class="hidden <?php isPhone('mobile_title'); ?> title-1" data-lang="en">Customize Solution</h1>
				<h2 class="hidden <?php isPhone('mobile_title'); ?> title-2" data-lang="tw">選擇康和期經</h2>
			</hgroup>
			<img src="<?php path_au('img'); ?>about-row3.jpg" alt="">
			<div class="cnt">
				<p class="txt-1_3">
					<?php
						$wc->select('about.preservation');
						echo ($wc->data['content']);
					?>
				</p>
			</div>
			<div class="" style="margin-top: 2em;"><a href="aboutCPCS.php" class="txt_img-getmore btn-getmore hide_txt link-2">進一步了解</a></div>
		</div>
	</section>

	<!-- 20150717  移除 -->
<!-- 	<section id="teamProfile" class="fullbg row4">
		<div class="bg"></div>
		<div class="wrapper">
			<hgroup class="txtImg_title-title-team2 <?php //isPhone('mobile_title-group'); ?>">
				<h1 class="hidden <?php //isPhone('mobile_title'); ?> title-1" data-lang="en">Team Profile</h1>
				<h2 class="hidden <?php //isPhone('mobile_title'); ?> title-2" data-lang="tw">堅強團隊</h2>
			</hgroup>
			<div class="wrapper small">
				<p class="txt-1_3">康和期經2015年導入金融機構自營交易系統,多空操作活化資產配置管理期貨操作比重提升資產投資效率l策略交易式選股操作,規避系統性風險導入多重經理人交易策略量化配置系統平滑損益曲線有效控制年化報酬區間，降低整體波動影響</p>
			</div>
			<div class="cnt">
				<ul class="character-list cf"> -->
<!-- 					<li class="character-item"><a href="character.php?character=1">
						<figure>
							<div class="character-pic pic about-character1">
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
					</a></li> -->

<?php //foreach ($aboutCharacter as $key => $value) { ?>

<!-- 					<li class="character-item"><a href="character.php?character=<?php //echo $aboutCharacter[$key]['index'];?>">
						<figure>
							<div class="character-pic pic about-character<?php //echo $aboutCharacter[$key]['index'];?>">
								<img src="upload/character/character<?php //echo $aboutCharacter[$key]['index'];?>.png" alt="" class="">
							</div>
							<figcaption>
								<div class="left">
									<span class="inner character-name"><?php //echo $aboutCharacter[$key]['name'];?></span>
								</div>
								<div class="right">
									<span class="inner character-title"><?php //echo $aboutCharacter[$key]['title'];?></span>
								</div>
							</figcaption>
						</figure>
					</a></li> -->
<?php
//}
?>

				<!-- </ul> -->
				<!-- <a href="character.php"><img src="<?php //path_au('img'); ?>about-row4.png" alt=""></a> -->
			<!-- </div> -->
		<!-- </div> -->
	<!-- </section> -->
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
	function futuresSec1() {
		$("#futuresSec1 .txt").removeClass('txtImg_futures-futures-1active').addClass('txtImg_futures-futures-1');
	}
	function futuresSec2() {
		$("#futuresSec2 .txt").removeClass('txtImg_futures-futures-2active').addClass('txtImg_futures-futures-2');
	}
	function futuresSec3() {
		$("#futuresSec3 .txt").removeClass('txtImg_futures-futures-3active').addClass('txtImg_futures-futures-3');
	}
	function futuresSec1Click() {
		$("#futuresSec1Intro").css({display: 'block'});
		$("#futuresSec2Intro").css({display: 'none'});
		$("#futuresSec3Intro").css({display: 'none'});
	}
	function futuresSec2Click() {
		$("#futuresSec1Intro").css({display: 'none'});
		$("#futuresSec2Intro").css({display: 'block'});
		$("#futuresSec3Intro").css({display: 'none'});
	}
	function futuresSec3Click() {
		$("#futuresSec1Intro").css({display: 'none'});
		$("#futuresSec2Intro").css({display: 'none'});
		$("#futuresSec3Intro").css({display: 'block'});
	}
	function futuresSec1Hover() {
		$("#futuresSec1 .txt").removeClass('txtImg_futures-futures-1').addClass('txtImg_futures-futures-1active');
	}
	function futuresSec2Hover() {
		$("#futuresSec2 .txt").removeClass('txtImg_futures-futures-2').addClass('txtImg_futures-futures-2active');
	}
	function futuresSec3Hover() {
		$("#futuresSec3 .txt").removeClass('txtImg_futures-futures-3').addClass('txtImg_futures-futures-3active');
	}

	function futuresSec1Active() {
		futuresSec1Hover();
		futuresSec2();
		futuresSec3();
		futuresSec1Click();
		isActive($("#futuresSec1"), $("#futuresSec1.active"));
		// if ($("#futuresSec1").hasClass("active")) {
		// 	$("#futuresSec1").append("<a href=\"<?php webPageUrlAu('futures_managed'); ?>\"></a>");
		// };
	}
	function futuresSec2Active() {
		futuresSec2Hover();
		futuresSec1();
		futuresSec3();
		futuresSec2Click();
		isActive($("#futuresSec2"), $("#futuresSec2.active"));
	}
	function futuresSec3Active() {
		futuresSec3Hover();
		futuresSec1();
		futuresSec2();
		futuresSec3Click();
		isActive($("#futuresSec3"), $("#futuresSec3.active"));
	}

(function() {
	$("#futuresSec1").hover(function() {
		futuresSec1Hover();
	}, function() {
		if ($(this).hasClass('active')) {
			futuresSec1Hover();
		} else{
			futuresSec1();
		};
		
	});
	$("#futuresSec2").hover(function() {
		futuresSec2Hover();
	}, function() {
		if ($(this).hasClass('active')) {
			futuresSec2Hover();
		} else{
			futuresSec2();
		};
	});
	$("#futuresSec3").hover(function() {
		futuresSec3Hover();
	}, function() {
		if ($(this).hasClass('active')) {
			futuresSec3Hover();
		} else{
			futuresSec3();
		};
	});
})();

	$("#futuresSec1").click(function() {
		futuresSec1Active();
		if ($("#futuresBar").hasClass('futuresSec2-active')) {
			$("#futuresBar").removeClass('futuresSec2-active').addClass('futuresSec1-active');
		} else if($("#futuresBar").hasClass('futuresSec3-active')){
			$("#futuresBar").removeClass('futuresSec3-active').addClass('futuresSec1-active');
		} else {
			$("#futuresBar").addClass('futuresSec1-active');
		};
	});
	$("#futuresSec2").click(function() {
		futuresSec2Active();
		if ($("#futuresBar").hasClass('futuresSec1-active')) {
			$("#futuresBar").removeClass('futuresSec1-active').addClass('futuresSec2-active');
		} else if($("#futuresBar").hasClass('futuresSec3-active')){
			$("#futuresBar").removeClass('futuresSec3-active').addClass('futuresSec2-active');
		} else {
			$("#futuresBar").addClass('futuresSec2-active');
		};
	});
	$("#futuresSec3").click(function() {
		futuresSec3Active();
		if ($("#futuresBar").hasClass('futuresSec2-active')) {
			$("#futuresBar").removeClass('futuresSec2-active').addClass('futuresSec3-active');
		} else if($("#futuresBar").hasClass('futuresSec1-active')){
			$("#futuresBar").removeClass('futuresSec1-active').addClass('futuresSec3-active');
		} else {
			$("#futuresBar").addClass('futuresSec3-active');
		};
	});

	if ($("#futuresSec1").hasClass('active')) {
		futuresSec1Hover();
		futuresSec1Click();
	};
	if ($("#futuresSec2").hasClass('active')) {
		futuresSec2Hover();
		futuresSec2Click();
	};
	if ($("#futuresSec3").hasClass('active')) {
		futuresSec3Hover();
		futuresSec3Click();
	};

	$(".btn-goPrev").click(function() {
		if ($("#futuresBar").hasClass('futuresSec1-active')) {
			$("#futuresBar").removeClass('futuresSec1-active').addClass('futuresSec3-active');
			futuresSec3Active();
		} else if($("#futuresBar").hasClass('futuresSec2-active')){
			$("#futuresBar").removeClass('futuresSec2-active').addClass('futuresSec1-active');
			futuresSec1Active();
		} else if($("#futuresBar").hasClass('futuresSec3-active')){
			$("#futuresBar").removeClass('futuresSec3-active').addClass('futuresSec2-active');
			futuresSec2Active();
		};
	});

	$(".btn-goNext").click(function() {
		if ($("#futuresBar").hasClass('futuresSec1-active')) {
			$("#futuresBar").removeClass('futuresSec1-active').addClass('futuresSec2-active');
			futuresSec2Active();
		} else if($("#futuresBar").hasClass('futuresSec2-active')){
			$("#futuresBar").removeClass('futuresSec2-active').addClass('futuresSec3-active');
			futuresSec3Active();
		} else if($("#futuresBar").hasClass('futuresSec3-active')){
			$("#futuresBar").removeClass('futuresSec3-active').addClass('futuresSec1-active');
			futuresSec1Active();
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
