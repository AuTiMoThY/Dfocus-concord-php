<?
	class JTemplateControl extends JControl {
		public $templateName;
		public function __construct() {
			parent::__construct();
			$this->templateName = isset($GLOBALS['templateName']) ? $GLOBALS['templateName'] : 'default';
		}
		public function createSmarty()	{
			$smarty = new JSmartyTemplate($this->templateName);
			foreach ( $this->rsNotify as $n )	$smarty->append('notify',$n);
			if ( $this->alert!=null )	$smarty->assign('alert',$this->alert);
			if ( isset($GLOBALS['page_title']) )	$smarty->assign( 'page_title', $GLOBALS['page_title'] );
			return $smarty;
		}
	}
?>