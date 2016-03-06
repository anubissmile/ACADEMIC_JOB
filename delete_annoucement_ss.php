<?php
	include_once("lib/lib.inc.php");
	//$_POST['value'] = array('0011','0012');
	
	foreach($_POST['value'] as $v){
		$SQL1[] = " DELETE FROM annoucement WHERE ANN_CODE = '$v'; ";
		$SQL2[] = " DELETE FROM view_annoucement WHERE VIEW_ANN_CODE = '$v'; ";
	}
	
	for($i=0;$i<count($SQL1);$i++){
		if(DBQuery($SQL1[$i]) && DBQuery($SQL2[$i])){
			DBCommit();
			echo true;
		}else{
			DBRollback();
			echo "ERROR!\nSomething had wrong.\nPlease try again.";	
		}
	}
	
?>