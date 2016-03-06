<?php
	include_once("lib/lib.inc.php");
	
	
	if(isset($_POST['ann_id']) && isset($_POST['USER_CODE'])){
		$ip = $_SERVER['REMOTE_ADDR'];
		$ann_id = $_POST['ann_id'];
		$USER_CODE = $_POST['USER_CODE'];
		$date = date("Y-m-d H:i:s");
		$SQL = "SELECT VIEW_ANN_CODE, VIEW_IP FROM view_annoucement 
				WHERE VIEW_ANN_CODE = '$ann_id' AND VIEW_IP = '$ip'; ";
		if(DBNumRow(DBQuery($SQL)) < 1){
			$SQL = "INSERT INTO view_annoucement (VIEW_ID, VIEW_ANN_CODE, VIEW_USER_CODE, VIEW_IP, VIEW_DATE) 
					VALUES(NULL, '$ann_id', '$USER_CODE', '$ip', '$date'); ";
			if(DBQuery($SQL)){
				echo json_encode(array('value' => true, 'msg' => 'success'));
			}else{
				echo json_encode(array('value' => false, 'msg' => 'inserting was failed!'));
			}
		}else{
			echo json_encode(array('value' => true, 'msg' => 'success'));
		}
		
	}else{
		echo json_encode(array('value' => false, 'msg' => 'failed'));
	}
	
	
?>