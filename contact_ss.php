<?php
	include_once("lib/lib.inc.php");
	
	$INF_EMAIL = $_POST['INF_EMAIL'];
	$INF_PHONE = $_POST['INF_PHONE'];
	$INF_MESSAGE = $_POST['INF_MESSAGE'];
	$INF_DATE = date("Y-m-d H:i:s");
	$INF_USER_CODE = isOnline() ? $_SESSION['ajuser']['code'] : 'Anonymous';
	
	$SQL = "INSERT INTO `inform` (`INF_ID`, `INF_EMAIL`, `INF_PHONE`, `INF_MESSAGE`, `INF_DATE`, `INF_USER_CODE`) 
			VALUES (NULL, '$INF_EMAIL', '$INF_PHONE', '$INF_MESSAGE', '$INF_DATE', '$INF_USER_CODE');";
	
	DBBegin();
	if(DBQuery($SQL)){
		DBCommit();
		echo json_encode(array('status' => true, 'msg' => "รับแจ้งปัญหาการใช้งานเรียบร้อย<br/>โปรดรอการติดต่อจากทีมงานทางอีเมล์"));
	}else{
		DBRollback();
		echo json_encode(array('status' => false, 'msg' => "การแจ้งปัญหาการใช้งานไม่สำเร็จกรุณารออีกครั้ง"));
	}
?>