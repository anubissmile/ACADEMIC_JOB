<?php
	include_once("lib/lib.inc.php");
	
	$PRO_NAME = $_POST['PRO_NAME'];
	$PRO_MODEL = $_POST['PRO_MODEL'];
	$PRO_PRICE = $_POST['PRO_PRICE'];
	$PRO_DESC = addslashes($_POST['PRO_DESC']);
	$PRO_DATE = date("y-m-d H:i:s");
	
	foreach($_SESSION['uploaddir'] as $v){
		$fig .= "$v::";	
	}
	
	$PRO_CODE = GenerateID("SELECT PRO_CODE FROM product ORDER BY PRO_CODE DESC","PRO_CODE");
	$SQL = "INSERT INTO `product` (`PRO_ID`,`PRO_CODE`,`PRO_NAME`, 
			`PRO_MODEL`,`PRO_DESC`,`PRO_PRICE`,`PRO_USER`,`PRO_DATE`,`PRO_FIGURE`) 
			VALUES (NULL,'$PRO_CODE','$PRO_NAME','$PRO_MODEL', 
			'$PRO_DESC','$PRO_PRICE','{$_SESSION['ajuser']['code']}','$PRO_DATE','$fig')";
	
	DBBegin();
	if(DBQuery($SQL)){
		DBCommit();	
		unset($_SESSION['uploaddir']);
		echo json_encode(array('status' => true, 'desc' => 'เพิ่มข้อมูลเรียบร้อย'));
	}else{
		DBRollback();
		unset($_SESSION['uploaddir']);
		echo json_encode(array('status' => false, 'desc' => 'มีบางอย่างขัดข้องโปรดลองใหม่อีกครั้ง'));
	}
?>