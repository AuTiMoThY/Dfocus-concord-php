<?php 


/**
* 
*/
class PageUrlAu {
    public $webPageBuild=       "javascript: alert('網頁建置中，敬請稍待!');";
    public $index=              "index.php";
    public $about=              "about.php";
    public $index_futures=      "index.php#futures";
    public $futures_managed=    "futures_managed.php";
    public $futures_fund=       "futures_fund.php";
    public $futures_advisory=   "futures_advisory.php";
    public $products=           "products.php";
    public $products_list1=     "products_list1.php";
    public $products_list2=     "products_list2.php";
    public $products_list3=     "products_list3.php";
    public $news=               "news.php";
    public $service=            "service.php";
    public $monthlyreport=      "monthlyreport.php";
    public $download=           "download.php";
    public $saleschannel=       "saleschannel.php";
    public $qa=                 "qa.php";
    public $aboutCPCS=          "aboutCPCS.php";
    public $teamProfile=        "about.php#teamProfile";

}
/**
* 
*/
class navAu extends PageUrlAu {

	function navListAu($headerOrFooter) {
		global $detect;
		global $deviceType;

		$sub_about = array(
		                   '資產保護' => $this->aboutCPCS
		                   );
		$sub_futures = array(
		                    '期貨經理事業' => $this->futures_managed,
		                    '期貨信託事業' => $this->futures_fund,
		                    '期貨顧問事業' => $this->futures_advisory
		                     );

		$sub_pdt = array(
		                '基金' => $this->products_list1,
		                '全權委託' => $this->products_list2,
		                '顧問服務' => $this->products_list3
		                 );

		$sub_service = array(
		                    '投資月報' => $this->monthlyreport,
		                    '文件下載' => $this->download,
		                    '銷售機構' => $this->saleschannel,
		                    '常見問題' => $this->qa
		                     );
		$Nav = array(
						'認識康和期經' => $sub_about,
						'三大事業體'   => $sub_futures,
						'產品介紹'     => $sub_pdt,
						'市場消息'     => $this->news,
						'客服中心'     => $sub_service

						);
		$NavLen = 0;
		$NavLen ++;

		if ($headerOrFooter == 'headerNav') {
			foreach ($Nav as $item => $url) {

if ($deviceType == 'phone') {
echo "<li class=\"main_nav-item nav-concord item$NavLen mobile_nav\">";
}else {
echo "<li class=\"main_nav-item nav-concord item$NavLen\">";
}
if (is_array($url)) {
echo "	<a href=\"javascript:mainNavLink('goto$NavLen');\">";
}else{
echo "	<a href=\"$url\">";
}
echo "		<span class=\"wrap\"><i class=\"main_nav-icon\"></i><span class=\"main_nav-txt\">$item</span></span>";
echo "	</a>";
if (is_array($url)) {
$subNavLen = 0;
$subNavLen ++;
echo "	<ul class=\"subNav js-subNav\">";
	foreach ($url as $subNav => $subUrl) {
echo "		<li class=\"subNav-item item{$NavLen}_{$subNavLen}\">";
echo "			<a href=\"{$subUrl}\">{$subNav}</a>";
echo "		</li>";
++$subNavLen;
	}
echo "		<li class=\"padding\"></li>";
echo "	</ul>";
}
echo "</li>";

// echo <<<_OUTPUT
// <li class="main_nav-item nav-concord item$NavLen">
// 	<a href="$url">
// 		<span class="wrap"><span class="main_nav-icon"></span><span class="main_nav-txt">$item</span></span>
// 	</a>
// </li>
// _OUTPUT;

				++$NavLen;
			}
		} elseif ($headerOrFooter == 'footerNav') {
			foreach ($Nav as $item => $url) {

echo <<<_OUTPUT
<li class="footer_nav-item nav-concord item$NavLen">
	<a href="$url">
		<span class="wrap"><span class="footer_nav-icon"></span><span>$item</span></span>
	</a>
</li>
_OUTPUT;

				++$NavLen;
			}
		}
	}
}

/**
* function
*/

function headerNavAu(){
	$navAu = new navAu();
	$navAu -> navListAu($headerOrFooter ='headerNav');

}

function footerNavAu(){
	$navAu = new navAu();
	$navAu -> navListAu($headerOrFooter ='footerNav');

}

function webPageUrlAu($url){
	$PageUrlAu = new PageUrlAu();
	echo $PageUrlAu->{$url};
}



 ?>