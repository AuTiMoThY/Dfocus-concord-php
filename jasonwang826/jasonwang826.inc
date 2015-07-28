<?
	if(!isset($_SESSION)) session_start();
	$_SERVER['JASONWANG826_CONFIG'] = array();

//
//	jasonwang826 config
//
	$_CONFIG = parse_ini_file(dirname(__FILE__).'/config.ini',true);

	foreach( $_CONFIG['JASONWANG826_CONFIG'] as $k=>$v )	{
		if( is_array($v) )	{
			foreach( $_CONFIG['JASONWANG826_CONFIG'][$k] as $k2=>$v2 )
				eval('$_CONFIG[\'JASONWANG826_CONFIG\'][$k][$k2]="'.$v2.'";');
		}	else	{
			eval('$_CONFIG[\'JASONWANG826_CONFIG\'][$k]="'.$v.'";');
		}
	}
	$_SERVER['JASONWANG826_CONFIG'] = $_CONFIG['JASONWANG826_CONFIG'];
	if(isset($_SERVER['JASONWANG826_CONFIG']['DEBUG'])&&strtolower($_SERVER['JASONWANG826_CONFIG']['DEBUG'])=='on')	ini_set('display_errors', '1');

//
//	apply to jasonwang826 program
//
	set_include_path( implode(PATH_SEPARATOR, $_SERVER['JASONWANG826_CONFIG']['PHP_INCLUDE_PATH']) );

	spl_autoload_extensions('.inc.php,.class.php,.inc,.php');
	function jasonwang826_autoloader($class) {
		$exts=explode(',',spl_autoload_extensions());
		$include_paths = explode(PATH_SEPARATOR, get_include_path());
		foreach( $exts as $ext )	{
			$f="{$class}{$ext}";
			foreach( $include_paths as $path )	{
				if(is_readable("{$path}/{$f}"))	{
					include_once $f;
					break 2;
				}
			}
		}
	}
	spl_autoload_register('jasonwang826_autoloader');

	JPDO::initConnFactory(dirname(__FILE__).'/JPDO.ini');

?>