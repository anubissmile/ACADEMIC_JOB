<?php
	include_once("lib/lib.inc.php");
?>
<div id="cp-headblock" align="center" style="background-color:#FFFF00;" class="glyph-cogwheel-bef top-left bottom-right head-fix">
	Control Panel
</div>
<div class="align-center normal-text" align="left">
	<a href="#cp-headblock" id="loadUser" class="btn-flat glyph-parents-bef"><br/>&nbsp;&nbsp;ผู้ใช้งาน&nbsp;&nbsp;</a>
	<a href="#cp-headblock" id="loadUserAnn" class="btn-flat glyph-bullhorn-bef"><br/>&nbsp;&nbsp;ประกาศ&nbsp;&nbsp;</a>
	<a href="#cp-headblock" id="loadTrash" class="btn-flat glyph-bin-bef"><br/>&nbsp;&nbsp;ถังขยะ&nbsp;&nbsp;</a>
	<a href="#cp-headblock" id="loadInform" class="btn-flat glyph-warning-sign-bef"><br/>&nbsp;&nbsp;แจ้งปัญหาการใช้งาน&nbsp;&nbsp;</a>
	<a href="#cp-headblock" id="loadConfirmPayment" class="btn-flat glyph-usd-bef"><br/>&nbsp;&nbsp;ยืนยันการชำระเงิน&nbsp;&nbsp;</a>
</div>
<p>
<div id="playground" class="playground parent-size">
	<br/>
    	
    <br/>
</div>
</p>
<script src="js/jquery-academic-job.js" type="text/javascript" async></script>    
<script type="text/javascript">
	$(document).ready(function(e){
		
		nowLoading($("#playground"),function(){
			$("#playground").load("loadUser_ss.php");
		});
		loadUserSetting();
	});
</script>