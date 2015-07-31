<?php
	class JTDocument extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'document';
			$this->arrImageField = 
				array(
					'fpath'	=>
						array(
							'id'			=>	'fpath'	,
							'field'			=>	'fpath'	,
							'prefix'		=>	'fpath'	,
							'tdir'			=>	'/document'	,
							'mode'			=>	'file'
						)
				);
			parent::__construct( $update_user_id, array('category') );
		}
		public function initBlank($r) {
			$r['category']='開戶文件';
			$r['fpath']=null;
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