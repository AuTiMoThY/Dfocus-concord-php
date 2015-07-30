<?php /* Smarty version Smarty-3.1.12, created on 2015-07-28 11:49:21
         compiled from "/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/admin/contactus-service/edit.tpl.htm" */ ?>
<?php /*%%SmartyHeaderCode:118076008255b6fbc1d1a1a6-99896314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92556e03c6222f622c0cf290784bef2254f929ba' => 
    array (
      0 => '/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/admin/contactus-service/edit.tpl.htm',
      1 => 1438023056,
      2 => 'file',
    ),
    '5a34493b8c08a5d6b8d1b81fc080ec5d763f446c' => 
    array (
      0 => '/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/admin/layout.tpl.htm',
      1 => 1438023052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118076008255b6fbc1d1a1a6-99896314',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'notify' => 0,
    'n' => 0,
    'alert' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55b6fbc1ed00f1_52227406',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b6fbc1ed00f1_52227406')) {function content_55b6fbc1ed00f1_52227406($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/jasonwang826/php/Smarty-3.1.12/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_mailto')) include '/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/jasonwang826/php/Smarty-3.1.12/libs/plugins/function.mailto.php';
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
/js/jquery.metisMenu.js"></script>
		<script type="text/javascript" src="<?php echo $_SERVER['JASONWANG826_CONFIG']['JASONWANG826_URL'];?>
/js/jquery.urldecoder.js"></script>
		<script type="text/javascript" src="<?php echo $_SERVER['JASONWANG826_CONFIG']['JASONWANG826_URL'];?>
/js/validationEngine/jquery.validationEngine.js"></script>
		<script type="text/javascript" src="<?php echo $_SERVER['JASONWANG826_CONFIG']['JASONWANG826_URL'];?>
/js/validationEngine/languages/jquery.validationEngine-zh_TW.js"></script>
		<script type="text/javascript" src="/admin/js/jquery.validationEngine-custom.js"></script>
		<link rel="stylesheet" href="<?php echo $_SERVER['JASONWANG826_CONFIG']['JASONWANG826_URL'];?>
/css/validationEngine/validationEngine.jquery.ciaoca.css" type="text/css" />
		<script type="text/javascript" src="<?php echo $_SERVER['JASONWANG826_CONFIG']['JASONWANG826_URL'];?>
/config.js"></script>
		<link rel="stylesheet" href="/admin/css/dfstyle.css" type="text/css" />
		<link rel="stylesheet" href="/admin/css/bootstrap.min.css" type="text/css" />
		<script src="/admin/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="/admin/css/sb-admin.css" type="text/css" />
		<script src="/admin/js/sb-admin.js"></script>
		<link rel="stylesheet" href="/admin/css/font-awesome.css" type="text/css" />
		
	<link rel="stylesheet" href="/admin/css/edit.css" type="text/css" />
	<script src="/admin/js/edit.js"></script>
	<script src="<?php echo $_SERVER['JASONWANG826_CONFIG']['CKEDITOR_ALIAS'];?>
/standard/ckeditor.js"></script>
	<script src="<?php echo $_SERVER['JASONWANG826_CONFIG']['CKEDITOR_ALIAS'];?>
/standard/adapters/jquery.js"></script>

		<script type="text/javascript">
		<!--
			function onJasonwang826UIReady(e)	{
				<?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
					<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notify']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>
						$.jnotify(
							{
								message : '<?php echo $_smarty_tpl->tpl_vars['n']->value->message;?>
',
								type : '<?php echo $_smarty_tpl->tpl_vars['n']->value->type;?>
',
								time : '<?php echo $_smarty_tpl->tpl_vars['n']->value->time;?>
'
							}
						);
					<?php } ?>
				<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['alert']->value)){?>
					$.alert(
						'<?php echo $_smarty_tpl->tpl_vars['alert']->value->message;?>
',
						'<?php echo $_smarty_tpl->tpl_vars['alert']->value->title;?>
',
						undefined,
						function(e)	{	<?php if ($_smarty_tpl->tpl_vars['alert']->value->url!=null){?>	location='<?php echo $_smarty_tpl->tpl_vars['alert']->value->url;?>
';	<?php }?>	}
					);
				<?php }?>
			}
		//-->
		</script>
	</head>
	<body>
		<div id="wrapper">

			<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/admin/">康和期貨經理事業 後台管理</a>
				</div>
				<!-- /.navbar-header -->

				<ul class="nav navbar-top-links navbar-right">
					
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-list fa-fw"></i>  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
												</ul>
						<!-- /.dropdown-user -->
					</li>
					<!-- /.dropdown -->
					
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							<li><a href="/admin/account/"><i class="fa fa-user fa-fw"></i> 我的帳號</a>
							</li>
							<li class="divider"></li>
							<li><a href="/admin/login.php?action=logout"><i class="fa fa-sign-out fa-fw"></i> 登出</a>
							</li>
						</ul>
						<!-- /.dropdown-user -->
					</li>
					<!-- /.dropdown -->
				</ul>
				<!-- /.navbar-top-links -->
				<div class="navbar-default navbar-static-side" role="navigation">
					<div class="sidebar-collapse">
						<ul class="nav" id="side-menu">
							<li>
								<a href="Javascript:void(0);">首頁管理</a>
								<ul>
									<li><a href="/admin/banner/">幻燈片</a></li>
									<li><a href="/admin/slogon/">標語</a></li>
								</ul>
							</li>
							<li><a href="/admin/fundprice/">每日淨值</a></li>
							<li><a href="/admin/web-content-about/">康和期經介紹</a></li>
							<li><a href="/admin/team/">康和菁英(人物)</a></li>
							<li>
								<a href="Javascript:void(0);">康和期經事業</a>
								<ul>
									<li><a href="/admin/web-content/?id=futures.managed">期貨經理事業</a></li>
									<li><a href="/admin/web-content/?id=futures.fund">期貨信託事業</a></li>
									<li><a href="/admin/web-content/?id=futures.advisory">期貨顧問事業</a></li>
								</ul>
							</li>
							<li>
								<a href="Javascript:void(0);">產品介紹</a>
								<ul>
									<li><a href="/admin/fund/">基金</a></li>
									<li><a href="/admin/trust/">全權委託</a></li>
									<li><a href="/admin/advisory/">顧問服務</a></li>
								</ul>
							</li>
							<li><a href="/admin/news/">市場消息</a></li>
							<li>
								<a href="Javascript:void(0);">客服中心</a>
								<ul>
									<li><a href="/admin/report/">投資月報</a></li>
									<li><a href="/admin/document/">文件下載</a></li>
									<li><a href="/admin/saleschannel/">銷售機構</a></li>
									<li><a href="/admin/faq/">常見問題</a></li>
								</ul>
							</li>
							<li>
								<a href="Javascript:void(0);">聯絡表單</a>
								<ul>
									<li><a href="/admin/contactus-service/">客服中心</a></li>
									<li><a href="/admin/contactus-divisions/">三事業</a></li>
								</ul>
							</li>
							<li><a href="/admin/setting/">網站基本設定</a></li>
							<li><a href="/admin/user/">管理員設定</a></li>
						</ul>
						<!-- /#side-menu -->
					</div>
					<!-- /.sidebar-collapse -->
				</div>
				<!-- /.navbar-static-side -->
			</nav>
			 <div id="page-wrapper">
				
  <div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</h3>
		</div>
	</div>
	
	<form class="edit" method="post" action="./" enctype="multipart/form-data">
		<input type="hidden" name="action" value="<?php if ($_REQUEST['action']=='new'){?>insert<?php }else{ ?>update<?php }?>" />
		<input type="hidden" name="id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" />
		<div class="row list">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						回覆<?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>

						<div class="pull-right"><a href="./">列表</a></div>
					</div>
					<div class="panel-body">

						<div class="form-group">
							<label>留言者姓名</label>
							<div><?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
</div>
						</div>

						<div class="form-group">
							<label>發問時間</label>
							<div><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['r']->value['cdate'],'%Y/%m/%d %H:%M');?>
</div>
						</div>

						<div class="form-group">
							<label>留言者email</label>
							<div><?php echo smarty_function_mailto(array('address'=>$_smarty_tpl->tpl_vars['r']->value['email']),$_smarty_tpl);?>
</div>
						</div>

						<div class="form-group">
							<label>聯絡電話</label>
							<div><?php echo $_smarty_tpl->tpl_vars['r']->value['telno'];?>
</div>
						</div>

						<div class="form-group">
							<label>問題或建議類別</label>
							<div><?php echo $_smarty_tpl->tpl_vars['r']->value['category'];?>
</div>
						</div>

						<div class="form-group">
							<label>內文</label>
							<div><?php echo nl2br($_smarty_tpl->tpl_vars['r']->value['content']);?>
</div>
						</div>

						<div class="form-group">
							<div><label>回覆</label></div>
							<textarea name="reply" rows="8" class="form-control"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['r']->value['reply'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
						</div>

						<div class="form-group">
							<label>回覆時間</label>
							<div><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['r']->value['reply_date'],'%Y/%m/%d %H:%M');?>
</div>
						</div>

						<button type="submit" class="btn btn-success">確認修改</button>

					</div>

				</div>
			</div>
		</div>
	</form>

			</div>
			<!-- /#page-wrapper -->
		</div>
	</body>
</html>
<?php }} ?>