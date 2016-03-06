<div align="center">
	<div align="center">ติดต่อกับเรา</div>
    <div class="normal-text">
    <form name="form1" method="post" action="">
      <table width="80%" border="0" align="center">
            <tr align="center" valign="middle">
              <td><strong class="">อีเมลล์</strong></td>
            </tr>
            <tr align="center" valign="middle">
              <td>
                <label for="INF_EMAIL"></label>
                <input type="text" placeholder="example@academic.com" name="INF_EMAIL" id="INF_EMAIL" style="width:40%;font-size:1em;">
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td><strong class="">เบอร์โทรศัพท์</strong></td>
            </tr>
            <tr align="center" valign="middle">
              <td>
                <label for="INF_PHONE"></label>
                <input type="text" placeholder="083-160-xxxx" name="INF_PHONE" id="INF_PHONE" class="normal-text" style="width:40%;font-size:1em;">
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td><strong class="">แจ้งปัญหา</strong></td>
            </tr>
            <tr align="center" valign="middle">
              <td><label for="INF_MESSAGE"></label>
              <textarea name="INF_MESSAGE" cols="30" rows="10" class="normal-text" id="INF_MESSAGE" style="width:60%;font-size:1em;"></textarea></td>
            </tr>
            <tr align="center" valign="middle">
              <td>
              	<br>
              	<a href="#" class="btn-submit-add top-left bottom-right parent-size" id="btn-submit-inform">ยืนยันการแจ้ง</a>
              </td>
            </tr>
      </table>
    </form>
    </div>
</div>
<script src="js/jquery-academic-job.js" type="text/javascript" ></script>  
<script type="text/javascript">
	$(document).ready(function(e) {
		$("#INF_EMAIL").focus();
        informListener();
    });
</script>