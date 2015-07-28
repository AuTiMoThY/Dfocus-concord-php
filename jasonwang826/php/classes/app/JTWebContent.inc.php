<?php
	class JTWebContent extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'web_content';
			parent::__construct( $update_user_id );
		}
		public function insert()	{
			throw new Exception('JTWebContent::insert() permission denied');
		}
		public function delete()	{
			throw new Exception('JTWebContent::delete() permission denied');
		}
	}
?>