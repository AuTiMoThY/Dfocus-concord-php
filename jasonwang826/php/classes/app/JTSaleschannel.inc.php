<?php
	class JTSaleschannel extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'saleschannel';
			parent::__construct($update_user_id, array('category'));
		}
		public function initBlank($r) {
			$r['category']='銀行';
			$r['link']=null;
			parent::initBlank($r);
		}
		public function all($category)	{
			$sql = "SELECT *
				FROM `{$this->table}`
				WHERE `enable`='Y'
					AND `category`=:category
				ORDER BY `ord` ASC";
			$rs = parent::$db->queryFetchAll( $sql, array(':category'=>$category) );
			return $rs;
		}
	}
?>