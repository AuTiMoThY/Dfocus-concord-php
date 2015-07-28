<?php
	class JTable	{
		public $update_user_id = null;
		public function __construct( $update_user_id=null, $ordGroupBy=array() ) {
			self::connect();
			$this->update_user_id = $update_user_id;
			$this->ordGroupBy = $ordGroupBy;
			$this->blank();
		}
		static protected $db=null;
		static public function connect() {
			if(self::$db==null)
				self::$db = new JPDO();
		}

		public function count() {
			$r = self::$db->queryFetch("SELECT COUNT(*) AS `rowcount` FROM `{$this->table}`");
			return $r->rowcount;
		}

		public function blank() {
			$r = (array) self::$db->queryBlank("SELECT * FROM  `{$this->table}` WHERE `id`=-1");
			$this->initBlank($r);
		}

		public function initBlank($r) {
			$this->data=$r;
			$this->data['id']=null;
			if( isset($r['enable']) )	$this->data['enable']='Y';
			if( isset($r['ord']) )	$this->data['ord']=$this->maxOrd()+1;
			if( isset($r['cuser_id']) )	$this->data['cuser_id']=$this->update_user_id;
			if( isset($r['uuser_id']) )	$this->data['uuser_id']=$this->update_user_id;
			if( isset($r['cdate']) )	$this->data['cdate']=null;
			if( isset($r['udate']) )	$this->data['udate']=null;
			return $r;
		}
		public $table='table';
		public $data = array();
		public $arrIDField = array('id');

		/*
		 *	id : it could be associative array()
		 */
		public function select($id)	{
			$this->data = (array) 
				self::$db->queryFetch(
					"SELECT * FROM `{$this->table}` WHERE `id`=:id",
					array(':id'=>$id)
				);
		}

		public function setFields($r)	{
			foreach( $r as $k => $v )	{
				if( array_key_exists( $k, $this->data ) )	{
					$this->data[$k] = $v;
					if( $k=='cuser_id' )	$this->data[$k] = $this->update_user_id;
					if( $k=='uuser_id' )	$this->data[$k] = $this->update_user_id;
				}
			}
		}

		public function insert()	{
			$sql = "INSERT INTO `{$this->table}` (";
			$isFirst = true;
			$pdoData = array();
			foreach( $this->data as $k =>$v )	{
				$sql .= ($isFirst?'':',')."`{$k}`";
				$isFirst = false;
			}
			$sql .= ") VALUES (";
			$isFirst = true;
			foreach( $this->data as $k =>$v )	{
				if( $k=='cdate' || $k=='udate' )	{
					$sql .= ($isFirst?'':',')."NOW()";
				}	else	{
					$sql .= ($isFirst?'':',').":{$k}";
					$pdoData[$k] = $v;
				}
				$isFirst = false;
			}
			$sql .= ")";
			self::$db->doQuery($sql,$pdoData);
			if( empty($this->data['id']) )	{
				$this->data['id'] = self::$db->lastInsertId();
			}
			$this->updateImages();
			if( isset($this->data['ord']) )	$this->setOrd();
			return $this->data['id'];
		}

		public function update()	{
			$orgOrd = null;
			if( isset($this->data['ord']) )	{
				$r =
					self::$db->queryFetch(
						"SELECT `ord` FROM `{$this->table}` WHERE `id`=:id",
						array(':id'=>$this->data['id'])
					);
				if( !empty($r) )	$orgOrd = $r->ord;
			};
			$sql = "UPDATE `{$this->table}` SET ";
			$isFirst = true;
			$pdoData = array();
			foreach( $this->data as $k =>$v )	{
				if( $k=='cdate' || $k=='cuser_id' )	{
					continue;
				}	elseif( $k=='udate' )	{
					$sql .= ($isFirst?'':',')."`{$k}`=NOW()";
				}	else	{
					$sql .= ($isFirst?'':',')."`{$k}`=:{$k}";
					$pdoData[$k] = $v;
				}
				$isFirst = false;
			}
			$sql .= "WHERE `id`=:id";
			$pdoData[':id'] = $this->data['id'];
			$stmt = self::$db->doQuery($sql,$pdoData);
			$this->updateImages();
			if( isset($this->data['ord']) )	$this->setOrd($orgOrd);
			return $stmt->rowCount();
		}

		public function delete()	{
			$sql = "DELETE FROM `{$this->table}` WHERE `id`=:id";
			$pdoData[':id'] = $this->data['id'];
			$stmt = self::$db->doQuery($sql,$pdoData);
			$this->deleteImages();
			if( isset($this->data['ord']) )	$this->resortOrd();
			return $stmt->rowCount();
		}

		/*
		 *	ord
		 */
		public static function getMaxOrd( $table, $rsOrdKey=array() )	{
			$sql = "SELECT MAX(`ord`) AS `max_ord` FROM `{$table}` WHERE 1";
			$ordData = array();
			foreach( $rsOrdKey as $k=>$v )	{
				$sql .= " AND `{$k}`=:{$k}";
				$ordData[":{$k}"]=$v;
			}
			$max_ord=self::$db->queryFetchField( $sql , 'max_ord', $ordData );
			$max_ord=($max_ord===null)?0:$max_ord;
			return $max_ord;
		}

		public $ordGroupBy = array();
		public function maxOrd() {
			$sql = "SELECT MAX(`ord`) AS `max_ord` FROM `{$this->table}`";
			$ordData = array();
			$isFirst = true;
			foreach( $this->ordGroupBy as $ordKey )	{
				$sql .= ( $isFirst ? 'WHERE' : 'AND' )." `{$ordKey}`=:{$ordKey}";
				$ordData[":{$ordKey}"]=$this->data[$ordKey];
				$isFirst = false;
			}
			$max_ord=self::$db->queryFetchField( $sql , 'max_ord', $ordData );
			$max_ord=($max_ord===null)?0:$max_ord;
			return $max_ord;
		}

		public function setOrd( $org_ord=null )	{
			$sqlWhere = "";
			$ordData = array();
			$isFirst = true;
			foreach( $this->ordGroupBy as $ordKey )	{
				$sqlWhere .= ( $isFirst ? '' : 'AND' )." `{$ordKey}`=:{$ordKey}";
				$ordData[":{$ordKey}"]=$this->data[$ordKey];
				$isFirst = false;
			}
			$sqlWhere = empty($sqlWhere) ? "1" : $sqlWhere;
			if( $org_ord!=null && $org_ord < $this->data['ord'] )	$this->data['ord']++;
			$sql="UPDATE `{$this->table}` SET `ord`=`ord`+1 WHERE `ord`>=:ord AND ({$sqlWhere})";
			self::$db->doQuery( $sql, array_merge( array(':ord'=>$this->data['ord']), $ordData ) );
			$sql="UPDATE `{$this->table}` SET `ord`=:ord WHERE `id`=:id  AND ({$sqlWhere})";
			self::$db->doQuery($sql,
					array_merge(
						array(
							':id'	=>	$this->data['id']	,
							':ord'	=>	$this->data['ord']
						) ,
						$ordData
					)
				);
			$this->resortOrd();
		}

		public function resortOrd()	{
			$sqlWhere = "";
			$ordData = array();
			$isFirst = true;
			foreach( $this->ordGroupBy as $ordKey )	{
				$sqlWhere .= ( $isFirst ? '' : 'AND' )." `{$ordKey}`=:{$ordKey}";
				$ordData[":{$ordKey}"]=$this->data[$ordKey];
				$isFirst = false;
			}
			$sqlWhere = empty($sqlWhere) ? "1" : $sqlWhere;
			$rs=self::$db->queryFetchAll("SELECT `{$this->table}`.* FROM `{$this->table}` WHERE ({$sqlWhere}) ORDER BY `{$this->table}`.`ord` , `{$this->table}`.`id`", $ordData );
			$cord=1;
			foreach( $rs as $r )	{
				$sql="UPDATE `{$this->table}` SET `ord`=:ord WHERE `id`=:id;";
				self::$db->doQuery($sql,
					array(
						':id'	=>	$r->id	,
						':ord'	=>	$cord
					)
				);
				$cord++;
			}
		}

		/*
		 *	images
		 */
		public $arrImageField = array();
		public function updateImages()	{
			foreach( $this->arrImageField as $k=>$v )	{
				if( $v['mode']=='thumb' )	{
					if( !isset($_FILES[$v['thumb_source']]) )	continue;
					$f=$_FILES[$v['thumb_source']];
					if( $f['error']==UPLOAD_ERR_NO_FILE )	continue;	//
					if( $f['error']!=0 )	throw new Exception("JTable::updateImages error!({$k})");
					$source_fpath=$this->arrImageField[$v['thumb_source']]['target_fpath'];
					$fext=JWStdio::fileExtension($source_fpath);
					$target_url="{$_SERVER['JASONWANG826_CONFIG']['SYSFILE_ALIAS']}{$v['tdir']}/{$v['prefix']}.{$this->data['id']}.{$fext}";
					$target_fpath=JWStdio::URLfpath($target_url);
					copy($source_fpath,$target_fpath);
					JWStdio::imageResize($target_fpath,$v['width'],$v['height']);
				}	else	{
					if( !isset($_FILES[$k]) )	continue;
					$f=$_FILES[$k];
					if( $f['error']==UPLOAD_ERR_NO_FILE )	continue;	//
					if( $f['error']!=0 )	throw new Exception("JTable::updateImages error!({$k})");
					// remove org file
					if( isset($this->data[$k]) && !empty($this->data[$k]) )	JWStdio::URLDelete($this->data[$k]);
					$fext=JWStdio::fileExtension($f['name']);
					$target_url="{$_SERVER['JASONWANG826_CONFIG']['SYSFILE_ALIAS']}{$v['tdir']}/{$v['prefix']}.{$this->data['id']}.{$fext}";
					$target_fpath=JWStdio::URLfpath($target_url);
					JWStdio::moveUploadFile($f['tmp_name'],$target_fpath);
					if( $v['mode']=='resize' )	{
						JWStdio::imageResize($target_fpath,$v['width'],$v['height']);
					}	else if( $v['mode']=='resize-by' )	{
						JWStdio::imageResize($target_fpath,$this->data[$v['width']],$this->data[$v['height']]);
					}	else if( $v['mode']=='file' )	{
						//	file do nothing
					}	else	{
						throw new Exception("JTable::updateImages unsupported mode '{$v['mode']}'!({$k})");
					}
					$this->arrImageField[$k]['target_fpath'] = $target_fpath;
				}
				$sql="UPDATE `{$this->table}` SET
						`{$v['field']}`=:{$v['field']}
					WHERE `id`=:id;";
				self::$db->doQuery($sql, array('id'=>$this->data['id'],$v['field']=>$target_url) );
			}
		}

		public function deleteImages() {
			foreach( $this->arrImageField as $k=>$v )	{
				if( isset($this->data[$k]) && !empty($this->data[$k]) )	JWStdio::URLDelete($this->data[$k]);
			}
		}
	
	}
?>