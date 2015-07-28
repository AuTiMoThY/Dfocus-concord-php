<?
	require_once('./local.inc');

	class JLocalControl extends JTemplateControl {
		public function _edit() {
			$sysvar = new JTSysvar($_SESSION['login_user_id']);
			$smarty = $this->createSmarty();
			$smarty->assign('web_header_title',$sysvar->get('web.header.title'));
			$smarty->assign('web_header_keyword',$sysvar->get('web.header.keyword'));
			$smarty->assign('web_header_description',$sysvar->get('web.header.description'));
			$smarty->display(dirname(__FILE__).'/edit.tpl.htm');
		}
		public function _update() {
			$sysvar = new JTSysvar($_SESSION['login_user_id']);
			$sysvar->set( 'web.header.title', $_POST['web_header_title'] );
			$sysvar->set( 'web.header.keyword', $_POST['web_header_keyword'] );
			$sysvar->set( 'web.header.description', $_POST['web_header_description'] );
			$this->addAlert(new JAlert('更新完成','告知訊息',"./?action=edit"));
			$this->action('edit');
		}
	}
	$action = JUtil::issetv(@$_REQUEST['action'],'edit');
	$oa = new JLocalControl();
	$oa->action($action, 'web.doctor');
?>