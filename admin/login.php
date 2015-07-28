<?
	$ignoreLoginCheck=true;
	require_once('local.inc');

	$action = JUtil::issetv(@$_REQUEST['action'],'form');
	switch($action)	{
		case 'form':
			$smarty = new JSmartyTemplate($templateName);
			if( isset($_REQUEST['error']) )
				$smarty->assign('error', $_REQUEST['error']);
			$smarty->display(dirname(__FILE__).'/login.tpl.htm');
			break;
		case 'login':
			if( !Vercode::verify( $_POST['vercode_instance_id'], $_POST['vercode']) )	{
				Vercode::clear();
				$smarty = new JSmartyTemplate( $templateName );
				$smarty->assign( 'error', '驗証碼錯誤' );
				$smarty->display( dirname(__FILE__).'/login.tpl.htm' );
				exit;
			}
			Vercode::clear();
			if( !JTUser::login( $_POST['account'], $_POST['password'] ) )	{
				$smarty = new JSmartyTemplate($templateName);
				$smarty->assign('error', JTUser::$errorMessage);
				$smarty->display(dirname(__FILE__).'/login.tpl.htm');
			}	else	{
				$uri = JUtil::ifv($_POST['uri']=='','/admin/',$_POST['uri']);
				JWStdio::location($uri);
			}
			break;
		case 'logout':
			JTUser::logout();
			JWStdio::location("/admin/");
			break;
	}
?>