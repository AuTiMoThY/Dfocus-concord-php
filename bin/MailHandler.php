<?
    $project_name = "project_name";
    $weburl = "http://test.com.tw/";

	if ( isset($_GET["workflag"]) && $_GET["workflag"] == "true" ) {
    // 寄送通知信         
    $temp_mail_to = "m62466@gmail.com";
    //$temp_mail_to = "mao@ecmd.com.tw";
     
    $temp_mail_subject=$project_name." - 聯絡我們新訊息";
    $subject = "=?UTF-8?B?" . base64_encode($temp_mail_subject) . "?=";
     
    $message = "<html><head><title>".$project_name." - 聯絡我們表單</title></head><meta http-equiv=Content-Type content='text/html; charset=utf-8'><body>";
	$message .= "<table border=1 cellpadding=0 cellspacing=0 width=580 >";
	// $message .= "<tr><th align='center' width=200>姓名</td><td> &nbsp; ".$_GET["name"]."</td>";	   
	$message .= "<tr><th align='center' width=200>公司名稱</td><td> &nbsp; ".$_GET["name"]."</td>";
	// $message .= "<tr><th align='center' width=200>公司名稱</td><td> &nbsp; ".$_GET["company"]."</td>";
	$message .= "<tr><th align='center' width=200>電子信箱</td><td> &nbsp; ".$_GET["email"]."</td>";
	$message .= "<tr><th align='center' width=200>電話</td><td> &nbsp; ".$_GET["phone"]."</td>";
	$message .= "<tr><th align='center' width=200>留言內容</td><td> &nbsp; ".nl2br($_GET["message"])."</td>";
    $message .= "</table><br><br>";
	$message .= "本信由系統發信，請勿直接回信，謝謝！";

    // 用本地郵件伺服器處理
    $temp_mail_headers="MIME-Version:1.0\n";
    $temp_mail_headers.="Content-type:text/html;charset=UTF-8\n";
    $temp_mail_headers.= "From: ".$project_name."<goothlogo@gmail.com> \n"; 
	$temp_mail_message=$temp_mail_content; 
    $result = mail($temp_mail_to,$subject,$message,$temp_mail_headers); 
	
	// 寄給開案人       
    $temp_mail_subject=" 您在 ".$project_name.$weburl." 的留言 ";
    $subject = "=?UTF-8?B?" . base64_encode($temp_mail_subject) . "?=";
    $result = mail($_GET["email"],$subject,$message,$temp_mail_headers); 
   
    // echo "Result = ".$result;
    // phpmailer 寄信結束

    return true;
    }
?>