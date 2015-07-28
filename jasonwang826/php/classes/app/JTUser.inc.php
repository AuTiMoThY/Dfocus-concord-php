<?php
	class JTUser extends JTable	{
		public function __construct( $update_user_id=null ) {
			$this->table = 'user';
			parent::__construct( $update_user_id );
		}
		public function initBlank($r) {
			$r['last_login']=null;
			parent::initBlank($r);
		}

		public function insert()	{
			$id = parent::insert();
			$fpath = apache_lookup_uri( $_SERVER['JASONWANG826_CONFIG']['CKEDITOR_USERFILE_ALIAS']."/" )->filename.'member/'.$id;
			if( !is_dir($fpath) && !file_exists($fpath) )
				mkdir( $fpath );
			return $id;
		}

		static public function isLogin()	{
			if( !isset($_SESSION['login_user_id']) )	return false;
			return true;
		}

		static public function loginUserID()	{
			if( !isset($_SESSION['login_user_id']) )	return null;
			return $_SESSION['login_user_id'];
		}

		static public function loginUser()	{
			if( !isset($_SESSION['login_user_id']) )	return null;
			$login_user = new JTUser();
			$login_user->select($_SESSION['login_user_id']);
			return $login_user;
		}
		static public function logout()	{
			unset($_SESSION['login_user_id']);
		}

		static public $errorID='';
		static public $errorMessage='';
		static public function loginFail( $acocunt, $errorID, $errorMessage )	{
			self::$errorID = $errorID;
			self::$errorMessage = $errorMessage;
		}

		static public function login( $account, $password )	{
			parent::connect();
			$r=self::byAccount( $account );
			if( !$r )	{
				self::loginFail( $account, 'loginfail-no-account', "登入失敗，查無此帳號" );
				return false;
			}
			if( $r->enable!='Y' )	{
				self::loginFail( $account, 'loginfail-account-disabled', "登入失敗，帳號已關閉" );
				return false;
			}
			if( $password!=$r->password )	{
				self::loginFail( $account, 'loginfail-password-incorrect', "登入失敗，密碼錯誤" );
				return false;
			}	else	{
				parent::$db->doQuery("UPDATE `user` SET last_login=NOW() WHERE `id`=:id", array(':id'=>$r->id));
				$_SESSION['login_user_id']=$r->id;
				return true;
			}
		}

		static public function byAccount( $account )	{
			parent::connect();
			$sql = "SELECT `user`.*
				FROM  `user`
				WHERE `user`.`account`=:account
				";
			return parent::$db->queryFetch( $sql, array( ':account'=>$account ) );
		}

		static public function isAccountExists( $account )	{
			$sql="SELECT `user`.`id`
								FROM `user`
								WHERE `user`.`account`=:account;";
			$r=parent::$db->queryFetch( $sql, array( ':account'=>$account ) );
			return ( $r!==false );
		}

		public function all()	{
			$sql = "SELECT *
				FROM `{$this->table}`
				WHERE `enable`='Y'
				ORDER BY `id` ASC";
			$rs = parent::$db->queryFetchAll( $sql );
			return $rs;
		}
	}
?>