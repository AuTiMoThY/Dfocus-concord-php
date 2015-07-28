<?php
	class JTFAQGroup extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'faq_group';
			parent::__construct( $update_user_id );
		}
		public function all()	{
			$sql = "SELECT *
				FROM `{$this->table}`
				ORDER BY `ord` ASC";
			$rs = parent::$db->queryFetchAll( $sql );
			return $rs;
		}
	}
?>