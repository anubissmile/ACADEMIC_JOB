<?php
	include_once("lib/lib.inc.php");
?>
<div id="cp-headblock" align="center" style="background-color:#FFFF00;" class="glyph-cogwheel-bef top-left bottom-right head-fix">
	Control Panels
</div>
<div class="align-center normal-text" align="left">
	<a href="#cp-headblock" id="loadUser" class="btn-flat glyph-parents-bef"><br/>&nbsp;&nbsp;ผู้ใช้งาน&nbsp;&nbsp;</a>
	<a href="#cp-headblock" id="loadUserAnn" class="btn-flat glyph-bullhorn-bef"><br/>&nbsp;&nbsp;ประกาศ&nbsp;&nbsp;</a>
	<a href="#cp-headblock" id="loadInform" class="btn-flat glyph-warning-sign-bef"><br/>&nbsp;&nbsp;แจ้งปัญหาการใช้งาน&nbsp;&nbsp;</a>
	<a href="#cp-headblock" id="loadConfirmPayment" class="btn-flat glyph-usd-bef"><br/>&nbsp;&nbsp;ผู้ยืนยันการชำระเงิน&nbsp;&nbsp;</a>
	<a href="#cp-headblock" id="loadManageProduct" class="btn-flat glyph-shopping-cart-bef"><br/>&nbsp;&nbsp;จัดการสินค้า&บริการ&nbsp;&nbsp;</a>
	<a href="#cp-headblock" id="loadAdvertising" class="btn-flat glyph-shop-window-bef"><br/>&nbsp;&nbsp;โฆษณา&nbsp;&nbsp;</a>
</div>
<p>
<div id="playground" class="playground normal-text">
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
		loadSetting();
	});
</script>