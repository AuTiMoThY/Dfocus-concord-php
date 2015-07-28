<?php
	class JTContactus extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'contactus';
			parent::__construct( $update_user_id );
		}
		public function initBlank($r) {
			$r['src']='三事業';
			$r['reply_date']=null;
			parent::initBlank($r);
		}
		public function all($src)	{
			$sql = "SELECT *
				FROM `{$this->table}`
				WHERE `src`=:src
				ORDER BY `id` ASC";
			return parent::$db->queryFetchAll( $sql, array(':src'=>$src) );
		}
	}
?>