<?php
	include_once 'config.php';
	include_once INC_PATH.'headleader.php';
	require_once INC_PATH.'aunav.php';
?>
<title>理財規劃計算機 | <?php echo $webTitle; ?></title>

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
				<h2 class="pdt-subtitle txt-4 text-center">理財規劃試算器</h2>
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
    		<label for="" class="col-xs-12 col-sm-4 col-md-4 control-label frm__label">預定在幾年內達成目標</label>
			<div class="input-group col-xs-12 col-sm-8 col-md-8">
				<input type="text" class="frm__field form-control" name="T1" size="8">
				<span class="input-group-addon">年</span>
			</div>
			<!-- <div class="clearfix visible-xs visible-sm row-faker"></div> -->

    	</div>
    	<div class="form-group form-group-white col-xs-12 col-sm-12 col-md-6">
    		<label for="" class="col-xs-12 col-sm-4 col-md-5 control-label frm__label">目標所需金額（目前貨幣值）</label>
			<div class="input-group col-xs-12 col-sm-8 col-md-7">
				<span class="input-group-addon">NT$</span>
				<input type="text" class="frm__field form-control" name="T2" size="8">
				<span class="input-group-addon">元</span>
			</div>
		</div>

    	<div class="form-group form-group-white col-xs-12 col-sm-12 col-md-4">
    		<label for="" class="col-xs-12 col-sm-4 col-md-4 control-label frm__label">預估通貨膨脹率</label>
			<div class="input-group col-xs-12 col-sm-8 col-md-8">
				<input type="text" class="frm__field form-control" name="T3" size="8">
				<span class="input-group-addon">%</span>
			</div>
    	</div>
    	<div class="form-group form-group-white col-xs-12 col-sm-12 col-md-4">
    		<label for="" class="col-xs-12 col-sm-4 col-md-4 control-label frm__label">目前已有現金</label>
			<div class="input-group col-xs-12 col-sm-8 col-md-8">
				<span class="input-group-addon">NT$</span>
				<input type="text" class="frm__field form-control" name="T4" size="8">
				<span class="input-group-addon">元</span>
			</div>
    	</div>
    	<div class="form-group form-group-white col-xs-12 col-sm-12 col-md-4">
    		<label for="" class="col-xs-12 col-sm-4 col-md-4 control-label frm__label">預估年報酬率</label>
			<div class="input-group col-xs-12 col-sm-8 col-md-8">
				<input type="text" class="frm__field form-control" name="T5" size="8">
				<span class="input-group-addon">%</span>
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
		    <div class="remark">註&nbsp;(1)以月份作為複利的期次</div>
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
    var vt1 = parseFloat(document.form1.T1.value);
    var vt2 = parseFloat(document.form1.T2.value);
    var vt3 = parseFloat(document.form1.T3.value);
    var vt4 = parseFloat(document.form1.T4.value);
    var vt5 = parseFloat(document.form1.T5.value);
    var tag = vt2 * Math.pow((100 + vt3) / 100, vt1);
    var ard = vt4 * Math.pow((100 + vt5) / 100, vt1);
    var dif = tag - ard;
    var uni = 1;
    var rate = Math.pow((1 + vt5 / 100), (1 / 12));
    for (i = 1; i <= vt1 * 12; i++) {
        uni = uni * rate + 1;
    }
    uni = uni - 1;
    var va1 = Math.round(dif / uni);
    //if (val==0) val="N/A";
    $("#s1").html("為達到您的目標，需每月投資：<span class=\"txt-1_3\">" + chgNA(va1) + "</span>元<br>屆時累計的金額為：<span class=\"txt-1_3\">" + chgNA(Math.round(tag)) + "</span>元");
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
