<div align="center">สมัครสมาชิก</div>
<form name="frm-register" id="frm-register" class="frm-register" method="post" action="">
<table width="95%" border="0">
  <tr>
    <td width="24%" align="right" valign="middle"><strong class="normal-text">ชื่อ&nbsp;:&nbsp;</strong></td>
    <td width="76%">
      <input type="text" name="USER_NAME" id="USER_NAME" class="normal-text" placeholder="ชื่อ" style="width:40%;" >    </td>
  </tr>
  <tr>
    <td align="right" valign="middle"><strong class="normal-text">นามสกุล&nbsp;:&nbsp;</strong></td>
    <td><input type="text" name="USER_LASTNAME" id="USER_LASTNAME" class="normal-text" placeholder="นามสกุล" style="width:40%;"></td>
  </tr>
  <tr>
    <td align="right" valign="middle"><strong class="normal-text">รหัสผ่าน&nbsp;:&nbsp;</strong></td>
    <td><input type="password" name="USER_PASSWORD" id="USER_PASSWORD" class="normal-text" placeholder="รหัสผ่าน" style="width:40%;"></td>
  </tr>
  <tr>
    <td align="right" valign="middle"><strong class="normal-text">อีเมลล์&nbsp;:&nbsp;</strong></td>
    <td><input type="text" name="USER_EMAIL" id="USER_EMAIL" class="normal-text" placeholder="อีเมลล์" style="width:40%;"></td>
  </tr>
  <tr>
    <td align="right" valign="middle"><strong class="normal-text">เบอร์โทรศัพท์&nbsp;:&nbsp;</strong></td>
    <td><input type="text" name="USER_TEL" id="USER_TEL" class="normal-text" placeholder="083-xxx-xxxx" style="width:40%;"></td>
  </tr>
  <tr>
    <td align="right" valign="middle"><strong class="normal-text">เบอร์โทรศัพท์(สำนักงาน)&nbsp;:&nbsp;</strong></td>
    <td><input type="text" name="USER_OFFICE_TEL" id="USER_OFFICE_TEL" class="normal-text" placeholder="02-xxx-xxxx" style="width:40%;" /></td>
  </tr>
  <tr>
    <td align="right" valign="middle"><strong class="normal-text">ชื่อสถานศึกษา&nbsp;:&nbsp;</strong></td>
    <td><input type="text" name="USER_ORG_NAME" id="USER_ORG_NAME" class="normal-text" placeholder="ชื่อองค์กร" style="width:40%;"></td>
  </tr>
  <tr>
    <td align="right" valign="top"><strong class="normal-text">ที่อยู่&nbsp;:&nbsp;</strong></td>
    <td><textarea name="USER_ADDRESS" rows="5" class="normal-text" id="USER_ADDRESS" style="width:60%;" placeholder="ที่อยู่"></textarea></td>
  </tr>
  <tr>
    <td align="right" valign="middle"><strong class="normal-text">เว็บไซต์&nbsp;:&nbsp;</strong></td>
    <td><span class="normal-text">http://&nbsp;</span><input type="text" name="USER_WEBSITE" id="USER_WEBSITE" class="normal-text" placeholder="www.academic-job.com" style="width:40%;"></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle">
    	<br />
		<a href="#" class="btn-submit-add top-left bottom-right" id="btn-submit-register">ยืนยัน</a><br />     </td>
    </tr>
</table>
</form>
<script src="js/jquery-academic-job.js" type="text/javascript" async="async"></script>
<script type="text/javascript">
	$(document).ready(function(e) {
		$('#USER_NAME').focus();
        registerListener();
    });
</script>