<?
/*
 *		message : message
 *		type : info | error | success | warning ; default = info
 *		time : visible time in miliseconds; default = 5000
 */
	class JAlert	{
		public $message;
		public $title;
		public $url;
		public function __construct( $message, $title, $url=null ) {
			$this->message = $message;
			$this->title = $title;
			$this->url = $url;
		}
	}
?>