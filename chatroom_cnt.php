<?php
	include_once 'config.php';
	include_once INC_PATH.'headleader.php';
	require_once INC_PATH.'aunav.php';
//	include_once 'dist/chatroom_data.php';


	$get_id = isset($_GET['id']) ? $_GET['id'] : 1;

	$advisory = new JTAdvisory();
	$advisory->select($get_id);

	$chatroom_index = $advisory->data['id'];
	$chatroom_title = $advisory->data['title'];
	$chatroom_cnt = $advisory->data['content'];
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

<body class="chatroom_page prodCnt">

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
			<header class="txtImg_title-title-chatroom chatroom <?php isPhone('mobile_title-group'); ?>">
				<h1 class="hidden <?php isPhone('mobile_title'); ?> title-1" data-lang="en">Advisory Chat Room</h1>
				<h2 class="hidden <?php isPhone('mobile_title'); ?> title-2" data-lang="tw">康和期顧相談室</h2>
			</header>
			<p class="txt-1 text-center"><?php echo $chatroom_title; ?></p>
		</div>
	</section>
	<section class="fullbg row2">
		<div class="bg"></div>
		<div class="wrapper">
			<div class="cnt cf">
				<div class="editorDF">
				<!-- 圖文編輯器範圍 -->
				<?php echo $chatroom_cnt; ?>
<!-- 					<a href="http://edn.udn.com/ACT/2015/Futures_Highlights/">http://edn.udn.com/ACT/2015/Futures_Highlights/</a><br><br>
					<img src="upload/chat_room/2015-06-08_143353.jpg" alt="" class="temporary"> -->
				</div>
			</div>
			<div class="" style="margin: 1em auto 5em;">
				<a href="javascript:history.go(-1);" class="txt_img-goback btn-getmore hide_txt link-2">回上一頁</a>
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
