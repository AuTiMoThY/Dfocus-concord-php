<?php
	class JTSysvar extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'sysvar';
			parent::__construct( $update_user_id );
		}

		public function get($id)	{
			$this->select($id);
			return $this->data['value'];
		}

		public function set($id,$value)	{
			$this->select($id);
			$this->data['value']=$value;
			return $this->update();
		}
		public function insert()	{
			throw new Exception('JTWebImage::insert() permission denied');
		}
		public function delete()	{
			throw new Exception('JTWebImage::delete() permission denied');
		}
	}
?>