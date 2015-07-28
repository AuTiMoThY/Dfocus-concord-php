<?
	require_once('./local.inc');

	class JLocalControl extends JTemplateControl {
		public function _list() {
			$data=array();
			$type = isset($_GET['type']) ? $_GET['type'] : '';
			$where_type = (empty($type))? '1' : "`news`.`type`=:type";
			$data[':type']=$type;
			$sql = "SELECT `news`.*
					FROM `news`
					WHERE ({$where_type})
				";
			$rowPerPage = isset($_GET['_rowPerPage']) ? $_GET['_rowPerPage'] : 10;
			$pageNo = isset($_GET['_pageNo']) ? $_GET['_pageNo'] : 0;
			$arrOrderBy = isset($_GET['_orderBy']) ? $_GET['_orderBy'] : array('`news`.`date` DESC');
			$pager = $this->db->queryFetchPage( $sql, $pageNo, $rowPerPage, $arrOrderBy ,$data );
		//	list data
			$smarty = $this->createSmarty();
			$smarty->assign( 'pager', $pager );
			$smarty->assign( 'type', $type );
			$smarty->display( dirname(__FILE__).'/list.tpl.htm' );
		}
		function editView( $r )	{
			$smarty = $this->createSmarty();
			$smarty->assign('r',$r);
			$smarty->display(dirname(__FILE__).'/edit.tpl.htm');
		}
		public function _new() {
			$r= new JTNews();
			$this->editView( $r->data );
		}
		public function _insert() {
			$r= new JTNews($_SESSION['login_user_id']);
			JUtil::empty2null($_POST['id']);
			$r->setFields($_POST);
			$id = $r->insert();
			$this->addAlert(new JAlert('新增完成','告知訊息',"./?action=edit&id={$id}"));
			$this->action('edit', $id);
		}
		public function _edit($id=null) {
			$id=($id==null)?$_GET['id']:$id;
			$r= new JTNews();
			$r->select($id);
			$this->editView( $r->data );
		}
		public function _update() {
			$r= new JTNews($_SESSION['login_user_id']);
			$r->select($_POST['id']);
			$r->setFields($_POST);
			$r->update();
			$this->addAlert(new JAlert('更新完成','告知訊息',"./?action=edit&id={$_POST['id']}"));
			$this->action('edit', $_POST['id']);
		}
		public function _delete() {
			//	check data
				$arrId = array();
				if( is_array($_REQUEST['ids']) )	{
					$arrId = $_REQUEST['ids'];
				}	else	{
					$arrId[] = $_REQUEST['ids'];
				}
				foreach( $arrId as $id )	{
					$r= new JTNews();
					$r->select($id);
				//	delete data
					$r->delete();
				}

			//	list data
				$this->addAlert(new JAlert('刪除完成','告知訊息',"./"));
				$this->action('list');
		}
		public function _ord() {
			$ret=new stdClass();
			$ret->success=true;
			$r= new JTNews($_SESSION['login_user_id']);
			$r->select( $_GET['id'] );
			$orgOrd = $r->data['ord'];
			$r->data['ord'] = $_GET['ord'];
			$r->setOrd( $orgOrd );
			die( json_encode($ret) );
		}
		public function _enable() {
			$ret=new stdClass();
			$ret->success=true;
			$r= new JTNews($_SESSION['login_user_id']);
			$r->select( $_GET['id'] );
			$r->data['enable'] = $_GET['enable'];
			$r->update();
			die( json_encode($ret) );
		}
	}
	$action = JUtil::issetv(@$_REQUEST['action'],'list');
	$oa = new JLocalControl();
	$oa->action($action);
?>