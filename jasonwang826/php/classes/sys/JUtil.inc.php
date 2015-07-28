<?
	class JUtil	{
		static public function issetv($v,$nv) {
			return isset($v)?$v:$nv;
		}

		static public function isnullv($v,$nv) {
			return ($v==null)?$v:$nv;
		}

		static public function empty2null(&$v) {
			if( empty($v) )	$v=null;
		}

		/*
		 *	ifv	( [$cond1, $val1] [, $cond2, $val2].... [, $default ] );
		 */
		static public function ifv()	{
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

	}
?>