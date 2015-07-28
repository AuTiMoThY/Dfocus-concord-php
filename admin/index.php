<?
	require_once('./local.inc');
	$smarty = new JSmartyTemplate($templateName);
	$news = new JTNews();
	$smarty->assign('news_count', $news->count());
	$team = new JTTeam();
	$smarty->assign('team_count', $team->count());
	$advisory = new JTAdvisory();
	$smarty->assign('advisory_count', $advisory->count());
	$report = new JTReport();
	$smarty->assign('report_count', $report->count());
	$document = new JTDocument();
	$smarty->assign('document_count', $document->count());
	$saleschannel = new JTSaleschannel();
	$smarty->assign('saleschannel_count', $saleschannel->count());
	$faq = new JTFAQ();
	$smarty->assign('faq_count', $faq->count());
	$user = new JTUser();
	$smarty->assign('user_count', $user->count());
	$smarty->display(dirname(__FILE__).'/index.tpl.htm');
?>