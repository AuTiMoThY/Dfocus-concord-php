<?
	/*
	 *	Author : Jason Wang ( 1971-, Taiwan )
	 *	作者 : 王佳陳 ( 1971年生於台灣 )
	 *
	 *	Jason Wang 826 Lab. All rights reserved
	 *	版權係屬 Jason Wang 826 Lab. 所有，未經書面授權，不得任意轉作商業用途
	 */

	if( isset($_SERVER['REGISTER_GLOBALS']) && strtolower($_SERVER['REGISTER_GLOBALS'])=='on' )	{
		/**
		 * function to emulate the register_globals setting in PHP
		 * for all of those diehard fans of possibly harmful PHP settings :-)
		 * @author Ruquay K Calloway
		 * @param string $order order in which to register the globals, e.g. 'egpcs' for default
		 */
		function register_globals($order = 'egpcs')
		{
			// define a subroutine
			if(!function_exists('register_global_array'))
			{
				function register_global_array(array $superglobal)
				{
					foreach($superglobal as $varname => $value)
					{
						global $$varname;
						$$varname = $value;
					}
				}
			}
			$order = explode("\r\n", trim(chunk_split($order, 1)));
			foreach($order as $k)
			{
				switch(strtolower($k))
				{
					case 'e':    register_global_array($_ENV);        break;
					case 'g':    register_global_array($_GET);        break;
					case 'p':    register_global_array($_POST);        break;
					case 'c':    register_global_array($_COOKIE);    break;
					case 's':    register_global_array($_SERVER);    break;
				}
			}
		}
		if( isset($_SERVER['GPC_ORDER']) && $_SERVER['GPC_ORDER']!='' )	{
			register_globals(strtolower($_SERVER['GPC_ORDER']));
		}	else	{
			register_globals();
		}
	}

	if( ! function_exists('apache_lookup_uri') )	{
		function apache_lookup_uri ( $filename )	{
			global $DOCUMENT_ROOT;
			if( $filename=='/' )	$filename='/index.php';
			$o = new stdClass();
			$o->filename=$DOCUMENT_ROOT.$filename;
			return $o;
		}
	}

	if( ! function_exists('json_encode') )	{
		include_once('Services_JSON.inc.php');
		function json_encode( $obj ){
			$json = new Services_JSON();
			$output = $json->encode($obj);
			return $output;
		}
	}

	if (!function_exists('array_replace_recursive'))	{
		function array_replace_recursive($array, $array1)	{
			function recurse($array, $array1)	{
				foreach ($array1 as $key => $value)	{
					// create new key in $array, if it is empty or not an array
					if (!isset($array[$key]) || (isset($array[$key]) && !is_array($array[$key])))	{
						$array[$key] = array();
					}

					// overwrite the value in the base array
					if (is_array($value))	{
						$value = recurse($array[$key], $value);
					}
					$array[$key] = $value;
				}
				return $array;
			}

			// handle the arguments, merge one by one
			$args = func_get_args();
			$array = $args[0];
			if (!is_array($array))	{
				return $array;
			}
			for ($i = 1; $i < count($args); $i++)	{
				if (is_array($args[$i]))	{
					$array = recurse($array, $args[$i]);
				}
			}
			return $array;
		}
	}

	if (!function_exists('get_called_class')) {

		function get_called_class() {

			$bt = debug_backtrace();

			/*
				echo '<br><br>';
				echo '<pre>';
				print_r($bt);
				echo '</pre>';
			*/

			if (self::$fl == $bt[1]['file'] . $bt[1]['line']) {
				self::$i++;
			} else {
				self::$i = 0;
				self::$fl = $bt[1]['file'] . $bt[1]['line'];
			}

			if ($bt[1]['type'] == '::') {

				$lines = file($bt[1]['file']);
				preg_match_all('/([a-zA-Z0-9\_]+)::' . $bt[1]['function'] . '/', $lines[$bt[1]['line'] - 1], $matches);
				$result = $matches[1][self::$i];

			} else if ($bt[1]['type'] == '->') {

				$result = get_class($bt[1]['object']);
			}

			return $result;
		}
	}

	if (!function_exists('strptime'))
	{
		/**
		 * 
		 * 
		 * @param string $buffer
		 * @param string $pattern
		 * @return string
		 * @access private
		 */
		function _strptime_match(&$buffer,$pattern)
		{
			if (is_array($pattern)) {
				$pattern = implode('|',$pattern);
			}
			$pattern = '/^('.$pattern.')/i';
			
			$ret = null;
			$matches;
			if (preg_match($pattern,$buffer,$matches))
			{
				$ret = $matches[0];
				
				//Remove the match from the buffer
				$buffer = preg_replace($pattern,'',$buffer);
			}
			return $ret;
		}
		
		/**
		 * 
		 * 
		 * @param int $n
		 * @param int $min
		 * @param int $max
		 * @return int
		 * @access private
		 */
		function _strptime_clamp($n,$min,$max) {
			return max(min($n,$max),$min);
		}
		
		/**
		 * 
		 * 
		 * @param string $p
		 * @return array
		 * @access private
		 */
		function _strptime_wdays($p)
		{
			$locales = array();
			
			for ($i = 0; $i < 7; $i++)
			{
				$dayTime = strtotime('next Sunday +'.$i.' days');
				$locales[$i] = strftime('%'.$p,$dayTime);
			}
			
			return $locales;
		}
		
		/**
		 * 
		 * 
		 * @param string $p
		 * @return array
		 * @access private
		 */
		function _strptime_months($p)
		{
			$locales = array();
			
			for ($i = 1; $i <= 12; $i++) {
				$locales[$i] = strftime('%'.$p,mktime(0,0,0,$i));
			}
			
			return $locales;
		}
		
		/**
		 * 
		 * 
		 * @param string $date
		 * @param string $format
		 * @return array
		 */
		function strptime($date,$format)
		{
			//Default return values
			$tmSec = 0;
			$tmMin = 0;
			$tmHour = 0;
			$tmMday = 1;
			$tmMon = 1;
			$tmYear = 1900;
			$tmWday = 0;
			$tmYday = 0;
			
			$buffer = $date;
			$length = strlen($format);
			$lastc = null;
			
			for ($i = 0; $i < $length; $i++)
			{
				$c = $format[$i];
				
				//Remove spaces
				$buffer = ltrim($buffer);
				
				if ($lastc == '%')
				{
					switch ($c)
					{
						case 'A':
						case 'a':
							_strptime_match($buffer,_strptime_wdays($c));
							break;
							
						case 'B':
						case 'b':
						case 'h':
							$months = _strptime_months($c);
							$month = _strptime_match($buffer,$months);
							$tmMon = array_search($month,$months);
							break;
							
						case 'D':
							//Unsupported by strftime on Windows
							_strptime_match($buffer,'\d{2}\/\d{2}\/\d{2}');
							break;
							
						//case 'e':
						case 'd':
							$tmMday = intval(_strptime_match($buffer,'\d{2}'));
							break;
							
						case 'F':
							//Unsupported by strftime on Windows
							if ($ret = _strptime_match($buffer,'\d{4}-\d{2}-\d{2}'))
							{
								$frags = explode('-',$ret);
								$tmYear = intval($frags[0]);
								$tmMon = intval($frags[1]);
								$tmMday = intval($frags[2]);
							}
							break;
							
						case 'H':
							$tmHour = intval(_strptime_match($buffer,'\d{2}'));
							break;
							
						case 'M':
							$tmMin = intval(_strptime_match($buffer,'\d{2}'));
							break;
							
						case 'm':
							$tmMon = intval(_strptime_match($buffer,'\d{2}'));
							break;
							
						case 'S':
							$tmSec = intval(_strptime_match($buffer,'\d{2}'));
							break;
							
						case 'Y':
							$tmYear = intval(_strptime_match($buffer,'\d{4}'));
							break;
							
						case 'y':
							$year = intval(_strptime_match($buffer,'\d{2}'));
							if ($year < 69) {
								$tmYear = 2000 + $year;
							} else {
								$tmYear = 1900 + $year;
							}
							break;
							
					}
				}
				else {
					$buffer = ltrim($buffer,$c);
				}
				
				$lastc = $c;
			}
			
			//Date must exists!
			if (!checkdate($tmMon,$tmMday,$tmYear)) {
				return false;
			}
			
			//Clamp hours values
			$tmHour = _strptime_clamp($tmHour,0,23);
			$tmMin = _strptime_clamp($tmMin,0,59);
			$tmSec = _strptime_clamp($tmSec,0,61); //>59 = Leap seconds
			
			//Compute wday and yday
			$timestamp = mktime($tmHour,$tmMin,$tmSec,$tmMon,$tmMday,$tmYear);
			$tmWday = date('w',$timestamp);
			$tmYday = date('z',$timestamp);
			
			//Return
			$time = array();
			$time['tm_sec'] = $tmSec;
			$time['tm_min'] = $tmMin;
			$time['tm_hour'] = $tmHour;
			$time['tm_mday'] = $tmMday;
			$time['tm_mon'] = ($tmMon-1); //0-11
			$time['tm_year'] = ($tmYear-1900);
			$time['tm_wday'] = $tmWday;
			$time['tm_yday'] = $tmYday;
			$time['unparsed'] = $buffer; //Unparsed buffer
			return $time;
		}
	}

	function issetv($v,$nv) {
		return isset($v)?$v:$nv;
	}

	function isnullv($v,$nv) {
		return ($v==null)?$v:$nv;
	}

	/*
	 *	ifv	( [$cond1, $val1] [, $cond2, $val2].... [, $default ] );
	 */
	function ifv()	{
		$args=func_get_args();
		$argc=sizeof($args);
		if( $argc==0)
			trigger_error('ifv: required 1 arg at least');
		if( $argc==1 )	return $args[0];

		for ( $i=0; $i<$argc; $i+=2 )	{
			if( ! array_key_exists( $i+1 , $args ) )	return $args[$i];
			if( $args[$i] )
				return $args[$i+1];
		}
		if( $i>=$argc )
			trigger_error('ifv: default value required');
		return $args[$i];
	}

	function htaccess_var($uri,$htaccess=null)	{
		global $HTACCESS;
		$htaccess=($htaccess!=null)?$htaccess:((isset($HTACCESS))?$HTACCESS:'.htaccess');
		$WEB_CONFIG=array();
		$htls= file( dirname(apache_lookup_uri($uri)->filename)."/{$htaccess}" );
		foreach( $htls as $l )	{
			if($l[0]=='#')	continue;
			$_pattern="/^\s*setenv\s+(\S+)\s+(\"[^\"]*\"|\S*)\s*$/i";
			$quote_pattern="/^\"([^\"]*)\"$/i";
			if ( preg_match($_pattern,$l,$m) )	{
				if ( preg_match($quote_pattern,$m[2],$m2) )
					$WEB_CONFIG[$m[1]]=$m2[1];
				else
					$WEB_CONFIG[$m[1]]=$m[2];
			}
		}
		return $WEB_CONFIG;
	}

	function htaccess_php($uri,$htaccess=null)	{
		global $HTACCESS;
		$htaccess=($htaccess!=null)?$htaccess:((isset($HTACCESS))?$HTACCESS:'.htaccess');
		$PHP_CONFIG=array();
		$htls= file( dirname(apache_lookup_uri($uri)->filename)."/{$htaccess}" );
		foreach( $htls as $l )	{
			if($l[0]=='#')	continue;
			$_pattern="/^\s*php_value\s+(\S+)\s+(\"[^\"]*\"|\S*)\s*$/i";
			$_pattern2="/^\s*php_flag\s+(\S+)\s+(\"[^\"]*\"|\S*)\s*$/i";
			$quote_pattern="/^\"([^\"]*)\"$/i";
			if ( preg_match($_pattern,$l,$m) )	{
				if ( preg_match($quote_pattern,$m[2],$m2) )
					$PHP_CONFIG[$m[1]]=$m2[1];
				else
					$PHP_CONFIG[$m[1]]=$m[2];
			}	else if ( preg_match($_pattern2,$l,$m) )	{
				if ( preg_match($quote_pattern,$m[2],$m2) )
					$v=$m2[1];
				else
					$v=$m[2];
				if( $v=='on' || $v=='1' || $v=='true' )
					$v=1;
				else if( $v=='off' || $v=='0' || $v=='false' )
					$v=0;
				$PHP_CONFIG[$m[1]]=$v;
			}
		}
		return $PHP_CONFIG;
	}

	function file_extension($filename)	{
		$exts = split("[/\\.]", $filename) ;
		$n = count($exts)-1;
		$exts = $exts[$n];
		return $exts;
	}

	function ifnull($v,$nv) {
		return ($v==null)?$nv:$v;
	}
	function vd($v)	{
		echo '<pre>';
		var_dump($v);
		echo '</pre>';
	}

	function array_copy($arr) {
		$newArray = array();
		foreach($arr as $key => $value) {
			if(is_array($value)) $newArray[$key] = array_copy($value);
			elseif(is_object($value)) $newArray[$key] = clone $value;
			else $newArray[$key] = $value;
		}
		return $newArray;
	}
//	require_once('image.inc.php');
?>