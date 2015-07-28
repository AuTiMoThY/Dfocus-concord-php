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
* Name:     pager
* Version:  1.1
* Author:   Jason Wang (1971, Taiwan)
* Purpose:  Pager of list.
* -------------------------------------------------------------
* @param info JPDOPager object
* @param skin optional skin name of pager
*
*/
/*
 *	Author : Jason Wang ( 1971-, Taiwan )
 *	作者 : 王佳陳 ( 1971年生於台灣 )
 *
 *	Jason Wang 826 Lab. All rights reserved
 *	版權係屬 Jason Wang 826 Lab. 所有，未經書面授權，不得任意轉作商業用途
 */
function smarty_function_pager($params, &$smarty)	{
	global $REQUEST_URI;
	if(!isset($params['info']) || empty($params['info']))	{
		$smarty->trigger_error('pager: required parameter "info" missing');
	}
	$pager=$params['info'];
	$skin=(!isset($params['skin']) || empty($params['skin']))?'default':$params['skin'];
	$seeklast=(!isset($params['seeklast']) || empty($params['seeklast']))?'on':strtolower($params['seeklast']);
	$pSmarty=new JSmartyTemplate();
	$pSmarty->assign( 'seeklast', $seeklast );
	$pSmarty->assign( 'pager', $pager );
	$out=$pSmarty->fetch( dirname(__FILE__)."/pager/{$skin}.tpl.htm" );
	return $out;
}
?>