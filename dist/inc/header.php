<?php
// fb-root
  // include_once INC_PATH.'fbscript.php';
 ?>

<div id="top"></div>
<header id="<?php notPhone('globalHeader'); ?>" class="global_hd <?php isPhone('mobile_header'); ?>">
	<!-- <div class="wrapper"> -->
		<header id="logo" class="ib"><a href="<?php webPageUrlAu('index'); ?>" title="康和期貨網站首頁"><img src="<?php path_au('img'); ?>LOGO.png" alt=""></a></header>
		<nav class="main_nav ib ">
			<ul class="cf">
			<?php headerNavAu(); ?>
				<li class="quick_bar">
					<div class="login">
						<a href="https://fm.concordfutures.com.tw/fundM/Login.aspx" class="hide_txt" target="_blank">會員登入</a>
					</div>
				</li>
			</ul>
		</nav>
		<div id="menu">
			<div class="si-icons si-icons-default">
				<span class="si-icon si-icon-hamburger-cross" data-icon-name="hamburgerCross"></span>
			</div>
		</div>

	<!-- </div> -->
</header>