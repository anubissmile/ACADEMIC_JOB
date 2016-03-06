<?php
	include_once("lib/lib.inc.php");
?>
<div>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
</div>
<script src="js/jquery-academic-job.js" async></script>
<?php
	if(isset($_GET['conf'])){
		$conf = $_GET['conf'];
		$USER_CODE = explode('::',$conf);
		$SQL = "SELECT * FROM tb_user WHERE tb_user.USER_CODE =  '{$USER_CODE[0]}' AND 
			tb_user.USER_CONFIRM_CODE =  '$conf'";
		$response = DBQuery($SQL);
		$row = DBNumRow($response);
		if($row > 0){
			$date = date("Y-m-d H:i:s");
			$SQL = "UPDATE `tb_user` SET `USER_CONFIRM_DATE`='$date', 
					`USER_CONFIRM_STATUS`='1' WHERE (`USER_CODE`='{$USER_CODE[0]}')  ";
			DBBegin();
			if(DBQuery($SQL)){
				DBCommit();
?>
				<script>
					$(document).ready(function(e) {
						showNote('<p align="center">การลงทะเบียนเสร็จสมบูรณ์แล้ว กรุณาล็อกอินเพื่อเข้าใช้งาน</p>',true);
						setTimeout(function(){
							popup_close();
							showContent('SignIn.php?status=confirmsuccess');
						},3000);
                    });
                </script>
<?php
			}else{
				DBRollback();
?>
				<script>
					$(document).ready(function(e) {
						showNote('<p align="center">อาจมีการเชื่อมต่อที่ผิดพลาดทำให้การยืนยันยังไม่สมบูรณ์ กรุณาลองใหม่อีกครั้ง</p>',true);
						setTimeout(function(){
							popup_close();
							hyperlink("index.php?er=2",'_self');
						},3000);
                    });
                </script>
<?php
			}
		}else{
?>
				<script>
					$(document).ready(function(e) {
						showNote('<p align="center">ผิดพลาด! ไม่พบบัญชีผู้ใช้นี้</p>',true);
						setTimeout(function(){
							popup_close();
							hyperlink("index.php?er=3",'_self');
						},3000);
                    });
                </script>
<?php
		}
	}else{
?>
				<script>
					$(document).ready(function(e) {
						showNote('<p align="center">ผิดพลาด! ไม่พบเลขที่ยืนยันการลงทะเบียน</p>');
						setTimeout(function(){
							hyperlink("index.php?er=4",'_self');
						},4000);
                    });
                </script>
<?php 
	}
?>