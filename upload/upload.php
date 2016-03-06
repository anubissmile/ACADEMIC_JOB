<?php
	include_once("../lib/lib.inc.php");
				
	if(isset($_SESSION['uploaddir'])){
		unset($_SESSION['uploaddir']);	
	}
	
	if(!empty($_FILES['Figure'])){
		$amount = count($_FILES['Figure']['name']);
		for($i=0;$i<$amount;$i++){
			$name = $_FILES['Figure']['name'][$i];
			$err = $_FILES['Figure']['error'][$i];
			$type = FileImageTypeRestrict($name);
			if(!$type){
				echo "| $name | ไม่ใช่ไฟล์ภาพ <hr />";
			}else{
				if($err == 0){
					$new_dir = 'images/product_figure/' . rand(0,99999999) . '.' . date("YmdHis") . ".$type";
					$_SESSION['uploaddir'][] = $new_dir;
					if(move_uploaded_file($_FILES['Figure']['tmp_name'][$i],'../'.$new_dir)){
						echo "$name<br/>"; 
						//echo round(($_FILES['Figure']['size'][$i]/1024),2)." MB<br/>"; 
						//echo $_FILES['Figure']['tmp_name'][$i]."<br/>"; 
						//echo $_FILES['Figure']['error'][$i]."<br/>"; 
						//echo $_FILES['Figure']['type'][$i]."<br/>"; 
						echo "<img src=\"../$new_dir\" width=\"100\" />";	
						echo "<hr/>";	
					}else{
						echo "| $name | ผิดพลาดไม่สามารถอัพโหลดไฟล์ได้ <hr/>";
					}
				}
			}
		}
	}else{
		echo "| ผิดพลาดไม่สามารถอัพโหลดไฟล์ได้ <hr/>";
	}
?>
<!--<script src="../js/jquery-2.1.0.js" ></script>
<script src="../js/jquery-academic-job.js" async></script>-->