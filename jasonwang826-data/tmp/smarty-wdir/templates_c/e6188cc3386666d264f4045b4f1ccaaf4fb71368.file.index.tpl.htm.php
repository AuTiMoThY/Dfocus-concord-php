<?php /* Smarty version Smarty-3.1.12, created on 2015-07-28 04:20:56
         compiled from "/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/admin/index.tpl.htm" */ ?>
<?php /*%%SmartyHeaderCode:94105466655b692a8e32d26-60349039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6188cc3386666d264f4045b4f1ccaaf4fb71368' => 
    array (
      0 => '/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/admin/index.tpl.htm',
      1 => 1438023052,
      2 => 'file',
    ),
    '5a34493b8c08a5d6b8d1b81fc080ec5d763f446c' => 
    array (
      0 => '/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/admin/layout.tpl.htm',
      1 => 1438023052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94105466655b692a8e32d26-60349039',
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
  'unifunc' => 'content_55b692a9d4bf53_53926164',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b692a9d4bf53_53926164')) {function content_55b692a9d4bf53_53926164($_smarty_tpl) {?><!DOCTYPE html>
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
			<h3 class="page-header">管理台首頁</h3>
			<p>HI! <?php echo $_SESSION['login_user_info']->data['name'];?>
 ( <?php echo $_SESSION['login_user_info']->data['account'];?>
 ), 歡迎回來! </p>
		</div>
		<!-- /.col-lg-12 -->
		<ul class="cf">
			<li class="col-lg-3">
				<div class="dashboard-stat color1">
					<div class="datashow cf">
						<div class="icon left">
							<i class="fa fa-newspaper-o"></i>
						</div>
						<div class="details right">
							<div class="number"><?php echo $_smarty_tpl->tpl_vars['news_count']->value;?>
</div>
							<div class="desc">市場消息</div>
						</div>
					</div>
					<a href="/admin/news/" class="more cf">更多<i class="fa fa-arrow-circle-o-right right"></i></a>
				</div>
			</li>
			<li class="col-lg-3">
				<div class="dashboard-stat color2">
					<div class="datashow cf">
						<div class="icon left">
							<i class="fa fa-users"></i>
						</div>
						<div class="details right">
							<div class="number"><?php echo $_smarty_tpl->tpl_vars['team_count']->value;?>
</div>
							<div class="desc">康和菁英</div>
						</div>
					</div>
					<a href="/admin/team/" class="more cf">更多<i class="fa fa-arrow-circle-o-right right"></i></a>
				</div>
			</li>
			<li class="col-lg-3">
				<div class="dashboard-stat color3">
					<div class="datashow cf">
						<div class="icon left">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details right">
							<div class="number"><?php echo $_smarty_tpl->tpl_vars['advisory_count']->value;?>
</div>
							<div class="desc">顧問服務</div>
						</div>
					</div>
					<a href="/admin/advisory/" class="more cf">更多<i class="fa fa-arrow-circle-o-right right"></i></a>
				</div>
			</li>
			<li class="col-lg-3">
				<div class="dashboard-stat color4">
					<div class="datashow cf">
						<div class="icon left">
							<i class="fa fa-bar-chart"></i>
						</div>
						<div class="details right">
							<div class="number"><?php echo $_smarty_tpl->tpl_vars['report_count']->value;?>
</div>
							<div class="desc">投資月報</div>
						</div>
					</div>
					<a href="/admin/report/" class="more cf">更多<i class="fa fa-arrow-circle-o-right right"></i></a>
				</div>
			</li>
			<li class="col-lg-3">
				<div class="dashboard-stat color5">
					<div class="datashow cf">
						<div class="icon left">
							<i class="fa fa-download"></i>
						</div>
						<div class="details right">
							<div class="number"><?php echo $_smarty_tpl->tpl_vars['document_count']->value;?>
</div>
							<div class="desc">文件下載</div>
						</div>
					</div>
					<a href="/admin/document/" class="more cf">更多<i class="fa fa-arrow-circle-o-right right"></i></a>
				</div>
			</li>
			<li class="col-lg-3">
				<div class="dashboard-stat color6">
					<div class="datashow cf">
						<div class="icon left">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details right">
							<div class="number"><?php echo $_smarty_tpl->tpl_vars['saleschannel_count']->value;?>
</div>
							<div class="desc">銷售機構</div>
						</div>
					</div>
					<a href="/admin/saleschannel/" class="more cf">更多<i class="fa fa-arrow-circle-o-right right"></i></a>
				</div>
			</li>
			<li class="col-lg-3">
				<div class="dashboard-stat color6">
					<div class="datashow cf">
						<div class="icon left">
							<i class="fa fa-question"></i>
						</div>
						<div class="details right">
							<div class="number"><?php echo $_smarty_tpl->tpl_vars['faq_count']->value;?>
</div>
							<div class="desc">常見問題</div>
						</div>
					</div>
					<a href="/admin/faq/" class="more cf">更多<i class="fa fa-arrow-circle-o-right right"></i></a>
				</div>
			</li>
			<li class="col-lg-3">
				<div class="dashboard-stat color7">
					<div class="datashow cf">
						<div class="icon left">
							<i class="fa fa-user"></i>
						</div>
						<div class="txt-1 login_time">
							登入時間： <?php echo $_SESSION['login_user_info']->data['last_login'];?>

						</div>
						<div class="details right">
							<div class="number"><?php echo $_smarty_tpl->tpl_vars['user_count']->value;?>
</div>
							<div class="desc">管理員</div>
						</div>
					</div>
					<a href="/admin/user/" class="more cf">更多<i class="fa fa-arrow-circle-o-right right"></i></a>
				</div>
			</li>
		</ul>

	</div>
	<!-- /.row -->

			</div>
			<!-- /#page-wrapper -->
		</div>
	</body>
</html>
<?php }} ?>