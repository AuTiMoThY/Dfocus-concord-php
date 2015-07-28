var jasonwang826 = {
		UILangText :
			{
				'alertTitle' : '警告訊息' ,
				'confirmTitle' : '確認訊息' ,
				'confirmYesLabel' : '是' ,
				'confirmNoLabel' : '否' ,
				'promptTitle' : '提示輸入' ,
				'promptYesLabel' : '是' ,
				'promptNoLabel' : '否'
			} ,
		regexpFileExt : /^\/[\-\.\?\/\&\=\%a-zA-Z0-9_]+$/
	}
/*
 *	$.alert({...});
 *		title : title, default = jasonwang826.UILangText.alertTitle
 *		message : message
 *		width : width of dialog
 *		icon : alert | info | notice | help | none
 *		close : function to run on dialog close.
 *			function()
 */
	$.alert = function( message, p_title, p_width, p_close, p_icon )	{
		var v_title='';
		var v_message=message;
		var v_width=300;
		var v_close=null;
		var dicon='alert';
		var option={};
		if( typeof message=='object' )	{
			option=message;
			v_title=(option.title===undefined)?jasonwang826.UILangText.alertTitle:option.title;
			v_message=(option.message===undefined)?'':option.message;
			v_width=(option.width===undefined)?v_width:option.width;
			dicon=(option.icon===undefined)?'alert':option.icon;
			v_close=(option.close===undefined)?null:option.close;
		}	else	{
			v_title=(p_title===undefined)?jasonwang826.UILangText.alertTitle:p_title;
			v_width=(p_width===undefined)?v_width:p_width;
			dicon=(p_icon===undefined)?'alert':p_icon;
			v_close=(p_close===undefined)?null:p_close;
		}
		var $div=$('<div></div>').attr('title',v_title);
		var ui_icon='';
		if(dicon=='none')	{
			ui_icon='';
		}	else if( dicon.match(jasonwang826.regexpFileExt) )	{
			ui_icon='<span class="ui-icon" style="float:left; margin:0px 7px 10px 0px;background-image: url('+dicon+');"></span>';
		}	else	{
			ui_icon='<span class="ui-icon ui-icon-'+dicon+'" style="float:left; margin:0px 7px 10px 0px;"></span>';
		}
		$div.append( '<table border="0"><tr><td width="28" valign="top">'+ui_icon+'</td><td valign="top">'+v_message+'</td></tr></table>' );
		$div.dialog({
				width: v_width,
				modal: true,
				show: {
					effect: "bounce",
					duration: 500
				},
				open: function(event, ui) {
						$('.jasonwang826-hide-when-popup').each(function(i,ele)	{
								var $t=$(this);
								$t.data('jasonwang826-hide-when-popup',$t.is(':visible'));
								$t.hide();
							});
					},
				close: function(event, ui) {
						if(v_close!==null)	v_close();
						$('.jasonwang826-hide-when-popup').each(function(i,ele)	{
								var $t=$(this);
								var visible=$t.data('jasonwang826-hide-when-popup');
								if(visible)	$t.show();
							});
					},
				buttons: {
					Ok: function() {
						$( this ).dialog( "close" );
					}
				}
			});
	};

/*
 *	$.confirm({...});
 *		title : title, default = jasonwang826.UILangText.alertTitle
 *		message : message
 *		width : width of dialog
 *		icon : alert | info | notice | help | none
 *		yesLabel : the label show on yes button, default = jasonwang826.UILangText.confirmYesLabel
 *		noLabel : the label show on no button, default = jasonwang826.UILangText.confirmnoLabel
 *		confirm : function to run when confirm.
 *			function()
 *		cancel : function to run when cancel.
 *			function()
 */
	$.confirm=function( option )	{
		var title=(option.title===undefined)?jasonwang826.UILangText.confirmTitle:option.title;
		var message=option.message;
		var dwidth=(option.width===undefined)?300:option.width;
		var dicon=(option.icon===undefined)?'help':option.icon;
		var yes_label=(option.yesLabel===undefined)?jasonwang826.UILangText.confirmYesLabel:option.yesLabel;
		var no_label=(option.noLabel===undefined)?jasonwang826.UILangText.confirmNoLabel:option.noLabel;
		var dconfirm=(option.confirm===undefined)?null:option.confirm;
		var dcancel=(option.cancel===undefined)?null:option.cancel;
		/*
			alert 		info 		notice 		help 		none
		*/
		var $div=$('<div></div>').attr('title',title);
		var ui_icon='';
		if(dicon=='none')	{
			ui_icon='';
		}	else if( dicon.match(jasonwang826.regexpFileExt) )	{
			ui_icon='<span class="ui-icon" style="float:left; margin:0px 7px 10px 0px;background-image: url('+dicon+');"></span>';
		}	else	{
			ui_icon='<span class="ui-icon ui-icon-'+dicon+'" style="float:left; margin:0px 7px 10px 0px;"></span>';
		}
		$div.append( '<table border="0"><tr><td width="28" valign="top">'+ui_icon+'</td><td valign="top">'+message+'</td></tr></table>' );
		$div.dialog({
				width: dwidth,
				modal: true,
				show: {
					effect: "bounce",
					duration: 500
				},
				open: function(event, ui) {
						$('.jasonwang826-hide-when-popup').each(function(i,ele)	{
								var $t=$(this);
								$t.data('jasonwang826-hide-when-popup',$t.is(':visible'));
								$t.hide();
							});
					},
				close: function(event, ui) {
						$('.jasonwang826-hide-when-popup').each(function(i,ele)	{
								var $t=$(this);
								var visible=$t.data('jasonwang826-hide-when-popup');
								if(visible)	$t.show();
							});
					},
				buttons:
					[
						{
							text: yes_label,
							click: function () {
								$( this ).dialog( "close" );
								if( dconfirm!=null )	dconfirm();
							}
						},
						{
							text: no_label,
							click: function () {
								$( this ).dialog( "close" );
								if( dcancel!=null )	dcancel();
							}
						}
					]
			});
	}

