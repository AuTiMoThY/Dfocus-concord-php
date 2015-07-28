	$(function(e){
		$("form.edit").each(function(i,e)	{
			validateForm($(this));
		});
	});
	function validateForm($f)	{
		$f.validationEngine(
			'attach',
			{
				promptPosition : "topLeft" ,
				autoPositionUpdate: true ,
				focusFirstField: false ,
				scroll: false ,
				onValidationComplete:
					function($f,validateResult)	{
						//	use onValidationComplete attr on <form> to set function name
						var ovd =$f.attr('onValidationComplete');
						if(ovd!=null)	return eval(ovd+'($f,validateResult)');
						return validateResult;
					}
			}
		);

		$f.find('.hide-prompt')
			.click(function(e)	{
				$f.validationEngine('hide');
			});
		$f.find('.ord')
			.each(function(e)	{
				var $t = $(this);
				var vMaxOrd = $t.attr('maxOrd');
				var vValue = $t.attr('value');
				var vName = $t.attr('name');
				var vAjaxUrl = $t.attr('ajax');
				var $ord=$('<select class="ord-select"></select>');
				if( typeof(vName)!='undefined' )	$ord.attr('name',vName);
				for( var i=1; i<=vMaxOrd; i++ )	{
					$ord.append($('<option />').val(i).text(i));
				}
				if( typeof(vAjaxUrl)!='undefined' )	$ord.attr('ajax',vAjaxUrl);
				$ord.val(vValue);
				$t.after($ord);
				$t.remove();
			});
		$f.find('.image-preview')
			.each(function(e)	{
				var $t = $(this);
				var src = $t.attr('src');
				if( typeof(src)!='undefined' && src!='' )
					$t.css('background-image',"url('"+$t.attr('src')+"?_="+Math.random()+"')");
				$t.width($t.attr('width'));
				$t.height($t.attr('height'));
			});
		$f.find('input.image-upload[type="file"]')
			.change(function(e)	{
				var $t = $(this);
				var $preview = $('#'+$t.attr('preview-at'));
				if(this.files.length>0)	{
					var reader = new FileReader();
					reader.onload = function(){
						$preview.css('background-image',"url('"+reader.result+"')");
					};
					reader.readAsDataURL(this.files[0]);
				}	else	{
					var src = $preview.attr('src');
					if( typeof(src)!='undefined' && src!='' )
						$preview.css('background-image',"url('"+src+"?_="+Math.random()+"')");
					else
						$preview.css('background-image',"url('"+langInfo.langHome+"/images/no-image.png')");
				}
			});
		$f.find('input[type="reset"]')
			.click(function(e){
				$f.get(0).reset();
				$f.find('input.image-upload[type="file"]').change();
			});

		if( typeof(CKEDITOR) !== 'undefined' )	{
			if( CKEDITOR.env.isCompatible==false && CKEDITOR.env.webkit)	CKEDITOR.env.isCompatible=true;
			CKEDITOR.config.toolbar='jasonwang826';
			CKEDITOR.config.filebrowserBrowseUrl='/jasonwang826/js/ckeditor-filemanager-2.0/index.html?user_config=/admin/js/filemanager.config.js.php';
			$f.find('textarea.html-editor')
				.each(function(i,ele)	{
					var $t=$(ele);
					var toolbar = $t.attr('toolbar');
					toolbar = (typeof(toolbar)=='undefined') ? 'jasonwang826' : toolbar;
					$t.ckeditor(
						{
							toolbar : toolbar ,
							width: $t.css('width') ,
							height: $t.css('height') ,
							language: 'zh'
						}
					);
				});
		}

		//
		//	date time
		//
			var date_option={
						dateFormat : 'yy-mm-dd'
					,	showTime : false
					,	showOtherMonths: true
					,	selectOtherMonths: true
					,	changeYear : true
					,	yearRange : '1900:2030'
					,	constrainInput : true
						/*
					,	beforeShow : function(input, inst)	{$(inst.input).validationEngine('hide');}
					,	onClose : function(dateText, inst)	{$(inst.input).validationEngine('hide');}
					*/
				};
			var birthdate_option={
						dateFormat : 'yy-mm-dd'
					,	firstDay : 0
					,	showTime : false
					,	showOtherMonths: true
					,	selectOtherMonths: true
					,	changeYear : true
					,	yearRange : '1900:2030'
					,	maxDate : new Date()
					,	constrainInput : true
				};
			$f.find('.date')
				.each(function(ind,ele)	{
					var $t=$(this);
					if($t.hasClass('birthdate'))	{
						$t.datepicker(birthdate_option);
					}	else	{
						$t.datepicker(date_option);
					}
					var minDate = $t.data('minDate');
					if( typeof(minDate) != 'undefined' )	
						$t.datepicker('option','minDate',minDate);
					var maxDate = $t.data('maxDate');
					if( typeof(maxDate) != 'undefined' )	
						$t.datepicker('option','maxDate',maxDate);
				});
			var datetime_option={
						dateFormat : 'yy-mm-dd'
					,	firstDay : 0
					,	time24h: true
					,	showTime : true
					,	showOtherMonths: true
					,	selectOtherMonths: true
					,	changeYear : true
					,	yearRange : '1900:2030'
					,	constrainInput : true
				};
			$f.find('.datetime')
				.each(function(ind,ele)	{
					var $t=$(this);
					$t.datepicker(datetime_option);
				});
			$f.find( ".tabs" ).tabs();

			var ovi =$f.attr('onValidationInit');
			if(ovi!=null)	return eval(ovi+'($f)');
	}
