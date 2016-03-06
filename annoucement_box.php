<?php
	include_once("lib/lib.inc.php");
	$USER_CODE = $_SESSION['ajuser']['code'];
?>
<div align="center" style="background-color:#FFFF00;" class="top-left bottom-right head-fix">
	กล่องประกาศ
</div>
<div align="center" class="normal-text">
	<br/>
    <div align="left">
        &nbsp;&nbsp;<a href="#" id="btn-add" class="btn-add top-left bottom-right parent-size">เขียนประกาศ</a>
        &nbsp;&nbsp;<a href="#" id="btn-edit" class="btn-edit top-left bottom-right parent-size">แก้ไข</a>
        &nbsp;&nbsp;<a href="#" id="btn-delete" class="btn-delete top-left bottom-right parent-size">ย้ายลงถังขยะ</a>
   </div><br>

	<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="ann-box carry" style="font-size:0.7em;">
      <tr align="left" valign="middle">
        <td width="2%" bgcolor="#CCCC00"><input type="checkbox" name="chk_all" id="chk_all" class="chk_all" value="2"></td>
        <td bgcolor="#CCCC00">&nbsp;เลือกทั้งหมด</span></td>
      </tr>
    </table>
</div>
<script src="js/jquery-academic-job.js" type="text/javascript"></script>
  <script type="text/javascript">
	$(document).ready(function(e) {
		loadBox("<?=$USER_CODE;?>");
		$('.chk_ann').click(function(){
			//$('.chk_ann').css('background-color','#CCC');
		});
    });
</script>