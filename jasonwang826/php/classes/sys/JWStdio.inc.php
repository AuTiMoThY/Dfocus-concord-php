<?
	class JWStdio	{
		static public function strip_truncate($str,$strwidth)	{
			$str = self::strip($str);
			return mb_strimwidth($str,0,$strwidth,'...','utf-8');
		}
		static public function strip($str)	{
			$str = strip_tags($str);
			$str = preg_replace('/\s+/', '', $str);
			return $str;
		}
		static public function location($url)	{
			header("location: {$url}");
			exit;
		}
		static public function fileExtension($fname)	{
			$filename = strtolower($fname) ;
			$exts = preg_split("/[\/\\\.]/", $filename) ;
			$n = count($exts)-1;
			$exts = $exts[$n];
			return $exts;
		}
		static public function moveUploadFile($src,$dest)	{
			return move_uploaded_file($src,$dest);
		}
		static public function URLDelete($url)	{
			$fname=self::URLfpath( $url );
			if( file_exists($fname) )	return unlink($fname);
			return false;
		}
		static public function URLfpath($url)	{
			return apache_lookup_uri( $url )->filename;
		}
		static public function imageResize($fname,$width,$height) {
			$i = new Image( $fname );
			$owhr=$i->getWidth()/$i->getHeight();
			$twhr=$width/$height;
			if( $owhr==$twhr )	{
				$i->resize( $width,$height );
			}	elseif( $owhr>$twhr )	{
				$i->resizeToHeight( $height );
				$i->crop( ($i->getWidth()-$width)/2, 0, $width, $height);
			}	else	{
				$i->resizeToWidth( $width );
				$i->crop( 0, ($i->getHeight()-$height)/2, $width, $height);
			}
			$i->save();
		}
		static public function alert($message,$url)	{
			?>
				<meta http-equiv='content-type' content='text/html; charset=UTF-8'>
				<script type="text/javascript">
				<!--
					alert('<?=$message?>');
					window.location.href='<?=$url?>';
				//-->
				</script>
			<?
			exit;
		}
		static public function error($message)	{
			echo $message;
		}
		static public function object2array($obj) {
			if(is_object($obj)) $obj = (array) $obj;
			if(is_array($obj)) {
				$new = array();
				foreach($obj as $key => $val) {
					$new[$key] = self::object2array($val);
				}
			}	else {
				$new = $obj;
			}
			return $new;
		}
		static public function array_by_key( $src, $keys) {
			$new = array();
			foreach($keys as $key) {
				if( array_key_exists($key,$src) )
					$new[$key] = $src[$key];
				else
					$new[$key] = null;
			}
			return $new;
		}
	}
?>