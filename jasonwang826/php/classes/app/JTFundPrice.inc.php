<?php
	class JTFundPrice extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'fundprice';
			parent::__construct( $update_user_id );
		}
		public function last()	{
			$sql = "SELECT *
					FROM `{$this->table}`
					ORDER BY `date` DESC
					LIMIT 0,1;";
			$r = parent::$db->queryFetch( $sql );
			if( $r===false )	return false;
			$this->select( $r->date );
			return true;
		}
		public function blank() {
			$r = (array) self::$db->queryBlank("SELECT * FROM  `{$this->table}` WHERE `date`=-1");
			$this->initBlank($r);
		}
		public function initBlank($r) {
			$r['date']=JDate::today();
			$r['price']=0;
			$this->data=$r;
			return $r;
		}
		public function select($date)	{
			$this->data = (array) 
				self::$db->queryFetch(
					"SELECT * FROM `{$this->table}` WHERE `date`=:date",
					array(':date'=>$date)
				);
		}
		public function insert()	{
			$sql="INSERT INTO `{$this->table}` (
				`date`,
				`price`
			) VALUES (
				:date,
				:price
			);";
			self::$db->doQuery($sql, array(':date'=>$this->data['date'],':price'=>$this->data['price']) );
			return $this->data['date'];
		}
		public function update()	{
			$sql="UPDATE `{$this->table}` SET
					`date`=:date,
					`price`=:price
				WHERE `date`=:date;";
			$stmt = self::$db->doQuery($sql, array(':date'=>$this->data['date'],':price'=>$this->data['price']) );
			return $stmt->rowCount();
		}
		public function delete()	{
			$sql = "DELETE FROM `{$this->table}` WHERE `date`=:date";
			$stmt = self::$db->doQuery($sql,array(':date'=>$this->data['date']));
			return $stmt->rowCount();
		}
		public function all($rownum=null, $withLast=false)	{
			$sql = "SELECT *
				FROM `{$this->table}`
				ORDER BY `date` DESC
				";
			if( $rownum!=null )	{
				if( $withLast )
					$sql .= "LIMIT 0,{$rownum}";
				else
					$sql .= "LIMIT 1,{$rownum}";
			}
			$rs = parent::$db->queryFetchAll( $sql );
			return $rs;
		}
	}
?>