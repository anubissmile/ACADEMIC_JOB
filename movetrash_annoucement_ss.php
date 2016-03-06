<?php
	include_once("lib/lib.inc.php");
	//$_POST['value'] = array('0011','0012');
	$status = $_POST['status'];
	foreach($_POST['value'] as $v){
		$SQL1[] = "UPDATE annoucement SET ANN_TRASH_STATUS = '$status' WHERE ANN_CODE = '$v'; ";
	}
	
	for($i=0;$i<count($SQL1);$i++){
		if(DBQuery($SQL1[$i])){
			DBCommit();
			echo true;
		}else{
			DBRollback();
			echo "ERROR!\nSomething had wrong.\nPlease try again.";	
		}
	}
	
?>