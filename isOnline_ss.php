<?php
	include_once("lib/lib.inc.php");
	if(isOnline()){
		echo json_encode(array('val' => true, 'msg' => 'online'));
	}else{
		echo json_encode(array('val' => false, 'msg' => 'no online'));
	}
?>