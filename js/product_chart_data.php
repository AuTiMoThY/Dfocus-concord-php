<?php
	require_once '../jasonwang826/jasonwang826.inc';

	$ret = array();
	$fp = new JTFundPrice();
	$rs = $fp->all();
	foreach( $rs as $d )	{
		$ret[] =
			(object) array(
				'date'	=>	$d->date,
				'dateCol'	=>	$d->date,
				'val'	=>	$d->price
			);
	}
	echo json_encode(array_reverse($ret));
?>