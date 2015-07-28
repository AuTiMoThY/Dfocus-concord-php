<?
	include_once( './local.inc' );

	$fileRootList=array();
	if( JTUser::isLogin() )	{
		$loginUser = JTUser::loginUser();
		//
		//	member
		//
			$fileRootList[] =
				(object) array(
					'name'	=>
						'個人檔案庫' ,
					'writable'	=>
						true ,
					'deletedir'	=>
						true ,
					'url'	=>
						"{$_SERVER['JASONWANG826_CONFIG']['CKEDITOR_USERFILE_ALIAS']}member/{$loginUser->data['id']}/"
				);
			$fileRootList[] =
				(object) array(
					'name'	=>
						'管理者檔案庫' ,
					'writable'	=>
						true ,
					'deletedir'	=>
						true ,
					'url'	=>
						"{$_SERVER['JASONWANG826_CONFIG']['CKEDITOR_USERFILE_ALIAS']}admin/"
				);
	}
	$ret =
		(object) array(
			'options'	=>
				(object) array(
					'fileRootList'	=>	$fileRootList
				)
		);
	echo json_encode($ret);
?>