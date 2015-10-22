<?php
	include_once 'config.php';
	include_once INC_PATH.'headleader.php';
	require_once INC_PATH.'aunav.php';
?>
<title>投資報酬率計算機 | <?php echo $webTitle; ?></title>

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
<body class="about_page aboutCPCS">

<?php
//app
  // include_once INC_PATH.'header.php';
 ?>
<!-- <div id="bannerTrigger"></div>
<section id="pageBanner" class="banner" style="background-image: url('<?php //path_au('img'); ?>banner-aboutCPCS.jpg')">
	
</section> -->

<main class="">
<!-- 	<section class="row1">
		<div class="wrapper small">
			<hgroup>
				<h2 class="pdt-subtitle txt-4 text-center">複利計算機</h2>
			</hgroup>
		</div>
	</section> -->
	<section class="">
		<div class="wrapper">
<div id="calculatestuff">
  <iframe src="http://widgets.calculatestuff.com/?token=f5ba8ec41415" frameborder="0" width="100%" height="500" scrolling="no" style="border:none;" id="f5ba8ec41415"></iframe>
  <script type="text/javascript">
    (function() {
      var s = document.createElement("script");
      s.type = "text/javascript";
      s.async = true;
      s.src="http://cdn.calculatestuff.com/resizer.js";
      (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(s);
    })();
   </script>
</div>
		</div>
	</section>

<!-- 	<section id="" class="fullbg row4">
		<div class="bg"></div>
		<div class="wrapper">
			<a href="javascript:history.go(-1);" class="btn btn-goback2 link-2 txt-1">回上一頁</a>
		</div>
	</section> -->

</main>

<?php
//app
  // include_once INC_PATH.'footer.php';
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
