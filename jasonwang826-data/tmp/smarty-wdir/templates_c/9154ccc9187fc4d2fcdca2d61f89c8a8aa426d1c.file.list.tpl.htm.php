<?php /* Smarty version Smarty-3.1.12, created on 2015-07-28 11:27:13
         compiled from "/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/admin/contactus-service/list.tpl.htm" */ ?>
<?php /*%%SmartyHeaderCode:205086415255b6f6912cf446-46501499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9154ccc9187fc4d2fcdca2d61f89c8a8aa426d1c' => 
    array (
      0 => '/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/admin/contactus-service/list.tpl.htm',
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
  'nocache_hash' => '205086415255b6f6912cf446-46501499',
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
  'unifunc' => 'content_55b6f6915e5724_41299669',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b6f6915e5724_41299669')) {function content_55b6f6915e5724_41299669($_smarty_tpl) {?><?php if (!is_callable('smarty_function_pager')) include '/var/www/vhosts/ecmd.com.tw/subdomains/case2/httpdocs/jasonwang826/php/smarty-plugins/sys/function.pager.php';
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
		
	<link rel="stylesheet" href="/admin/css/list.css" type="text/css" />
	<script src="/admin/js/list.js"></script>

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
	
	<div class="row list">
		<div class="col-lg-12">
			<div class="pull-right" style="margin-bottom: 10px;">
				<button type="button" class="btn btn-danger btn-xs" onclick="if(confirm('確認刪除?')) $('#ListForm').submit();"><i class="fa fa-trash-o"></i> 刪除</button>
			</div>
			
			<form name="ListForm" id="ListForm" method="post" action="./?action=delete" >
				<div class="table-responsive">
						
					<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
						<tr>
							<th width="60px"></th>
							<th width="200px">填表人姓名</th>
							<th>問題或建議類別</th>
							<th width="80px">處理與否</th>
							<th width="60px">編輯</th>
						</tr>
						<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pager']->value->rsData; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
							<tr>
								<td><input type="checkbox" name="ids[]" value="<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
" /></td>
								<td><?php echo $_smarty_tpl->tpl_vars['r']->value->name;?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['r']->value->category;?>
</td>
								<td><?php if ($_smarty_tpl->tpl_vars['r']->value->reply_date==null){?>未處理<?php }else{ ?>已處理<?php }?></td>
								<td>
									<a href="./?action=edit&id=<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
" title="修改"><i class="fa fa-pencil"></i></a>
									<a href="javascript:void(0)" onclick="if(confirm('確認刪除?'))location.href='./?action=delete&ids=<?php echo $_smarty_tpl->tpl_vars['r']->value->id;?>
'" title="刪除"><i class="fa fa-trash-o"></i></a> 
								</td>
							</tr>
					   <?php } ?>
					</table>
					
					<div class="pages"> 
						<?php echo smarty_function_pager(array('info'=>$_smarty_tpl->tpl_vars['pager']->value),$_smarty_tpl);?>

					</div>
				</div>
				<!-- /.table-responsive -->
			</form>
		  
		</div>
		<!-- /.col-lg-12 -->
	</div>

			</div>
			<!-- /#page-wrapper -->
		</div>
	</body>
</html>
<?php }} ?>