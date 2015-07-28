<?
	class Vercode	{
		public static function verify($instance_id,$vercode) {
		//	var_dump($_SESSION['vercode'][$instance_id]);
			if( !isset($_SESSION['vercode']) )	return false;
			if( !isset($_SESSION['vercode'][$instance_id]) )	return false;
			$vercodePass=$_SESSION['vercode'][$instance_id]->vercode;
			if( $_SESSION['vercode'][$instance_id]->case_sensitive=='N')	{
				$vercode=strtoupper($vercode);
				$vercodePass=strtoupper($vercodePass);
			}
			if(	$vercodePass!=$vercode )	return false;
			return true;
		}
		public static function clear() {
			$_SESSION['vercode']=array();
		}
		public static function generateInstance() {
			$i=0;
			while( isset( $_SESSION['vercode'][($instance_id=rand(0,1024))]) )	{
				if($i++>200) {
					throw new Exception('Vercode::generateInstance(): create instance_id fail!');
				}
			};
			return $instance_id;
		}
		public static function generateCode($acceptedChars, $stringlength) {
			$max = strlen($acceptedChars)-1;
			$vercode = NULL;
			for($i=0; $i < $stringlength; $i++) {
				$cnum[$i] = $acceptedChars{mt_rand(0, $max)};
				$vercode .= $cnum[$i];
			}
			return $vercode;
		}
		public static function setCode($instance_id,$vercode) {
			$_SESSION['vercode'][$instance_id]->vercode = $vercode;
		}
	}
?>