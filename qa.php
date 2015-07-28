<?php
	include_once 'config.php';
	include_once INC_PATH.'headleader.php';
	require_once INC_PATH.'aunav.php';
?>
<title>常見問題 | <?php echo $webTitle; ?></title>

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
				<img src="<?php path_au('img'); ?>title-qa.png" alt="" class="temporary">
			</h2>
		</div>
	</section>
	<section class="fullbg row2 serviceCnt-wrap faq-wrap">
		<div class="bg"></div>
		<div class="wrapper">
			<div id="infTab" class="faq-container serviceCnt-container tab_block cf">
				<?php
					$fg = new JTFAQGroup();
					$rsGroup = $fg->all();
				?>
				<div class="row1 cf">
					<div id="tabsMarquee" class="faq-tabs-wrap left">
						<ul class="tabs faq-tabs cf">
							<?php
								foreach( $rsGroup as $i=>$d) {
									?>
									    <li> <a href="#tab<?=$i?>" class="txt-2"><?=$d->name?></a></li>
									<?php
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
				<div class="row2 tab_container">
					<?php
						$faq = new JTFAQ();
						foreach( $rsGroup as $i=>$dg) {
							$rs = $faq->all($dg->id);
							?>
								<div id="tab<?=$i?>" class="tab_content">
								   <section class="mod mod-tab_cnt">
										<ul class="faq-list cf">
											<?php
												foreach( $rs as $i=>$d) {
													?>
														<li class="faq-item">
															<h3 class="faq-item-q">
																<span class="col">Q <?=sprintf("%02d",$i+1)?>：</span>
																<span class="col"><?=$d->title?></span>
																<i class="fa fa-caret-down"></i>
															</h3>
															<div class="faq-item-a">
																<?=$d->content?>
															</div>
														</li>
													
													<?php
												}
											?>
										</ul>
								   </section>
								</div><!--  /#tab1 .tab_content  END  !!  -->
							<?php
						}
					?>
				</div>

			</div>
<!-- 			<div class="" style="margin: 1em auto 5em;">
				<img src="<?php //path_au('img'); ?>pageNum.png" alt="" class="temporary">
			</div> -->
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

function AnimateRotate(el, speed, d){
    var elem = el, dur = speed;

    $({deg: 0}).animate({deg: d}, {
        duration: dur,
        step: function(now){
            elem.css({
                 transform: "rotate(" + now + "deg)"
            });
        }
    });
}

	var tabs = $("ul.tabs");
	var tabsH = $("ul.tabs").height();
	// var tabsH2 = tabsH*-1;
	tabs.css('top', '0');
	var tabsPrev = $(".btn-faq-tabs-prev");
	var tabsNext = $(".btn-faq-tabs-next");
	var pos = 40;

	tabsPrev.click(function(event) {
		if (tabs.css('top') == tabsH/2*-1+"px") {
			console.log('yoyo');
			// return false;
		}else {
			tabs.css({
				top: "-=40"
			});
		};
	});
	tabsNext.click(function(event) {
		if (tabs.css('top') == 0+"px") {
			console.log('yoyo');
			// return false;
		}else {
			tabs.css({
				top: "+=40"
			});
		};
	});

	$(".faq-item-a").hide();

	$(".faq-item-q").click(function() {


		$('.faq-item-a').slideUp('600');

		if (!$(this).parent(".faq-item").hasClass('open')) {
			$(".faq-item").removeClass('open');
			$(this).parent(".faq-item").addClass('open');
			$(this).next('.faq-item-a').slideDown('600');
		}else {
			$(".faq-item").removeClass('open');
			
		};

		if ($(this).parent(".faq-item").hasClass('open')) {
			AnimateRotate($(this).children("i.fa"), 300, 180);
		}else {
			AnimateRotate($(this).children("i.fa"), 300, 0);
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
