<?
	require_once('./local.inc');

	class JLocalControl extends JTemplateControl {
		public function _list() {
			$sql = "SELECT `faq_group`.*
					FROM `faq_group`
				";
			$rowPerPage = isset($_GET['_rowPerPage']) ? $_GET['_rowPerPage'] : 10;
			$pageNo = isset($_GET['_pageNo']) ? $_GET['_pageNo'] : 0;
			$arrOrderBy = isset($_GET['_orderBy']) ? $_GET['_orderBy'] : array('`faq_group`.`ord` ASC,`faq_group`.`id` DESC');
			$pager = $this->db->queryFetchPage( $sql, $pageNo, $rowPerPage, $arrOrderBy );
		//	list data
			$smarty = $this->createSmarty();
			$smarty->assign( 'pager', $pager );
			$smarty->assign( 'maxOrd', JTFAQGroup::getMaxOrd('faq_group') );
			$smarty->display( dirname(__FILE__).'/list.tpl.htm' );
		}
		function editView( $r, $maxOrd )	{
			$smarty = $this->createSmarty();
			$smarty->assign('r',$r);
			$smarty->assign('maxOrd',$maxOrd);
			$smarty->display(dirname(__FILE__).'/edit.tpl.htm');
		}
		public function _new() {
			$r= new JTFAQGroup();
			$maxOrd = $r->maxOrd()+1;
			$r->data['ord'] = $maxOrd;
			$this->editView( $r->data, $maxOrd );
		}
		public function _insert() {
			$r= new JTFAQGroup($_SESSION['login_user_id']);
			JUtil::empty2null($_POST['id']);
			$r->setFields($_POST);
			$id = $r->insert();
			$this->addAlert(new JAlert('新增完成','告知訊息',"./?action=edit&id={$id}"));
			$this->action('edit', $id);
		}
		public function _edit($id=null) {
			$id=($id==null)?$_GET['id']:$id;
			$r= new JTFAQGroup();
			$r->select($id);
			$this->editView( $r->data, $r->maxOrd() );
		}
		public function _update() {
			$r= new JTFAQGroup($_SESSION['login_user_id']);
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
					$r= new JTFAQGroup();
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
			$r= new JTFAQGroup($_SESSION['login_user_id']);
			$r->select( $_GET['id'] );
			$orgOrd = $r->data['ord'];
			$r->data['ord'] = $_GET['ord'];
			$r->setOrd( $orgOrd );
			die( json_encode($ret) );
		}
	}
	$action = JUtil::issetv(@$_REQUEST['action'],'list');
	$oa = new JLocalControl();
	$oa->action($action);
?>