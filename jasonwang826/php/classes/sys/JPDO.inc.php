<?php
	class JPDO extends PDO	{
		static protected $arrConnConfig=array();
		/*
		 *	fpathConnConfig : file path to connection configuration, config.ini must has jdbo.inc file path to jpdo.ini
		 */
		static public function initConnFactory($fpathConnConfig)	{
		//	
			self::$arrConnConfig = parse_ini_file($fpathConnConfig,true);
		}

		/*
		 *	connConfigName : name of connect
		 */
		public function __construct($connConfigName='default')	{
			if( !isset(self::$arrConnConfig[$connConfigName]) )	throw new Exception("JPDO Exception : connConfigName '{$connConfigName}' does not exist!");
			$connConfig=self::$arrConnConfig[$connConfigName];
			if( !isset($connConfig['dsn']) )	throw new Exception("JPDO Exception : in connConfig '{$connConfigName}', 'dsn' should has been set!");
			if( !isset($connConfig['user']) )	throw new Exception("JPDO Exception : in connConfig '{$connConfigName}', 'user' should has been set!");
			if( !isset($connConfig['password']) )	throw new Exception("JPDO Exception : in connConfig '{$connConfigName}', 'password' should has been set!");
			$attr=array();
			if( isset($connConfig['persistent_connection']) && $connConfig['persistent_connection']=='Y' )	{
				$attr[PDO::ATTR_PERSISTENT] = true;
				$attr[PDO::ATTR_AUTOCOMMIT] = true;
			}
			try	{
				@parent::__construct( $connConfig['dsn'], $connConfig['user'], $connConfig['password'], $attr );
			}	catch(PDOException $e)	{
				print "DB Error: ".$e->getMessage()."<br />";
			}
			$this->query("SET NAMES 'utf8';");
		}

		public function doQuery($sql,$bindValues=array(),$auto_prepend_colon=true)	{
			if( empty($bindValues) )	{
				$stmt = $this->query($sql);
				if( !$stmt )	$this->errorHandling('query',array(),array('sql'=>$sql));
			}	else	{
				$bindValuesReal = array();
				if($auto_prepend_colon)	{
					foreach($bindValues as $i=>$v)	{
						$key=$i;
						if($i[0]!=':')	$key=':'.$i;
						$bindValuesReal[$key]=$v;
					}
				}	else	{
					$bindValuesReal = $bindValues;
				}
				//
				//	bind array with list
				//
					foreach($bindValuesReal as $k=>$v)	{
						if( is_array($v) )	{
							if( !preg_match('/'.$k.'\b/i',$sql) )
								$this->errorHandling('doQuery execute',array("Bind array fail! SQL '{$sql}' has no '{$k}' inside"),array('sql'=>$sql,'data'=>$bindValues) );
							$bindArrayValues = array();
							$bindArrayNewKeys = array();
							foreach( $v as $i=>$r )	{
								$newKey = $k.'_'.$i;
								$bindArrayValues[$newKey] = $r;
								$bindArrayNewKeys[] = $newKey;
							}

							$replaceSQL = implode(' , ', $bindArrayNewKeys);
							$sql = preg_replace( '/'.$k.'\b/i' ,$replaceSQL ,$sql );
							unset( $bindValuesReal[$k] );
							$bindValuesReal = array_merge( $bindValuesReal, $bindArrayValues );
						}
					}
				//
				//	execute SQL
				//
					$stmt = $this->prepare($sql);
					if( !$stmt )	$this->errorHandling('doQuery prepare',$stmt->errorInfo(),array('sql'=>$sql,'data'=>$bindValues));
					if( !($stmt->execute($bindValuesReal)) )
						$this->errorHandling('doQuery execute',$stmt->errorInfo(),array('sql'=>$sql,'data'=>$bindValues));
			}
			return $stmt;
		}

		public function queryFetchAll($sql,$bindValues=array(),$auto_prepend_colon=true)	{
			$stmt=$this->doQuery($sql,$bindValues,$auto_prepend_colon);
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		public function queryFetch($sql,$bindValues=array(),$auto_prepend_colon=true)	{
			$stmt=$this->doQuery($sql,$bindValues,$auto_prepend_colon);
			return $stmt->fetch(PDO::FETCH_OBJ);
		}

		public function queryRowNum($sql,$bindValues=array(),$auto_prepend_colon=true)	{
			$sql = "SELECT COUNT(*) AS `rownum` FROM ({$sql}) AS `src`;";
			$r = $this->queryFetch($sql,$bindValues,$auto_prepend_colon);
			return $r->rownum;
		}

		public function queryFetchField($sql,$fieldName,$bindValues=array(),$auto_prepend_colon=true)	{
			$r=$this->queryFetch($sql,$bindValues,$auto_prepend_colon);
			return ($r===false)?false:$r->$fieldName;
		}

		public function queryFetchAllField($sql,$fieldName,$bindValues=array(),$auto_prepend_colon=true)	{
			$rs=$this->queryFetchAll($sql,$bindValues,$auto_prepend_colon);
			$ret = array();
			foreach( $rs as $r )	$ret[]=$r->$fieldName;
			return $ret;
		}

		public function queryFetchPage($sql,$pageNo,$rowPerPage,$arrOrderBy=array(),$bindValues=array(),$auto_prepend_colon=true)	{
			if( !empty($arrOrderBy) )	{
				$orderBy = implode(',',$arrOrderBy);
				$sql = "{$sql}
					ORDER BY {$orderBy}";
			}
			$rowNum = $this->queryRowNum( $sql,$bindValues,$auto_prepend_colon );
			if( !empty($rowPerPage) )	{
				$offset = $rowPerPage * $pageNo;
				$sql = "{$sql}
					LIMIT {$offset}, {$rowPerPage}";
			}
			$stmt=$this->doQuery($sql,$bindValues,$auto_prepend_colon);
			return new JPDOPager( $stmt->fetchAll(PDO::FETCH_OBJ), $rowNum, $rowPerPage, $pageNo, $arrOrderBy );
		}

		public function queryBlank($sql,$bindValues=array(),$auto_prepend_colon=true)	{
			$stmt=$this->doQuery($sql,$bindValues,$auto_prepend_colon);
			$rc=$stmt->columnCount();
			$r = new stdClass();
			for( $i=0; $i<$rc; $i++ )	{
				$cm = $stmt->getColumnMeta($i);
				switch($cm['pdo_type'])	{
					case PDO::PARAM_BOOL :
						$r->$cm['name']=0;
						break;
					case PDO::PARAM_NULL :
						$r->$cm['name']=null;
						break;
					case PDO::PARAM_INT :
						$r->$cm['name']=0;
						break;
					case PDO::PARAM_STR :
						$r->$cm['name']='';
						break;
					case PDO::PARAM_LOB :
						$r->$cm['name']='';
						break;
					case PDO::PARAM_STMT :
						$r->$cm['name']='';
						break;
				}
			}
			return $r;
		}

		public function errorHandling($where='',$stmtErrorInfo=array(), $extraInfo=array() )	{
			$msg = "JPDO.errorHandling() : {$where}\n".print_r($this->errorInfo(),true);
			if( !empty($stmtErrorInfo) )	$msg .= "\n".print_r($stmtErrorInfo,true);
			if( !empty($extraInfo) )	$msg .= "\n".print_r($extraInfo,true);
			throw new Exception($msg);
		}
	}

?>