<?
	require_once('local.inc');
	header('Content-Type: text/html; charset=utf-8');
	sleep(1);
	$ret=array();
	$ret[0]=$_REQUEST['fieldId'];
	$ret[1]=true;
	if( JTUser::isAccountExists($_REQUEST['fieldValue']) )	{
		$ret[1]=false;
	}
	die( json_encode($ret) );
?>