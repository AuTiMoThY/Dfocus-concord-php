<?php
	class JTNews extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'news';
			$this->arrImageField = 
				array(
					'icon'	=>
						array(
							'id'			=>	'icon'	,
							'field'			=>	'icon'	,
							'prefix'		=>	'icon'	,
							'tdir'			=>	'/news'	,
							'mode'			=>	'resize' ,	//	resize | null
							'width'			=>	410	,
							'height'		=>	290
						)
				);
			parent::__construct($update_user_id);
		}
		public function initBlank($r) {
			$r['type']='圖文';
			$r['date']=JDate::today();
			$r['icon']=null;
			parent::initBlank($r);
		}
		public function latest($rownum, $type=null)	{
			$where_type = ($type==null) ? '1' : "`type`='{$type}'";
			$sql = "SELECT *
					FROM `{$this->table}`
					WHERE `enable`='Y'
						AND ({$where_type})
					ORDER BY `date` DESC, `id` DESC
					LIMIT 0,{$rownum};";
			$rs = parent::$db->queryFetchAll( $sql );
			return $rs;
		}
		public function last($type=null)	{
			$where_type = ($type==null) ? '1' : "`type`='{$type}'";
			$sql = "SELECT `id`
					FROM `{$this->table}`
					WHERE `enable`='Y'
						AND ({$where_type})
					ORDER BY `date` DESC, `id` DESC
					LIMIT 0,1;";
			$r = parent::$db->queryFetch( $sql );
			if( $r===false )	return false;
			$this->select( $r->id );
			return true;
		}
		public function next($type=null)	{
			$where_type = ($type==null) ? '1' : "`type`='{$type}'";
			$sql = "SELECT `id`
					FROM `{$this->table}`
					WHERE `enable`='Y'
						AND ({$where_type})
						AND
							(
								`date`>:date
							OR
								(
									`date`=:date
								AND `id`>:id
								)
							)
					ORDER BY `date` ASC, `id` ASC
					LIMIT 0,1;";
			$r = parent::$db->queryFetch( $sql, array(':date'=>$this->data['date'],':id'=>$this->data['id']) );
			if( $r===false )	return false;
			$this->select( $r->id );
			return true;
		}
		public function prev($type=null)	{
			$where_type = ($type==null) ? '1' : "`type`='{$type}'";
			$sql = "SELECT `id`
					FROM `{$this->table}`
					WHERE `enable`='Y'
						AND ({$where_type})
						AND
							(
								`date`<:date
							OR
								(
									`date`=:date
								AND `id`<:id
								)
							)
					ORDER BY `date` DESC, `id` DESC
					LIMIT 0,1;";
			$r = parent::$db->queryFetch( $sql, array(':date'=>$this->data['date'],':id'=>$this->data['id']) );
			if( $r===false )	return false;
			$this->select( $r->id );
			return true;
		}
		public function first($type=null)	{
			$where_type = ($type==null) ? '1' : "`type`='{$type}'";
			$sql = "SELECT `id`
					FROM `{$this->table}`
					WHERE `enable`='Y'
						AND ({$where_type})
					ORDER BY `date` ASC, `id` ASC
					LIMIT 0,1;";
			$r = parent::$db->queryFetch( $sql );
			if( $r===false )	return false;
			$this->select( $r->id );
			return true;
		}
	}
?>