	$.validationEngineLanguage.allRules
		["user-account"] = {
			// remote json service location
			"url": "/admin/js/user-account.js.php",
			// error
			"alertText": "* 此帳號已經被其他人使用",
			// if you provide an "alertTextOk", it will show as a green prompt when the field validates
			"alertTextOk": "* 此帳號可以使用",
			// speaks by itself
			"alertTextLoad": "* 正在確認帳號是否有其他人使用，請稍等"
		};

	$.validationEngineLanguage.allRules
		["image-file"] = {
			"regex": /\.(jpg|jpeg|gif|png)$/i,
			"alertText": "* 只接受 JPG, GIF, PNG 等格式圖檔"
		};

	$.validationEngineLanguage.allRules
		["fundprice-date"] = {
			// remote json service location
			"url": "/admin/js/fundprice-date.js.php",
			// error
			"alertText": "* 此日期已經有其他資料了",
			// if you provide an "alertTextOk", it will show as a green prompt when the field validates
			"alertTextOk": "* 此日期可以新增資料",
			// speaks by itself
			"alertTextLoad": "* 正在確認日期是否有其他資料，請稍等"
		};

	$.validationEngineLanguage.message =
		{
			'required' : "* 此欄位不可空白"
		};
