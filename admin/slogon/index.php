<?
	require_once('./local.inc');

	class JLocalControl extends JTemplateControl {
		public function _edit() {
			$smarty = $this->createSmarty();
			$r= new JTWebContent();
			$r->select('index.slogan');
			$smarty->assign('r',$r->data);
			$smarty->display(dirname(__FILE__).'/edit.tpl.htm');
		}
		public function _update() {
			$r= new JTWebContent($_SESSION['login_user_id']);
			$r->select('index.slogan');
			$r->setFields($_POST);
			$r->update();
			$this->addAlert(new JAlert('更新完成','告知訊息',"./?action=edit"));
			$this->action('edit');
		}
	}
	$action = JUtil::issetv(@$_REQUEST['action'],'edit');
	$oa = new JLocalControl();
	$oa->action($action);
?>