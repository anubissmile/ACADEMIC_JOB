<?php
	include_once("lib/lib.inc.php");
	
	if(isOnline()){
		$PRO_CODE = $_POST['PRO_CODE'];
		$mail = $_SESSION['ajuser']['user'];
		$ORDER_USER_CODE = $_SESSION['ajuser']['code'];
		$ORDER_CODE = GenerateID("SELECT ORDER_CODE FROM tb_order ORDER BY ORDER_CODE DESC ",'ORDER_CODE');
		$date = date('Y-m-d H:i:s');
		$SQL = "SELECT product.PRO_CODE, product.PRO_PRICE FROM product WHERE product.PRO_CODE =  '$PRO_CODE'";
		$TOTAL_PRICE = DBResult(DBQuery($SQL),0,'PRO_PRICE');
		$TOTAL_PRICE = $TOTAL_PRICE + (($TOTAL_PRICE * 7) / 100);
		$SQL = "INSERT INTO `tb_order` (`ORDER_ID`,`ORDER_CODE`,`ORDER_USER_CODE`,
				`ORDER_PRODUCT_CODE`,`ORDER_TOTAL_PRICE`,`ORDER_DATE`,`ORDER_CONFIRM_DATE`,
				`ORDER_CONFIRM_FIGURE`) VALUES 
				(NULL,'$ORDER_CODE','$ORDER_USER_CODE','$PRO_CODE','$TOTAL_PRICE','$date', NULL, NULL)";
				
		DBBegin();
		if(DBQuery($SQL)){
			/*$SQL = "SELECT * FROM `product` WHERE PRO_CODE = '$PRO_CODE' ";
			$result = DBQuery($SQL);
			$PRO_NAME = DBResult($result,0,'PRO_NAME');
			$PRO_PRICE = DBResult($result,0,'PRO_PRICE');
			$PRO_PRICE_VAT = number_format(getVat($PRO_PRICE,7),2,'.',',');
			$PRO_FIGURE = DBResult($result,0,'PRO_FIGURE');
			$PRO_FIGURE2 = "http://".$_SERVER['HTTP_HOST'].'/'.$PRO_FIGURE;
			$CONFIRM = "http://".$_SERVER['HTTP_HOST'].'/confirm/';
			
			$subject = "ACADEMIC-JOB.COM ขอบคุณสำหรับความไว้วางใจในบริการของเรา";
			$header = "From:Admin Academic-Job<info@academicjob.com>\r\n";
			$msg = "<img src=\"$PRO_FIGURE2\" width=\"80\" /><br/>";
			$msg .= "ขอบคุณในความไว้วางใจในบริการของเรา<br/>";
			$msg .= "<b>$PRO_NAME</b><br/>";
			$msg .= "เลขที่ออเดอร์ : $ORDER_CODE<br/>";
			$msg .= "ราคา : $PRO_PRICE_VAT THB<hr/><br/>";
			$msg .= "ชำระเงินได้ที่บัญชี 234323xxxx ธ.กสิกรไทย<br/>";
			$msg .= "และนำหลักฐานการชำระเงินมายืนยันที่ <a href=\"$CONFIRM\">$CONFIRM</a><hr/><br/>";*/
			//$result = sendMail($mail,$subject,$header,$msg);
			DBCommit();			
			echo json_encode(array('status' => true, 'desc' => 'ขอบคุณที่ไว้ใจในบริการของเรา โปรดตรวจสอบข้อมูลการสั่งซื้อได้ที่อีเมลล์ของท่าน', 'code' => 1));
		}else{
			DBRollback();
			echo json_encode(array('status' => false, 'desc' => 'เราขออภัย!!\nมีการเชื่อมต่อหรือการทำงานที่ผิดพลาด กรุณาลองใหม่อีกครั้ง', 'code' => 2));
		}
	}else{
		echo json_encode(array('status' => false, 'desc' => 'กรุณาล็อกอินหรือลงทะเบียนก่อน', 'code' => 3));
	}
?>