/* Initialisation for the jQuery UI date picker plugin. */
jQuery(function($){
	var $jqueryUIi18n = $('script#jquery-ui-i18n');
	switch($jqueryUIi18n.data('lang-id'))	{
		case 'zh-tw':
			$.datepicker.regional['zh-TW'] = {
				closeText: '關閉',
				prevText: '&#x3c;上月',
				nextText: '下月&#x3e;',
				currentText: '今天',
				monthNames: ['一月','二月','三月','四月','五月','六月',
				'七月','八月','九月','十月','十一月','十二月'],
				monthNamesShort: ['一','二','三','四','五','六',
				'七','八','九','十','十一','十二'],
				dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
				dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
				dayNamesMin: ['日','一','二','三','四','五','六'],
				weekHeader: '周',
				dateFormat: 'yy/mm/dd',
				firstDay: 1,
				isRTL: false,
				showMonthAfterYear: true,
				yearSuffix: '年'};
			$.datepicker.setDefaults($.datepicker.regional['zh-TW']);
		break;
		case 'zh-cn':
			$.datepicker.regional['zh-CN'] = {
				closeText: '关闭',
				prevText: '&#x3c;上月',
				nextText: '下月&#x3e;',
				currentText: '今天',
				monthNames: ['一月','二月','三月','四月','五月','六月',
				'七月','八月','九月','十月','十一月','十二月'],
				monthNamesShort: ['一','二','三','四','五','六',
				'七','八','九','十','十一','十二'],
				dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
				dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
				dayNamesMin: ['日','一','二','三','四','五','六'],
				weekHeader: '周',
				dateFormat: 'yy-mm-dd',
				firstDay: 1,
				isRTL: false,
				showMonthAfterYear: true,
				yearSuffix: '年'};
			$.datepicker.setDefaults($.datepicker.regional['zh-CN']);
		break;
		case 'en-us':
			$.datepicker.regional['en-GB'] = {
				closeText: 'Done',
				prevText: 'Prev',
				nextText: 'Next',
				currentText: 'Today',
				monthNames: ['January','February','March','April','May','June',
				'July','August','September','October','November','December'],
				monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
				'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				dayNames: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
				dayNamesShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
				dayNamesMin: ['Su','Mo','Tu','We','Th','Fr','Sa'],
				weekHeader: 'Wk',
				dateFormat: 'dd/mm/yy',
				firstDay: 1,
				isRTL: false,
				showMonthAfterYear: false,
				yearSuffix: ''};
			$.datepicker.setDefaults($.datepicker.regional['en-GB']);
		break;
		case 'ja-jp':
			$.datepicker.regional['ja'] = {
				closeText: '閉じる',
				prevText: '&#x3c;前',
				nextText: '次&#x3e;',
				currentText: '今日',
				monthNames: ['1月','2月','3月','4月','5月','6月',
				'7月','8月','9月','10月','11月','12月'],
				monthNamesShort: ['1月','2月','3月','4月','5月','6月',
				'7月','8月','9月','10月','11月','12月'],
				dayNames: ['日曜日','月曜日','火曜日','水曜日','木曜日','金曜日','土曜日'],
				dayNamesShort: ['日','月','火','水','木','金','土'],
				dayNamesMin: ['日','月','火','水','木','金','土'],
				weekHeader: '週',
				dateFormat: 'yy/mm/dd',
				firstDay: 0,
				isRTL: false,
				showMonthAfterYear: true,
				yearSuffix: '年'};
			$.datepicker.setDefaults($.datepicker.regional['ja']);
		break;
	}
});
