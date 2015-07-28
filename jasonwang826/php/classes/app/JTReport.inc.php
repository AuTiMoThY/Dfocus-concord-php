<?php
	class JTReport extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'report';
			$this->arrImageField = 
				array(
					'icon'	=>
						array(
							'id'			=>	'icon'	,
							'field'			=>	'icon'	,
							'prefix'		=>	'icon'	,
							'tdir'			=>	'/report'	,
							'mode'			=>	'resize' ,	//	resize | null
							'width'			=>	270	,
							'height'		=>	185
						)
				);
			parent::__construct( $update_user_id, array('group_id') );
		}
		public function initBlank($r) {
			$r['group_id']=1;
			$r['month']=1;
			$r['icon']=null;
			$r['link']=null;
			parent::initBlank($r);
		}
		public function all($group_id)	{
			$sql = "SELECT *
				FROM `{$this->table}`
				WHERE `enable`='Y'
					AND `group_id`=:group_id
				ORDER BY `id` DESC";
			$rs = parent::$db->queryFetchAll( $sql, array(':group_id'=>$group_id) );
			return $rs;
		}
	}
?>