<?php
	class JTReportGroup extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'report_group';
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