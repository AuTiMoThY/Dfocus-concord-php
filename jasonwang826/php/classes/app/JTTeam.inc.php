<?php
	class JTTeam extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'team';
			$this->arrImageField = 
				array(
					'photo'	=>
						array(
							'id'			=>	'photo'	,
							'field'			=>	'photo'	,
							'prefix'		=>	'photo'	,
							'tdir'			=>	'/team'	,
							'mode'			=>	'resize' ,	//	resize | thumb | null
							'width'			=>	1920	,
							'height'		=>	650
						) ,
					'thumb'	=>
						array(
							'id'			=>	'thumb'	,
							'field'			=>	'thumb'	,
							'prefix'		=>	'thumb'	,
							'tdir'			=>	'/team'	,
							'mode'			=>	'resize' ,	//	resize | thumb | null
							'width'			=>	555	,
							'height'		=>	700
						)
				);
			parent::__construct($update_user_id);
		}
		public function initBlank($r) {
			$r['photo']=null;
			$r['thumb']=null;
			parent::initBlank($r);
		}
		public function all($rownum=null)	{
			$sql = "SELECT *
				FROM `{$this->table}`
				WHERE `enable`='Y'
				ORDER BY `ord` ASC
				";
			if( $rownum!=null )	$sql .= "LIMIT 0,{$rownum}";
			return parent::$db->queryFetchAll( $sql );
		}
	}
?>