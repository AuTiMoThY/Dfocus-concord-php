<?php
	class JTSlide extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'slide';
			$this->arrImageField = 
				array(
					'fpath'	=>
						array(
							'id'			=>	'fpath'	,
							'field'			=>	'fpath'	,
							'prefix'		=>	'fpath'	,
							'tdir'			=>	'/slide'	,
							'mode'			=>	'resize' ,	//	resize | thumb | null
							'width'			=>	1920	,
							'height'		=>	857
						) ,
					'thumb'	=>
						array(
							'id'			=>	'thumb'	,
							'field'			=>	'thumb'	,
							'prefix'		=>	'thumb'	,
							'tdir'			=>	'/slide'	,
							'mode'			=>	'thumb' ,	//	resize | thumb | null
							'thumb_source'	=>	'fpath' ,
							'width'			=>	384	,
							'height'		=>	170
						)
				);
			parent::__construct($update_user_id);
		}
		public function initBlank($r) {
			$r['fpath']=null;
			$r['thumb']=null;
			parent::initBlank($r);
		}
		public function all()	{
			$sql = "SELECT *
				FROM `{$this->table}`
				WHERE `enable`='Y'
				ORDER BY `ord` ASC";
			return parent::$db->queryFetchAll( $sql );
		}
	}
?>