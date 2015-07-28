<?php
	class JTAdvisory extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'advisory';
			$this->arrImageField = 
				array(
					'icon'	=>
						array(
							'id'			=>	'icon'	,
							'field'			=>	'icon'	,
							'prefix'		=>	'icon'	,
							'tdir'			=>	'/advisory'	,
							'mode'			=>	'resize' ,	//	resize | null
							'width'			=>	390	,
							'height'		=>	260
						)
				);
			parent::__construct($update_user_id);
		}
		public function initBlank($r) {
			$r['price']=null;
			$r['icon']=null;
			parent::initBlank($r);
		}
		public function all()	{
			$sql = "SELECT *
				FROM `{$this->table}`
				WHERE `enable`='Y'
				ORDER BY `ord` ASC";
			$rs = parent::$db->queryFetchAll( $sql );
			return $rs;
		}
	}
?>