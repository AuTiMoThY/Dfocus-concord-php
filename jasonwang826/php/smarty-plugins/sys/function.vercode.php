<?php
/**
 * Smarty plugin
 * @package JSmarty
 * @subpackage plugins
 */

/**
* Smarty function plugin
* Requires PHP >= 4.3.0
* -------------------------------------------------------------
* Type:     function
* Name:     vercode
* Version:  1.1
* Author:   Jason Wang (1971, Taiwan)
* Purpose:  vercode.
* -------------------------------------------------------------
* @param name required input name
* @param id optional object id
* @param class optional class
* @param style optional style
* @param accept_chars optional accepted chars, default is '2346789BCEFGHJKMPQRTVWXY'.
* @param length optional length of verify string, default is 4.
* @param skin optional skin name of input_datetime, default is default.
*/
// <{vercode name="sdate" id="sdate" value="" start_century="19" end_century="20" allow_empty="TRUE" skin="default" time_panel="FALSE"}>
/*
 *	Author : Jason Wang ( 1971-, Taiwan )
 *	作者 : 王佳陳 ( 1971年生於台灣 )
 *
 *	Jason Wang 826 Lab. All rights reserved
 *	版權係屬 Jason Wang 826 Lab. 所有，未經書面授權，不得任意轉作商業用途
 */
function smarty_function_vercode($params, &$smarty)	{
	global $REQUEST_URI, $_SESSION;
	if(!isset($params['name']) || empty($params['name']))	{
		$smarty->trigger_error('vercode: required parameter "name" missing');
	}
	$name=$params['name'];
	$id=(!isset($params['id']) || empty($params['id']))?$name:$params['id'];
	$class=(!isset($params['class']) || empty($params['class']))?'':$params['class'];
	$style=(!isset($params['style']) || empty($params['style']))?'':$params['style'];
	$value=(!isset($params['value']) || empty($params['value']))?'':$params['value'];
	$accept_chars=(!isset($params['accept_chars']) || empty($params['accept_chars']))?'234689BEFHJKMPQRTVWXY':$params['accept_chars'];
	$length=(!isset($params['length']) || empty($params['length']))?4:$params['length'];
	$case_sensitive=(!isset($params['case_sensitive']) || empty($params['case_sensitive']))?'N':$params['case_sensitive'];
	$skin=(!isset($params['skin']) || empty($params['skin']))?'default':$params['skin'];
	$i=0;
	while( isset( $_SESSION['vercode'][($instance_id=rand(0,1024))]) )	{
		if($i++>200) {
			$smarty->trigger_error('vercode: create instance_id fail!');
		}
	};
	$setting=(object)array(
				'case_sensitive'	=>	$case_sensitive
			,	'accept_chars'		=>	$accept_chars
			,	'length'			=>	$length
		);
	$_SESSION['vercode'][$instance_id]=$setting;
	if( defined( 'Smarty::SMARTY_VERSION' ) && preg_match('/^Smarty-3\.[0-9\.]+$/',Smarty::SMARTY_VERSION) )	{
		$smarty2=new JSmartyTemplate();
		$smarty2->assign( 'name', $name );
		$smarty2->assign( 'id', $id );
		$smarty2->assign( 'class', $class );
		$smarty2->assign( 'style', $style );
		$smarty2->assign( 'value', $value );
		$smarty2->assign( 'instance_id', $instance_id );
		$smarty2->assign( 'case_sensitive', $case_sensitive );
		$smarty2->assign( 'length', $length );
		$out=$smarty2->fetch( dirname(__FILE__)."/vercode/{$skin}.tpl.htm" );
	}
	return $out;
}
?>