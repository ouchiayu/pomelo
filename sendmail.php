<?php 
require("phpmailer/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true; // turn on SMTP authentication
//這幾行是必須的

$mail->Username = "ap811129a@gmail.com";
$mail->Password = "a811129a";
//這邊是你的gmail帳號和密碼

$mail->FromName = "歐佳玗";
// 寄件者名稱(你自己要顯示的名稱)
$webmaster_email = "ap811129a@gmail.com"; 
//回覆信件至此信箱


$email=$_POST['email'];
// 收件者信箱
$name="紅柚客戶";
// 收件者的名稱or暱稱
$mail->From = $webmaster_email;


$mail->AddAddress($email,$name);
$mail->AddReplyTo($webmaster_email,"Squall.f");
//這不用改

$mail->WordWrap = 50;
//每50行斷一次行

//$mail->AddAttachment("/XXX.rar");
// 附加檔案可以用這種語法(記得把上一行的//去掉)

$mail->IsHTML(true); // send as HTML

$mail->Subject = "花蓮鶴岡紅柚訂單編號"; 
// 信件標題

$mail_content = '感謝您的訂購<br><br>訂單編號：<a href="http://ec2-54-69-99-160.us-west-2.compute.amazonaws.com/search.php?order='.$_GET['order_num'].'">'.$_GET['order_num'].'</a>';
$mail->Body = $mail_content;
//信件內容(html版，就是可以有html標籤的如粗體、斜體之類)


if(!$mail->Send()){
	echo $mail->ErrorInfo;
	// echo '<script type="text/javascript">';
	// echo 'history.back();';
	// echo 'console.log("'.$mail->ErrorInfo.'");';
	// echo '</script>';
}
else{ 
	echo '<script type="text/javascript">';
	echo 'history.back();';
	echo 'alert("信件已寄出，如果沒有收到可至垃圾郵件尋找");';
	echo '</script>';
}

?>