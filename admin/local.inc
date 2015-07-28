<?
	require_once(dirname(__FILE__).'/../jasonwang826/jasonwang826.inc');

	$templateName = 'admin';
	if( !(isset($ignoreLoginCheck) && $ignoreLoginCheck) )	{
		if( !JTUser::isLogin() )	{
			JWStdio::location("/admin/login.php?action=form&uri=".urlencode($_SERVER['REQUEST_URI']));
		}	else	{
			$_SESSION['login_user_info']=JTUser::loginUser();
		}
	}

?>