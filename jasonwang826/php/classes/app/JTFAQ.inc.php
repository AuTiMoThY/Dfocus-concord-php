<?php
	class JTFAQ extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'faq';
			parent::__construct( $update_user_id, array('group_id') );
		}
		public function initBlank($r) {
			$r['group_id']=1;
			parent::initBlank($r);
		}
		public function all($group_id)	{
			$sql = "SELECT *
				FROM `{$this->table}`
				WHERE `enable`='Y'
					AND `group_id`=:group_id
				ORDER BY `ord` ASC";
			$rs = parent::$db->queryFetchAll( $sql, array(':group_id'=>$group_id) );
			return $rs;
		}
	}
?>