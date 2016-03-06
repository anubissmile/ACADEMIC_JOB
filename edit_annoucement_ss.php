<?php
	include_once("lib/lib.inc.php");
	
	$ANN_CODE = addslashes($_POST["ANN_CODE"]);
	$ANN_TITLE = addslashes($_POST["ANN_TITLE"]);
	$ANN_KEYWORD = addslashes($_POST["ANN_KEYWORD"]);
	$ANN_SHORT_DESCRIBE = addslashes($_POST["ANN_SHORT_DESCRIBE"]);
	$ANN_DESCRIBE = addslashes($_POST["ANN_DESCRIBE"]);
	$ANN_JOB_TYPE = addslashes($_POST["ANN_JOB_TYPE"]);
	$ANN_EDU_LEVEL = addslashes($_POST["ANN_EDU_LEVEL"]);
	$ANN_DATE = date('Y-m-d H:i:s');
	$USER_CODE = $_SESSION['ajuser']['code'];
		
	$SQL = "UPDATE annoucement 
			SET ANN_TITLE = '$ANN_TITLE', ANN_KEYWORD = '$ANN_KEYWORD', ANN_SHORT_DESCRIBE = '$ANN_SHORT_DESCRIBE', 
			ANN_DESCRIBE = '$ANN_DESCRIBE', ANN_JOB_TYPE = '$ANN_JOB_TYPE', ANN_EDU_LEVEL = '$ANN_EDU_LEVEL' 
			WHERE ANN_CODE = '$ANN_CODE';";
			
	DBBegin();
	if(DBQuery($SQL)){
		DBCommit();
		echo "<div align=\"center\">แก้ไขประกาศเรียบร้อยแล้ว</div>";	
	}else{
		DBRollback();
		echo "<div align=\"center\">ระบบมีปัญหาโปรดลองอีกครั้ง</div>";	
	}
?>