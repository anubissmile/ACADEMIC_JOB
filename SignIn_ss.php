<?php
	include_once("lib/lib.inc.php");
	$usr = $_POST['usr'];
	$pwd = md5($_POST['pwd'].'academic_job_user');
	/*$usr = 'Wesarut@gmail.com';
	$pwd = md5('50');*/
	$SQL = "SELECT * FROM tb_user WHERE USER_EMAIL = '$usr' AND USER_PASSWORD = '$pwd' ;";
	$response = DBQuery($SQL);
	$USER_CONFIRM_STATUS = DBResult($response,0,"USER_CONFIRM_STATUS");
	$row = DBNumRow($response);
	if($row < 1){
		echo json_encode(array("status" => false , "name" => "ไม่พบบัญชีผู้ใช้นี้"));
	}else{
		if($USER_CONFIRM_STATUS == 2){
			$name = DBResult($response,0,"USER_ORG_NAME");
			$code = DBResult($response,0,"USER_CODE");
			$_SESSION['ajuser'] = array("user" => $usr, "password" => $pwd, "name" => $name, "code" => $code);
			echo json_encode(array("status" => true,"name" => $name,"confirm_status" => $USER_CONFIRM_STATUS));
		}else if($USER_CONFIRM_STATUS == 1){
			$name = DBResult($response,0,"USER_ORG_NAME");
			$code = DBResult($response,0,"USER_CODE");
			$_SESSION['ajuser'] = array("user" => $usr, "password" => $pwd, "name" => $name, "code" => $code);
			echo json_encode(array("status" => true,"name" => $name,"confirm_status" => $USER_CONFIRM_STATUS));
		}else{
			echo json_encode(array("status" => false , "name" => "การลงทะเบียนยังไม่สมบูรณ์ กรุณายืนยันการลงทะเบียนในอีเมล์ของท่านก่อน"));
		}
	}
?>