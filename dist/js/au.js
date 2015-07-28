/*--------------------------------------*\
	Concord
			by DFocus AuTiMoThY
\*--------------------------------------*/
$(window).load(function(){


});

// init controller
var simplePinning = new ScrollMagic.Controller();
// var controller = new ScrollMagic.Controller();
var controller = new ScrollMagic.Controller({globalSceneOptions: {triggerHook: "onLeave", duration: "400"}});

function txtmsg1(){
	alert('由後台自訂連結');
}

function mainNavLink(whereYouGo) {
	switch(whereYouGo) {
		case "goto1":
			location.href="about.php";
			break;
		case "goto2":
			location.href="index.php#futures";
			break;
		case "goto3":
			location.href="products.php";
			break;
		case "goto5":
			location.href="service.php";
			break;
	}
}

function viewPortWidthHeight() {
  var wh = {};
  if(window.innerWidth) {
      wh.width = window.innerWidth;
      wh.height = window.innerHeight;
  }
  else if(document.documentElement.clientWidth) {
      wh.width = document.documentElement.clientWidth;
      wh.height = document.documentElement.clientHeight;
  }
  else if(document.body.clientWidth) {
      wh.width = document.body.clientWidth;
      wh.height = document.body.clientHeight;
  }
  return wh;
}

function resizeBlock (){
	var $body = $("body"),
		$indexPage = $("body.index_page"),
		viewPortWH = viewPortWidthHeight(),
		viewPortW = viewPortWH.width;
		viewPortH = viewPortWH.height;

	// $footerWrap.height(viewPortH * 2 / 5);
	// $indexPage.css('height', viewPortH);
	// $slidesLi.css('height', viewPortH * 0.8);
	// 
	if (viewPortW <= 480) {
		$("#txtImg1").removeClass();
		$("#txtImg1").children('h1').removeClass().addClass('txt-2_1').css({
			fontWeight: 'normal'
			// property2: 'value2'
		});

		$(".mobile_title").removeClass('hide_txt');
		if ($(".mobile_title").hasClass('hidden')) {
			$(".mobile_title").removeClass('hidden');
		};
		$(".metro-block-style1").removeClass('metro-block-style1').addClass('metro-block-style3');
		$(".metro-block-style2").removeClass('metro-block-style2').addClass('metro-block-style3');
	};

}

function isActive($this, $thisClass) {
	if (!($this.hasClass('active'))) {
		$(".futures_bar-item").removeClass('active');
		$this.addClass('active');
	} else{
		// $thisClass.removeClass('active');
	};
}

function isOpen($this, $thisClass) {
     if (!($this.hasClass('open'))) {
          $this.addClass('open');
     } else{
          $thisClass.removeClass('open');
     };
}



/*------------------------------------------------------------------------*\
/*------------------------------------------------------------------------*\
/*========================================================================*\
          tabs  function
\*========================================================================*/
function tabs(tabBlock) {
     // 預設顯示第一個 Tab

     var _showTab = 0;
     $(tabBlock).each(function(){
          // 目前的頁籤區塊
          var $tab = $(this);

          var $defaultLi = $('ul.tabs li', $tab).eq(_showTab).addClass('active');
          $($defaultLi.find('a').attr('href')).siblings().hide();

          // 當 li 頁籤被點擊時...
          // 若要改成滑鼠移到 li 頁籤就切換時, 把 click 改成 mouseover
          $('ul.tabs li', $tab).click(function() {
               // 找出 li 中的超連結 href(#id)
               var $this = $(this),
                    _clickTab = $this.find('a').attr('href');
               // 把目前點擊到的 li 頁籤加上 .active
               // 並把兄弟元素中有 .active 的都移除 class
               $this.addClass('active').siblings('.active').removeClass('active');
               // 淡入相對應的內容並隱藏兄弟元素
               $(_clickTab).stop(false, true).fadeIn().siblings().hide();

               return false;
          }).find('a').focus(function(){
               this.blur();
          });
     });
}

/*------------------------------------------------------------------------*\
/*------------------------------------------------------------------------*\
/*========================================================================*\

\*========================================================================*/
$(window).on('resize', function () {
	resizeBlock();
});

$(function () {
	resizeBlock();

	var viewPortWH = viewPortWidthHeight(),
		viewPortW = viewPortWH.width;

	[].slice.call( document.querySelectorAll( '.si-icons-default > .si-icon' ) ).forEach( function( el ) {
		var svgicon = new svgIcon( el, svgIconConfig );
	} );

	// if (!/*@cc_on!@*/false) {
	// 	console.log('ie?');
	// 	$.material.init('#ftCtrl');
	// }else {

	// }
	if( userAgent.match(/(msie|MSIE)/) || userAgent.match(/(T|t)rident/)  ) {
		$(".loading .ip-loader .ip-inner").append('LOADING');
	}else {
		// console.log('not ie');
		$.material.init();
		// if(!userAgent.match(/(iPhone|iPad|Android)/)){
		// 	var tween = TweenMax.to("#globalHeader", 0.3, {
		// 		height: 50,
		// 		ease: Power1.easeInOut
		// 	});

		// 	new ScrollMagic.Scene({
		// 		triggerElement: "#globalHeader",
		// 		offset: 0
		// 	})
		// 	.setTween(tween)
		// 	.setPin("#globalHeader")
		// 	.triggerHook(0)
		// 	// .addIndicators({name: "2 (duration: 0)"}) // add indicators (requires plugin)
		// 	.addTo(simplePinning);
		// }

	}

     var $tabs = $("#infTab");
     if ($tabs.length) {
          tabs($tabs);
     };


	$.preload('dist/images/futures_bar-banner1.jpg',
	          'dist/images/futures_bar-banner2.jpg',
	          'dist/images/futures_bar-banner3.jpg'
	          );

	// var $win = $(window),
	// 	_moveSpeed = 1000,	// 移動的速度
	// 	number = 100;
	// var $header = $("#globalHeader");

	// $win.bind('scroll resize', function(){
	// 	var $this = $(this);
	// 	var MM = $this.scrollTop();

	// 	if(MM>=150){
	// 		$header.stop().animate({
	// 			top: 50
	// 		}, _moveSpeed, 'easeOutQuint');
	// 	}else {
	// 		$header.stop().animate({
	// 			top: 290
	// 		}, _moveSpeed, 'easeOutQuint');
	// 	};
	// }).scroll();

	// header fixed



	var $indexpage = $(".index_page");
	if (!$indexpage.length) {
		var bannerTween = TweenMax.to("#pageBanner", {
			backgroundPosition: "50% 50px",
			ease: Linear.easeNone
		})

		var bannerScene = new ScrollMagic.Scene({
			triggerElement: "#bannerTrigger", offset: 50
		})
		.setTween("#pageBanner", {backgroundPosition: "50% 200px",ease: Linear.easeNone})
		// .addIndicators()
		.addTo(controller);
	};



	$("#menu").click(function() {
		isOpen($("#menu"), $("#menu.open"));
		if ($("#menu").hasClass('open')) {
			$("nav.main_nav").addClass('js-nav_open');
			$("body").scroll(function(event) {
				return false;
			});;
		}else {
			$("nav.main_nav").removeClass('js-nav_open');
		};
	});


	$(".main_nav-item:has('ul')").hover(function() {
		$(this).addClass('js-hover');
		// $("#subNavBar").addClass('active');
	}, function() {
		$(this).removeClass('js-hover');
		// $("#subNavBar").removeClass('active');
	});

})
