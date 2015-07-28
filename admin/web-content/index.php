<?
	require_once('./local.inc');

	class JLocalControl extends JTemplateControl {
		public function _list() {
			$rs=array();
			$sql = "SELECT `web_content`.`id`
						,	`web_content`.`title`
					FROM `web_content`
					WHERE `web_content`.`id` LIKE '1%'
						ORDER BY `web_content`.`id`
				";
		//	list data
			$rs = $this->db->queryFetchAll( $sql );
			$smarty = $this->createSmarty();
			$smarty->assign( 'rs', $rs );
			$smarty->display( dirname(__FILE__).'/list.tpl.htm' );
		}
		function editView( $r )	{
			$smarty = $this->createSmarty();
			$smarty->assign('r',$r);
			$smarty->display(dirname(__FILE__).'/edit.tpl.htm');
		}
		public function _edit($id=null) {
			$id=($id==null)?$_GET['id']:$id;
			$r= new JTWebContent();
			$r->select($id);
			$this->editView( $r->data );
		}
		public function _update() {
			$r= new JTWebContent($_SESSION['login_user_id']);
			$r->select($_POST['id']);
			$r->setFields($_POST);
			$r->update();
			$this->addAlert(new JAlert('更新完成','告知訊息',"./?action=edit&id={$_POST['id']}"));
			$this->action('edit', $_POST['id']);
		}
	}
	$action = JUtil::issetv(@$_REQUEST['action'],'edit');
	$oa = new JLocalControl();
	$oa->action($action);
?>