/*
 *	Author : Jason Wang ( 1971-, Taiwan )
 *	作者 : 王佳陳 ( 1971年生於台灣 )
 *
 *	Jason Wang 826 Lab. All rights reserved
 *	版權係屬 Jason Wang 826 Lab. 所有，未經書面授權，不得任意轉作商業用途
 */

function post_to_facebook( url, title )	{
	window.open('http://www.facebook.com/sharer.php?'+
			'u='+encodeURIComponent( url ) +
			'&t='+encodeURIComponent( title )
		);
}

function post_to_plurk( status )	{
	window.open( 'http://www.plurk.com/?qualifier=shares&status='+encodeURIComponent(status) );
}

function post_to_twitter ( status )	{
	window.open( 'http://twitter.com/home?status='+encodeURIComponent(status) );
}

function print_friendly(divname)	{
	var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
	disp_setting+="scrollbars=yes,width=750, height=600, left=100, top=25";
	var docprint=window.open("","",disp_setting);
	docprint.document.open();
	docprint.document.write('<html><head>');
	docprint.document.write($('html head').html());
	docprint.document.write('</head><body onLoad="self.print();"><center>');
	docprint.document.write($('#'+divname).html());
	docprint.document.write('</center></body></html>');
	docprint.document.close();
	docprint.focus();
};

Array.prototype.in_array = function(p_val) {
	for(var i = 0, l = this.length; i < l; i++) {
		if(this[i] == p_val) {
			return true;
		}
	}
	return false;
}

function sizeofobject(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

function clone(obj){
    if(obj == null || typeof(obj) != 'object')
        return obj;

    var temp = {};
    for(var key in obj)
        temp[key] = clone(obj[key]);
    return temp;
}

function alert_all(arr,level)	{
	var ret='';
	if( level>2 )	return '{...}\n';
	level=(level===undefined)?0:level;
	if( typeof arr=='object' )	{
		for ( var i in arr )	{
			if(i=='in_array')	continue;
			ret+=i+':'+( (typeof arr[i]=='object')?('\n['+alert_all(arr[i],level+1)+']'):arr[i] )+'\n';
		}
	}	else
		ret=arr;

	if( level>0 )
		return ret;
	alert( ret );
}

function fillZero(num,digital)	{
	if( digital==0 )	return num;
	var i=(''+num).length;
	if ( i>=digital )	return num;
	for (;i<digital;i++)	num='0'+num;
	return num;
}

function loadJSFile(js)	{
	$('head').append( '<script src="'+js+'" type="text/javascript"></script>' );
}

function loadCssFile(css)	{
	$('head').append( '<link href="'+css+'" rel="stylesheet" type="text/css"></link>' );
}
function ifnull(value,nv)	{
	nv=(nv===undefined)?'':nv;
	return (value==null)?nv:value;
}

function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

function xor( a, b )	{
	return ( a && !b ) || ( !a && b );
}

Date.prototype.dateDiff = function(interval,objDate){
	var dtEnd = new Date(objDate);
	if(isNaN(dtEnd)) return undefined;
	switch (interval) {
		case "second":return parseInt((dtEnd - this) / 1000);
		case "minute":return parseInt((dtEnd - this) / 60000);
		case "hour":return parseInt((dtEnd - this) / 3600000);
		case "day":return parseInt((dtEnd - this) / 86400000);
		case "week":return parseInt((dtEnd - this) / (86400000 * 7));
		case "month":return (dtEnd.getMonth()+1)+((dtEnd.getFullYear()-this.getFullYear())*12) - (this.getMonth()+1);
		case "year":return dtEnd.getFullYear() - this.getFullYear();
	}
}
Date.prototype.dateAdd = function(interval,num){
	var rdate = new Date(this);
	switch (interval) {
		case "second":
			rdate.setSeconds(this.getSeconds() + num);
			return rdate;
		case "minute":
			rdate.setMinutes(this.getMinutes() + num);
			return rdate;
		case "hour":
			rdate.setHours(this.getHours() + num);
			return rdate;
		case "day":
			rdate.setDate(this.getDate() + num);
			return rdate;
		case "week":
			rdate.setDate(this.getDate() + num*7);
			return rdate;
		case "month":
			rdate.setMonth(this.getMonth() + num);
			return rdate;
		case "year":
			rdate.setFullYear(this.getFullYear() + num);
			return rdate;
	}
}
Date.prototype.toISODate = function() {
	function twoDigits(d) {
		if(0 <= d && d < 10) return "0" + d.toString();
		if(-10 < d && d < 0) return "-0" + (-1*d).toString();
		return d.toString();
	}
	return this.getFullYear() + "-" + twoDigits(1 + this.getMonth()) + "-" + twoDigits(this.getDate());
};
Date.prototype.toISODateTime = function() {
	function twoDigits(d) {
		if(0 <= d && d < 10) return "0" + d.toString();
		if(-10 < d && d < 0) return "-0" + (-1*d).toString();
		return d.toString();
	}
	return this.getFullYear() + "-" + twoDigits(1 + this.getMonth()) + "-" + twoDigits(this.getDate()) + " " + twoDigits(this.getHours()) + ":" + twoDigits(this.getMinutes()) + ":" + twoDigits(this.getSeconds());
};
Date.prototype.fromISODate = function(dstring) {
	var date_regexp = /^(\d+)-(\d+)-(\d+)$/i;
	if( !(m=dstring.match(date_regexp)) )	return null;
	return new Date(parseInt(m[1]) , parseInt(m[2])-1, parseInt(m[3]));
}
Date.prototype.fromISODateTime = function(dstring) {
	var datetime_regexp = /^(\d+)-(\d+)-(\d+) (\d+):(\d+):(\d+)$/i;
	if( !(m=dstring.match(datetime_regexp)) )	return null;
	return new Date(parseInt(m[1]) , parseInt(m[2])-1, parseInt(m[3]),parseInt(m[4]),parseInt(m[5]),parseInt(m[6]));
}