/*
 *	$.prompt({...});
 *		title : title, default = jasonwang826.UILangText.alertTitle
 *		message : message
 *		width : width of dialog
 *		icon : alert | info | notice | help | none
 *		yesLabel : the label show on yes button, default = jasonwang826.UILangText.confirmYesLabel
 *		noLabel : the label show on no button, default = jasonwang826.UILangText.confirmnoLabel
 *		prompt : function to run when confirm prompt.
 *			function(input_text)
 *		cancel : function to run when cancel.
 *			function()
 */
	$.prompt=function( option )	{
		var title=(option.title===undefined)?jasonwang826.UILangText.promptTitle:option.title;
		var message=option.message;
		var dwidth=(option.width===undefined)?300:option.width;
		var dicon=(option.icon===undefined)?'help':option.icon;
		var yes_label=(option.yesLabel===undefined)?jasonwang826.UILangText.promptYesLabel:option.yesLabel;
		var no_label=(option.noLabel===undefined)?jasonwang826.UILangText.promptNoLabel:option.noLabel;
		var dprompt=(option.prompt===undefined)?null:option.prompt;
		var dcancel=(option.cancel===undefined)?null:option.cancel;
		var $div=$('<div></div>').attr('title',title);
		var ui_icon='';
		if(dicon=='none')	{
			ui_icon='';
		}	else if( dicon.match(jasonwang826.regexpFileExt) )	{
			ui_icon='<span class="ui-icon" style="float:left; margin:0px 7px 10px 0px;background-image: url('+dicon+');"></span>';
		}	else	{
			ui_icon='<span class="ui-icon ui-icon-'+dicon+'" style="float:left; margin:0px 7px 10px 0px;"></span>';
		}
		$div.append( '<table border="0" width="100%"><tr><td width="28" valign="top" rowspan="2">'+ui_icon+'</td><td valign="top">'+message+'</td></tr><tr><td><input type="text" id="prompt-text" style="width:100%;" /></td></tr></table>' );
		$div.dialog({
				width: dwidth,
				modal: true,
				show: {
					effect: "bounce",
					duration: 500
				},
				open: function(event, ui) {
						$('.jasonwang826-hide-when-popup').each(function(i,ele)	{
								var $t=$(this);
								$t.data('jasonwang826-hide-when-popup',$t.is(':visible'));
								$t.hide();
							});
					},
				close: function(event, ui) {
						$('.jasonwang826-hide-when-popup').each(function(i,ele)	{
								var $t=$(this);
								var visible=$t.data('jasonwang826-hide-when-popup');
								if(visible)	$t.show();
							});
					},
				buttons:
					[
						{
							text: yes_label,
							click: function () {
								var $t = $( this );
								$t.dialog( "close" );
								if( dprompt!=null )	dprompt($t.find('#prompt-text').val());
							}
						},
						{
							text: no_label,
							click: function () {
								$( this ).dialog( "close" );
								if( dcancel!=null )	dcancel();
							}
						}
					]
			});
	}

/*
 *	$.jnotify({...})
 *		message : message
 *		type : info | error | success | warning ; default = info
 *		time : visible time in miliseconds; default = 5000
 *	Reference : http://www.vicreative.nl/Projects/Notify
 */
	$.jnotify=function( option )	{
		var message=option.message;
		var vStyle=(option.type===undefined)?'info':option.type;
		var vDisplayTime=(option.time===undefined)?5000:option.time;
		$.notify
			.create(
				message,
				{
					sticky: ((vStyle=='success')||(vStyle=='error')||(vDisplayTime==0)),
					appendTo: '.jnotify',
					adjustScroll: true,
					type: 'bar',
					style: vStyle,
					opacity: .85 ,
					displayTime: vDisplayTime
				}
			);
	};
/*
	function onJasonwang826UIReady()	{
	}
*/
	$(function(){
		//	initialize
			$('head').append($('<link rel="stylesheet" href="'+jasonwang826_config.jasonwang826_url +'/js/jquery.notify/notify.css" type="text/css" />'));
			$('body').prepend('<div class="jnotify"></div>');
			$.getScript(
				jasonwang826_config.jasonwang826_url + '/js/jquery.notify/jquery-notify.js',
				function(d,t,j)	{
					if( typeof(onJasonwang826UIReady)!=='undefined' )	onJasonwang826UIReady();
				}
			);
	});

/*
 *	$.block({...})
 *		message : message
 */
	$(function(){
		//	initialize
			$.getScript(
				jasonwang826_config.jasonwang826_url + '/js/jquery.blockui/jquery.blockUI.js'
			);
	});

