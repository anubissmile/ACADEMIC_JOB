<div align="center"></div>
<form name="frm-register" id="frm-register" class="frm-register" method="post" action="">
<table width="95%" border="0" align="center">
  <tr>
    <td align="center" valign="middle"><div class="top-left bottom-right" style="background-color:#CCCCCC;">เข้าสู่ระบบ</div></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><strong class="normal-text">กรุณาใส่อีเมลล์</strong></td>
    </tr>
  <tr>
    <td align="center" valign="middle"><input type="text" name="USER_EMAIL" id="USER_EMAIL" class="normal-text" placeholder="example@mail.com" style="width:40%;" /></td>
    </tr>
  <tr>
    <td align="center" valign="middle"><strong class="normal-text">กรุณาใส่รหัสผ่าน</strong></td>
    </tr>
  <tr>
    <td align="center" valign="middle"><input type="password" name="USER_PASSWORD" id="USER_PASSWORD" class="normal-text" placeholder="password" style="width:40%;"></td>
    </tr>
  <tr>
    <td align="center" valign="middle">
    	<br />
		<a href="#" class="btn-submit-add top-left bottom-right" id="btn-submit-signin">ยืนยัน</a>&nbsp;&nbsp;&nbsp;
		<a href="#" class="btn-submit-cancel top-left bottom-right" id="btn-cancel-signin">ไม่ใช่ตอนนี้!</a>
        <br />    </td>
    </tr>
</table>
</form>
<script type="text/javascript">
	SigninListener();
	$('#USER_EMAIL').focus();
</script>