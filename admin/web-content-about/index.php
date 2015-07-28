<?
	require_once('./local.inc');

	class JLocalControl extends JTemplateControl {
		public function _edit() {
			$smarty = $this->createSmarty();
			$r= new JTWebContent();
			$r->select('about.choose');
			$smarty->assign('choose',$r->data);
			$r= new JTWebContent();
			$r->select('about.managed');
			$smarty->assign('managed',$r->data);
			$r= new JTWebContent();
			$r->select('about.fund');
			$smarty->assign('fund',$r->data);
			$r= new JTWebContent();
			$r->select('about.advisory');
			$smarty->assign('advisory',$r->data);
			$r= new JTWebContent();
			$r->select('about.preservation');
			$smarty->assign('preservation',$r->data);
			$smarty->display(dirname(__FILE__).'/edit.tpl.htm');
		}
		public function _update() {
			$r= new JTWebContent($_SESSION['login_user_id']);
			$r->select('about.choose');
			$r->data['content'] = $_POST['content']['choose'];
			$r->update();
			$r->select('about.managed');
			$r->data['content'] = $_POST['content']['managed'];
			$r->update();
			$r->select('about.fund');
			$r->data['content'] = $_POST['content']['fund'];
			$r->update();
			$r->select('about.advisory');
			$r->data['content'] = $_POST['content']['advisory'];
			$r->update();
			$r->select('about.preservation');
			$r->data['content'] = $_POST['content']['preservation'];
			$r->update();
			$this->addAlert(new JAlert('更新完成','告知訊息',"./?action=edit"));
			$this->action('edit');
		}
	}
	$action = JUtil::issetv(@$_REQUEST['action'],'edit');
	$oa = new JLocalControl();
	$oa->action($action);
?>