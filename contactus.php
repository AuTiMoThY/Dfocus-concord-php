<?php
	require_once 'jasonwang826/jasonwang826.inc';
	$contactus = new JTContactus();
	$contactus->setFields($_POST);
	$id = $contactus->insert();

	$contactus->select($id);
	//
	//	send to user
	//
		$sysvar = new JTSysvar();
		$mail = new JMailer();
		$mail->setFromAsService();
		$smartyMail = new JSmartyTemplate();
		$smartyMail->assign('openTo','user');
		$smartyMail->assign('r',$contactus);
		$mail->Body = $smartyMail->fetch('contactus.tpl.htm');
		$mail->Subject = "康和期貨經理事業 - 聯絡表單";
		$mail->AddAddress( $contactus->data['email'],$contactus->data['name'] );
		if( !$mail->Send() )	{
			JWStdio::error($mail->ErrorInfo);
			exit;
		}

	//
	//	from user to 管理者
	//
		$mail = new JMailer();
		if( !empty($contactus->data['email']) )	{
			$mail->AddReplyTo($contactus->data['email'],$contactus->data['name']);
		}
		$mail->setFromAsService();
		$smartyMail = new JSmartyTemplate();
		$smartyMail->assign('openTo','admin');
		$smartyMail->assign('r',$contactus);
		$mail->Body = $smartyMail->fetch('contactus.tpl.htm');
		$mail->Subject = "康和期貨經理事業 - 聯絡表單";
		$ru = new JTUser();
		$rsUser = $ru->all();
		foreach( $rsUser as $rUser )
			$mail->AddAddress( $rUser->email, $rUser->name );
		if( !$mail->Send() )	{
			JWStdio::error($mail->ErrorInfo);
			exit;
		}


	JWStdio::alert('送出完成',$_POST['url']);

?>