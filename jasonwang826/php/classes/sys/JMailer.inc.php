<?
	require_once('PHPMailer_5.2.0/class.phpmailer.php');

	class JMailer extends PHPMailer	{

		const SERVICE_EMAIL = 'service.email';
		const SERVICE_EMAIL_NAME = 'service.email.name';
		protected $service_email='';
		protected $service_email_name='';

		public function __construct($exceptions = false) {
			parent::__construct($exceptions);
			$sysvar = new JTSysvar();
			$this->service_email = $sysvar->get(self::SERVICE_EMAIL);
			$this->service_email_name = $sysvar->get(self::SERVICE_EMAIL_NAME);
			$this->CharSet = "UTF-8";
			$this->IsHTML(true);
		}

		public function setFromAsService()	{
			return $this->SetFrom($this->service_email,$this->service_email_name);
		}
		public function AddURLEmbeddedImage($url, $cid, $filename = '', $encoding = 'base64', $type = 'application/octet-stream')	{
			$this->AddStringEmbeddedImage(file_get_contents($url), $cid, $filename, $encoding, $type );
		}
	}
?>