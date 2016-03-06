<?php
	include_once("lib/lib.inc.php");
	
	$ANN_TITLE = addslashes($_POST["ANN_TITLE"]);
	$ANN_KEYWORD = addslashes($_POST["ANN_KEYWORD"]);
	$ANN_SHORT_DESCRIBE = addslashes($_POST["ANN_SHORT_DESCRIBE"]);
	$ANN_DESCRIBE = addslashes($_POST["ANN_DESCRIBE"]);
	$ANN_JOB_TYPE = addslashes($_POST["ANN_JOB_TYPE"]);
	$ANN_EDU_LEVEL = addslashes($_POST["ANN_EDU_LEVEL"]);
	$ANN_DATE = date('Y-m-d H:i:s');
	$USER_CODE = $_SESSION['ajuser']['code'];
		
	$ANN_CODE = GenerateID("SELECT ANN_CODE FROM annoucement ORDER BY ANN_CODE DESC;","ANN_CODE");
	$SQL = "INSERT INTO `academic_job`.`annoucement` (`ANN_ID`, `ANN_CODE`, `ANN_KEYWORD`, `ANN_TITLE`, `ANN_SHORT_DESCRIBE`, 
		`ANN_DESCRIBE`, `ANN_EDU_LEVEL`, `ANN_JOB_TYPE`, `ANN_TRASH_STATUS`, `ANN_IMG`, `ANN_USER_CODE`, `ANN_DATE`) 
		VALUES (NULL, '$ANN_CODE', '$ANN_KEYWORD', '$ANN_TITLE', '$ANN_SHORT_DESCRIBE', '$ANN_DESCRIBE', 
		'$ANN_EDU_LEVEL', '$ANN_JOB_TYPE', '0', NULL, '$USER_CODE', '$ANN_DATE');";
	
	if(DBQuery($SQL)){
		echo "<div align=\"center\">เพิ่มประกาศเรียบร้อยแล้ว</div>";	
	}else{
		echo "<div align=\"center\">ระบบมีปัญหาโปรดลองอีกครั้ง</div>";	
	}
?>