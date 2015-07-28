<?php 
require_once 'jasonwang826/jasonwang826.inc';
require_once 'plugin/mobiledetect/Mobile_Detect.php';
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

function isPhone($title){
	global $detect;
	global $deviceType;
	if ($deviceType == 'phone') {
		echo $title;
	}
}
function notPhone($title){
	global $detect;
	global $deviceType;
	if ($deviceType != 'phone') {
		echo $title;
	}
}


define('IMG_PATH', 'dist/images/');
define('TEMP_IMG_PATH', 'dist/images/temp/');
define('INC_PATH', 'dist/inc/');
define('CSS_PATH', 'dist/css/');
define('JS_PATH', 'dist/js/');

$webTitle = '康和期貨經理事業';

function path_au($what) {
	switch ($what) {
		case 'img':
			echo IMG_PATH;
			break;
		case 'temp':
			echo TEMP_IMG_PATH;
			break;
		case 'css':
			echo CSS_PATH;
			break;
		case 'js':
			echo JS_PATH;
			break;

		default:
			echo IMG_PATH;
			break;
	}
}

function designByDFocus(){
	echo "Design by <a href=\"http://www.ecmd.com.tw/\" target=\"_blank\" class=\"df-logo\"><img src=\"" . IMG_PATH . "DF_ICON.png\" alt=\"\"></a>";
}

?>