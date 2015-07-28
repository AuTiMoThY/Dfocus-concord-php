<?php
	class JTTrust extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'trust';
			$this->arrImageField = 
				array(
					'icon'	=>
						array(
							'id'			=>	'icon'	,
							'field'			=>	'icon'	,
							'prefix'		=>	'icon'	,
							'tdir'			=>	'/trust'	,
							'mode'			=>	'resize' ,	//	resize | null
							'width'			=>	600	,
							'height'		=>	410
						)
				);
			parent::__construct($update_user_id);
		}
		public function initBlank($r) {
			$r['icon']=null;
			$r['link']=null;
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