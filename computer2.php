<?php
	include_once 'config.php';
	include_once INC_PATH.'headleader.php';
	require_once INC_PATH.'aunav.php';
?>
<title>定期定額試算器 | <?php echo $webTitle; ?></title>

<?php
// -------------------------------
// SEO
// CSS
// Script in the HEAD
// -------------------------------
  include_once INC_PATH.'head.php';
 ?>
<link rel="stylesheet" href="<?php path_au('css'); ?>bootstrap.css" />
<style>
.frm__label.control-label {
	color: #000;
	padding-top: 7px;
	padding-left: 0;
	margin-bottom: 0;
}
.frm__field.form-control {
	height: 34px;
	background-color: #fff;
}
.input-group .input-group-addon {
	background-color: #eee;
	color: #000;
}
</style>
<?php
//app
//  include_once INC_PATH.'social.php';
 ?>

<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="about_page aboutCPCS">

<?php
//app
  include_once INC_PATH.'header.php';
 ?>
<div id="bannerTrigger"></div>
<section id="pageBanner" class="banner" style="background-image: url('<?php path_au('img'); ?>banner-aboutCPCS.jpg')">
	
</section>

<main class="">
	<section class="row1">
		<div class="wrapper small">
			<hgroup>
				<!-- <h1 class="pdt-title txt-3 text-center">Futures Fund</h1> -->
				<h2 class="pdt-subtitle txt-4 text-center">定期定額試算器</h2>
			</hgroup>
		</div>
	</section>
	<section class="cp_computer-calculator1">
		<div class="wrapper">
<form name="form1" method="POST" class="cp_computer-calculator1-form">
<!-- <form name="form1" method="POST" onsubmit="return funda()"> -->
    <input type="hidden" name="SharpeKind" value="2">
    <div class="col-2">
    	<div class="form-group form-group-white col-xs-12 col-sm-12 col-md-6">
    		<label for="" class="col-xs-12 col-sm-4 col-md-4 control-label frm__label">每月投資金額</label>
			<div class="input-group col-xs-12 col-sm-8 col-md-8">
				<span class="input-group-addon">NT$</span>
				<input type="text" class="frm__field form-control" name="T1" size="8">
				<span class="input-group-addon">元</span>
			</div>
			<!-- <div class="clearfix visible-xs visible-sm row-faker"></div> -->

    	</div>
    	<div class="form-group form-group-white col-xs-12 col-sm-12 col-md-6">
    		<label for="" class="col-xs-12 col-sm-4 col-md-5 control-label frm__label">目標投資年報酬率</label>
			<div class="input-group col-xs-12 col-sm-8 col-md-7">
				<input type="text" class="frm__field form-control" name="T2" size="8">
				<span class="input-group-addon">%</span>
			</div>
		</div>

    	<div class="form-group form-group-white col-xs-12 col-sm-12 col-md-6">
    		<label for="" class="col-xs-12 col-sm-4 col-md-4 control-label frm__label">投資期間</label>
			<div class="input-group col-xs-12 col-sm-8 col-md-8">
				<input type="text" class="frm__field form-control" name="T3" size="8">
				<span class="input-group-addon">年</span>
			</div>
    	</div>
    	<div class="form-group form-group-white col-xs-12 col-sm-12 col-md-12">
<div class="input-group" style="margin:auto;">
	<input type="button" name="1" id="1" class="btn btn-submit btn-success" value="試算結果" onclick="funda()">
	<input type="reset" name="1" id="1" class="btn btn-reset btn-material-blue-grey" value="清除重填">
</div>
    	</div>
    	<div class="form-group form-group-white col-xs-12 col-sm-12 col-md-12">
    		<label for="" class="col-xs-12 col-sm-4 col-md-4 control-label frm__label">試算結果</label>
		    <div class="remark col-xs-12 col-sm-8 col-md-8">註&nbsp;(1)假設投資期間基金無收益分配情形&nbsp;&nbsp;(2)以月份作為複利的期次&nbsp;&nbsp;(3)申購手續費以1.0%計算</div>
    		<div class="col-xs-12 col-sm-12 col-md-12">
    			<div id="s1"></div>
    		</div>
    	</div>


    </div>
</form>
		</div>
	</section>

	<section id="" class="fullbg row4">
		<div class="bg"></div>
		<div class="wrapper">
			<a href="javascript:history.go(-1);" class="btn btn-goback2 link-2 txt-1">回上一頁</a>
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
<script>
function funda() {
	var vt1=parseFloat(document.form1.T1.value);
	var vt2=parseFloat(document.form1.T2.value);
	var vt3=parseFloat(document.form1.T3.value);
	var va1=vt1;
	var rate = Math.pow((1+vt2/100),(1/12));
	for(i=1;i<=vt3*12;i++) {
		va1=va1*rate + vt1;
		//document.form1.S1.value += i + "¤ë va1 = " + va1 + ";rate=" + rate + ";\n"
	}
	va1=Math.round(va1-vt1);
	var va2=Math.round(vt1*vt3*12*101/100);
	var va3=va1-va2;
    $("#s1").html("你的投資到期總金額為：<span class=\"txt-1_3\">" + chgNA(va1) + "</span>元<br>投資成本為：<span class=\"txt-1_3\">" + chgNA(va2) + "</span>元<br>投資獲利為：<span class=\"txt-1_3\">" + chgNA(va3) + "</span>元");
    // document.form1.S1.value = "為達到您的目標，需每月投資：\n" + chgNA(va1) + "元\n屆時累計的金額為：" + chgNA(Math.round(tag)) + "元";
    return false;
}

function chgNA(val) {
    if (isNaN(val))
        return "N/A";
    return val;
}

$(function() {
	funda();
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
