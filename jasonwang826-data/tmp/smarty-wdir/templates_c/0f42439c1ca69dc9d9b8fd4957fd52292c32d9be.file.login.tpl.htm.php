<?php /* Smarty version Smarty-3.1.12, created on 2015-07-28 04:20:41
         compiled from "/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/admin/login.tpl.htm" */ ?>
<?php /*%%SmartyHeaderCode:61488727055b692998e0f15-49677145%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f42439c1ca69dc9d9b8fd4957fd52292c32d9be' => 
    array (
      0 => '/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/admin/login.tpl.htm',
      1 => 1438023052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61488727055b692998e0f15-49677145',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55b69299ad8218_28923057',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b69299ad8218_28923057')) {function content_55b69299ad8218_28923057($_smarty_tpl) {?><?php if (!is_callable('smarty_function_vercode')) include '/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/jasonwang826/php/smarty-plugins/sys/function.vercode.php';
?><!DOCTYPE html>
<html>
	<head>
		
		<title>康和期貨經理事業 後台管理</title>
		<!--[if gt IE 8]>
			<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<![endif]-->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
		<meta name="robots" content="noindex, nofollow">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
		<script type="text/javascript" src="<?php echo $_SERVER['JASONWANG826_CONFIG']['JQUERY_INCLUDE'];?>
"></script>
		<script type="text/javascript" src="<?php echo $_SERVER['JASONWANG826_CONFIG']['JQUERY_UI_INCLUDE'];?>
"></script>
		<script type="text/javascript" src="<?php echo $_SERVER['JASONWANG826_CONFIG']['JQUERY_UI_I18N'];?>
" id="jquery-ui-i18n" data-lang-id="zh-tw"></script>
		<link rel="stylesheet" href="<?php echo $_SERVER['JASONWANG826_CONFIG']['JQUERY_UI_CSS'];?>
" type="text/css" />
		<script type="text/javascript" src="<?php echo $_SERVER['JASONWANG826_CONFIG']['JASONWANG826_URL'];?>
/js/json2.js"></script>
		<script type="text/javascript" src="<?php echo $_SERVER['JASONWANG826_CONFIG']['JASONWANG826_URL'];?>
/js/jquery.cookie.js"></script>
		<script type="text/javascript" src="<?php echo $_SERVER['JASONWANG826_CONFIG']['JASONWANG826_URL'];?>
/js/jasonwang826.ui.js"></script>
		<script type="text/javascript" src="<?php echo $_SERVER['JASONWANG826_CONFIG']['JASONWANG826_URL'];?>
/js/timepicker.js"></script>
		<script type="text/javascript" src="<?php echo $_SERVER['JASONWANG826_CONFIG']['JASONWANG826_URL'];?>
/config.js"></script>
		<link href="css/login.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
		<!--
			function logingo() {
			  if($("#s_id").val() == "" || $("#s_id")=="Account"){
				alert("請填寫管理者帳號"); 
			  }else{
				if($("#s_pwd").val() == "" || $("#s_pwd").val()=="Password"){
				  alert("請填寫管理者密碼");
				}else{
				  document.forms["form1"].submit();
				}
			  }
			}
			<?php if (isset($_smarty_tpl->tpl_vars['error']->value)){?>
				$(function(e)	{
					$.alert('<?php echo $_smarty_tpl->tpl_vars['error']->value;?>
');
				});
			<?php }?>
		// -->
		</script>
		
	</head>
</head>
<body id="index_cont" class="login_body">
	<form method="POST" name="form1" action="login.php" onsubmit="logingo(); return false;" autocomplete="off">
	<input type="hidden" name="action" value="login" />
	<input type="hidden" name="uri" value="<?php if (isset($_GET['uri'])){?><?php echo $_GET['uri'];?>
<?php }?>" />
	<div id="wrapper">
		<div id="wrappertop"></div>

		<div id="wrappermiddle">

			<h2>Login</h2>

			<div id="username_input">

				<div id="username_inputleft"></div>

				<div id="username_inputmiddle">

					<input type="text" name="account" id="s_id" value="Account" onclick="this.value = ''" class="user">
					<img class="user_user" src="./images/mailicon.png" alt="">

				</div>

				<div id="username_inputright"></div>

			</div>

			<div id="password_input">

				<div id="password_inputleft"></div>

				<div id="password_inputmiddle">

					<input type="password" name="password" id="s_pwd" value="Password" onclick="this.value = ''" class="user">
					<img class="user_password" src="./images/passicon.png" alt="">

				</div>

				<div id="password_inputright"></div>

			</div>
            
            <div id="code_input">

				<div id="code_inputleft"></div>

				<div id="code_inputmiddle">
					<!-- <input type="text" name="code" id="code" value="驗證碼" onclick="this.value = ''" class="user"> -->
					<!-- <img src="showrandimg.php" id="rand-img" alt="驗證碼" class="user_code" /> -->
					<style type="text/css">
						#vercode_image {
							display: block;
							position: absolute;
							top: 6px;
							right: 10px;
							height: 32px;
							width: 85px;
						}
					</style>
					<?php echo smarty_function_vercode(array('name'=>"vercode",'class'=>"validate[required,minSize[4],maxSize[4]] user",'length'=>"4"),$_smarty_tpl);?>

				</div>

				<div id="code_inputright"></div>

			</div>

			<div id="submit">

				<input type="submit" id="submit1" value="">

			</div>


			

		</div>

		<div id="wrapperbottom"></div>
		
		<div id="powered">
		
		</div>
	</div>
    </form>

</body>
</html><?php }} ?>