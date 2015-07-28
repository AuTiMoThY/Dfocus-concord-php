<?
	class JControl {
		public $db;
		public $rsNotify=array();
		public $alert=null;
		public function __construct() {
			$this->dbconn();
		}
		public function dbconn() {
			$this->db = new JPDO();
		}
		public function action($action)	{
			$method = "_".str_replace('-','_',$action);
			$rsArg=func_get_args();
			array_shift($rsArg);
			return call_user_func_array(array($this,$method),$rsArg);
//			return $this->$method();
		}
		public function createSmarty()	{
			$smarty = new JSmartyTemplate();
			foreach ( $this->rsNotify as $n )	$smarty->append('notify',$n);
			if ( $this->alert!=null )	$smarty->assign('alert',$this->alert);
			return $smarty;
		}
		public function addNotify($n)	{
			$this->rsNotify[]=$n;
		}
		public function addAlert($alert)	{
			$this->alert = $alert;
		}
	}
?>