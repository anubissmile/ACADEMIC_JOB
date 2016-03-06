<?php
	require_once("../PHPMailer_5.2.4/class.phpmailer.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$from = "infoacademic@devcaffe.hol.es";
$name = "ACADEMIC JOB";
$to = "anubis.smile@gmail.com";
$subject = "Test sent email from host";
$message = "Test sent email from host is success";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->IsHTML(false); //หากส่งในรูปแบบ html ถ้าส่งเป็น text ก็ลบบรรทัดนี้ออกได้
$mail->CharSet = "utf-8"; //กำหนด charset ของภาษาในเมล์ให้ถูกต้อง เช่น tis-620 หรือ utf-8

$mail->Host = "mx1.hostinger.in.th"; // SMTP server
$mail->Port = 2525;
$mail->SMTPAuth = "true";
$mail->Username = $from; // ชื่อ emil ที่ท่านใช้ login ควรสร้าง email user แยกต่างหากเพื่อใช้ส่งเมล์จากเว็บโดยเฉพาะเพื่อให้ตรวจสอบได้ง่าย
$mail->Password = "501110070"; // รหัสผ่านของ email ที่ระบุด้านบน
$mail->SMTPSecure = 'ssl';

$mail->From = $from; // ผู้รับจะเห็นอีเมล์นี้เป็น ผู้ส่งเมล์
$mail->FromName = $name; // ผู้รับจะเห็นชื่อนี้เป็น ชื่อผู้ส่ง
$mail->AddAddress($to);
$mail->Subject = $subject;
$mail->Body = $message;


if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
	echo "<br/>$from<br/>$name<br/>$to<br/>$subject<br/>$message<br/>";
} else {
    echo "Message sent!";
	echo "<br/>$from<br/>$name<br/>$to<br/>$subject<br/>$message<br/>";
}


//		$strTo = "anubis.smile@gmail.com";
//		//$strTo = "wesarut.khm@gmail.com";
//		$strSubject = "ทดสอบการส่งอีเมลล์";
//		$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; // or UTF-8 //
//		$strHeader .= "From: ACADEMIC-JOB<info@devcaffe.hol.es>\r\n";
//		$strHeader .= "Cc: Mr.Wesarut Client<adnubis.smile@gmail.com>\r\n";
//		$strHeader .= "Bcc: anubis.smile@gmail.com\r\n";
//		
//		$strMessage = "hey สวัสดี <a href=\"http://academicjob.devcaffe.hol.es\" target=\"_blank\">Click here: to visit our site.<br/><img src=\"http://academicjob.devcaffe.hol.es/images/package/silver_package.png\"/></a>";
//		$strMessage .= "<div>visit<br/>our<br/>website!<br/>now!</div>";
//		mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
//		echo "To : $strTo<br />";
//		echo "Header : $strHeader<br />";
//		echo "Subject : $strSubject<br />";
//		echo "Message : $strMessage<br />";
		//if($flgSend)
//		{
//			echo "Email Sending.";
//			//return true;
//		}
//		else
//		{
//			echo "Email Can Not Send.";
//			//return false;
//		}
		//echo $strMessage;
		phpinfo();
?>
</body>
</html>