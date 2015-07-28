<?php
	require_once 'jasonwang826/jasonwang826.inc';
	$contactus = new JTContactus();
	$contactus->setFields($_POST);
	$id = $contactus->insert();
	JWStdio::alert('送出完成',$_POST['url'])
?>