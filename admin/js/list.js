$(function(e){
	function listChange($list, type, name, val)	{
		var ocurl=$.url.parse(window.location.href);
		var curl =
			{
				'path' : ocurl.path ,
				'params' : (typeof(ocurl.params)=='undefined') ? {} : ocurl.params
			};
		switch(type)	{
			case 'pager' :
				curl.params._pageNo=val;
				break;
			case 'search' :
				curl.params[name]=val;
				break;
			case 'reload' :
				window.location.reload();
				return;
				break;
		}
		window.location = $.url.build(curl);
	}

	var $t=$('.list')
		.each(
			function(i,e)	{
				var $t = $(this);
				var $list = $(this);
				$t
					.find('.pager')
					.each(
						function(i,e)	{
							var $t = $(this);
							$t
								.find('.goto-page')
								.change(
									function(e)	{
										var $t = $(this);
										listChange($list,'pager','goto-page',$t.val());
									}
								);
							$t
								.find('li[pageno]')
								.click(
									function(e)	{
										var $t = $(this);
										if( $t.hasClass('disable') )	return;
										if( $t.hasClass('current') )	return;
										listChange($list,'pager','pageno',$t.attr('pageno'));
									}
								);
						}
					);
				$t
					.find('ul.search .search')
					.change(
						function(e)	{
							var $t = $(this);
							listChange($list,'search',$t.attr('name'),$t.val());
						}
					);

				$t
					.find('.ord')
					.each(
						function(e)	{
							var $tord = $(this);
							var vDataID = $tord.data('id');
							var vMaxOrd = $tord.data('maxord');
							var vValue = $tord.data('value');
							var vName = $tord.data('name');
							var vAjaxUrl = $tord.data('ajax');
							var $ord=$('<select></select>');
							if( typeof(vName)!='undefined' )	$ord.attr('name',vName);
							for( var i=1; i<=vMaxOrd; i++ )	{
								$ord.append($('<option />').val(i).text(i));
							}
							if( typeof(vAjaxUrl)!='undefined' )	$ord.data('ajax',vAjaxUrl);
							$ord.data('id',vDataID);
							$ord.val(vValue);
							$ord.change(function(e){
								var $sord = $(this);
								var vDataID = $sord.data('id');
								var vAjaxUrl = $sord.data('ajax');
								if( typeof(vAjaxUrl)=='undefined' )	vAjaxUrl='./';
								var ajaxData =
									{
										'action' :	'ord' ,
										'id' :	vDataID ,
										'ord' :	$sord.val()
									};
								$.getJSON( vAjaxUrl, ajaxData,
									function(d){
										if( !d.success )	return $.alert( d.message );
										listChange($list,'reload');
									}
								);
							});
							$tord.append($ord);
						}
					);
				$t
					.find('.enable')
					.click(
						function(e)	{
							var $tenable = $(this);
							var vDataID = $tenable.data('id');
							var vToValue = $tenable.data('tovalue');
							var vAjaxUrl = $tenable.data('ajax');
							if( typeof(vAjaxUrl)=='undefined' )	vAjaxUrl='./?action=enable';
							$.getJSON( vAjaxUrl, {
									'id' : vDataID	,
									'enable' : vToValue
								},
								function(d){
									if( !d.success )	return $.alert( d.message );
									listChange($list,'reload');
								}
							);
						}
					);
			}
		);
})
