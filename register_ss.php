<?php
	include_once("lib/lib.inc.php");
	
	$USER_NAME = addslashes($_POST['USER_NAME']);
	$USER_LASTNAME = addslashes($_POST['USER_LASTNAME']);
	$USER_PASSWORD = md5($_POST['USER_PASSWORD'].'academic_job_user');
	$USER_EMAIL = addslashes($_POST['USER_EMAIL']);
	$USER_TEL = addslashes($_POST['USER_TEL']);
	$USER_OFFICE_TEL = addslashes($_POST['USER_OFFICE_TEL']);
	$USER_ORG_NAME = addslashes($_POST['USER_ORG_NAME']);
	$USER_ADDRESS = addslashes($_POST['USER_ADDRESS']);
	$USER_WEBSITE = addslashes($_POST['USER_WEBSITE']);
	$date = date("Y-m-d H:i:s");
	$USER_CODE = GenerateID("SELECT USER_CODE FROM tb_user ORDER BY USER_CODE DESC;","USER_CODE");
	$USER_CONFIRM_CODE = $USER_CODE . "::" . md5(rand(000000,999999) . $date);
	
	$SQL = "INSERT INTO `tb_user` (`USER_ID`, `USER_CODE`, `USER_LEVEL`, `USER_NAME`, `USER_LASTNAME`, `USER_PASSWORD`, `USER_EMAIL`, `USER_TEL`, `USER_OFFICE_TEL`, 
			`USER_ORG_NAME`, `USER_ADDRESS`, `USER_WEBSITE`, `USER_DATE`, `USER_CONFIRM_CODE`) 
			VALUES (NULL, '$USER_CODE', '4', '$USER_NAME', '$USER_LASTNAME',  '$USER_PASSWORD', 
			'$USER_EMAIL', '$USER_TEL', '$USER_OFFICE_TEL', '$USER_ORG_NAME', '$USER_ADDRESS', 
			'$USER_WEBSITE', '$date', '$USER_CONFIRM_CODE');";
	
	
	if(DBQuery($SQL)){
		$header = "From:Admin Academic-Job<info@academicjob.com>\r\n";
		$subject = "คุณได้สร้างบัญชีกับ www.academicjob.com";
		$content = "คุณได้สร้างบัญชีกับ www.academicjob.com เว้บไซต์ของเรา<br/>";
		$content .= "โปรดคลิกที่ลิงค์นี้เพื่อยืนยันการเป็นสมาชิกภายใน 24 ชม.<br/>";
		$content .= "<a href=\"http://{$_SERVER['HTTP_HOST']}/ACADEMIC_JOB/?Node=confirm_user&conf=$USER_CONFIRM_CODE\">Confirming Register!!</a><br/>";
		$content .= "โปรดอย่าคลิกถ้าหากคุณคิดว่าคุณไม่ได้สมัครสมาชิกกับทางเรา หรือ อีเมลนี้ไม่ใช่ของคุณ<br/>";
		$content .= "สุดท้ายนี้ทางเราต้องขอขอบพระคุณในความกรุณาที่ไว้วางใจใช้บริการกับทางเว็บไซต์ของเรา<br/>";
		$content .= "หากคุณมีปัญหาในการใช้งานกรุณาติดต่อกับมายัง <a href=\"mailto:info@academicjob.com\">info@academicjob.com</a><br/>";
		$content .= "ทางทีมงานจะรีบติดต่อกลับไปเพื่อแก้ไขและอำนวยความสะดวกให้กับท่าน<hr/>";
		/*if(sendMail($USER_EMAIL,$subject,$header,$content)){
			echo "<div align=\"center\">สมัครสมาชิกเรียบร้อยแล้ว กรุณารอสักครู่</div>";	
		}else{
			echo "<div align=\"center\">การส่งอีเมล์มีปัญหากรุณาแจ้งปัญหากับทางทีมงาน</div>";
		}*/
		echo "<div align=\"center\">ท่านได้ลงทะเบียนกับเว็บไซต์ของเราแล้ว<br />เพื่อให้การลงทะเบียนสมบูรณ์ กรุณายืนยันการลงทะเบียนที่อีเมล์ของท่าน</div>";
	}else{
		echo "<div align=\"center\">ระบบมีปัญหาโปรดลองอีกครั้ง</div>";	
	}
?>