<?
	require_once( './local.inc' );

	$f=apache_lookup_uri( $_GET['fpath'] )->filename;
	$filename=basename($f);
	$fname = iconv('utf-8','big5',$_GET['fname']).".".JWStdio::fileExtension($filename);

	header( "Content-Type: application/octet-stream" );
	header( 'Content-Disposition: attachment; filename="' . $fname . '"' );
	header( 'Pragma: no-cache' );

	readfile( $f );
?>