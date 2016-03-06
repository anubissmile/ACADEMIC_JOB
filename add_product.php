<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/adapters/jquery.js"></script>	
<p align="center" class="parent-size">เพิ่มสินค้าและบริการ</p>
<form action="upload/upload.php" target="showimg" method="post" enctype="multipart/form-data" name="add_product" id="add_product">
<table width="100%" border="0" align="center">
  <tr>
    <td width="18%" align="right" valign="middle"><span class="parent-size">ชื่อสินค้า &amp; บริการ&nbsp;:&nbsp;</span></td>
    <td width="82%">
      <input name="PRO_NAME" type="text" class="parent-size" id="PRO_NAME" maxlength="150" style="width:80%;" placeholder="หัวข้อ"></td>
  </tr>
  <tr>
    <td align="right" valign="middle"><span class="parent-size">รุ่น&nbsp;:&nbsp;</span></td>
    <td><input name="PRO_MODEL" type="text" class="parent-size" id="PRO_MODEL" style="width:80%;" maxlength="255" placeholder="ทุนการศึกษา,สมัคร,ไอที,คลัง,ทะเบียน,บัญชี"></td>
  </tr>
  <tr>
    <td align="right" valign="top"><span class="parent-size">ราคา&nbsp;:&nbsp;</span></td>
    <td valign="top"><input name="PRO_PRICE" type="text" class="parent-size" id="PRO_PRICE" style="width:80%;" value="" maxlength="100" placeholder="เนื้อหาหรือใจความสั้นๆ" /></td>
  </tr>
  <tr>
    <td align="right" valign="top"><span class="parent-size">คำอธิบาย&nbsp;:&nbsp;</span></td>
    <td><textarea name="PRO_DESC" rows="15" wrap="virtual" class="parent-size" id="PRO_DESC" style="width:100%;" placeholder="เนื้อหาประกาศ"></textarea></td>
  </tr>
<!--  <tr>
    <td align="right" valign="middle"><span class="normal-text">ภาพประกอบ&nbsp;:&nbsp;</span></td>
    <td><input type="file" name="fileField" id="fileField" ></td>
  </tr>-->
  <tr valign="bottom">
    <td align="right"><span class="parent-size">ภาพประกอบ&nbsp;:&nbsp;</span></td>
    <td>
    	<br /><input class="parent-size" type="file" name="Figure[]" id="Figure">
    	<!--<a href="#" class="parent-size btn-submit-upload top-left bottom-right glyph-upload-bef" id="btn-submit-upload">&nbsp;&nbsp;อัพโหลด&nbsp;&nbsp;</a>-->
    	<a href="#" class="parent-size glyph-upload-bef" id="btn-submit-upload"></a>
    </td>
  </tr>
  <tr>
    <td align="right" valign="middle">&nbsp;</td>
    <td><br />&nbsp;<iframe name="showimg" class="ifm-upload"></iframe></td>
  </tr>
  <tr>
    <td align="right" valign="middle">&nbsp;</td>
    <td><br/><a href="#" class="parent-size btn-submit-add top-left bottom-right" id="btn-submit-addproduct">เพิ่มสินค้า</a></td>
  </tr>
</table>
</form>
<script src="js/jquery-academic-job.js" type="text/javascript" ></script>    
<script type="text/javascript">
	$(document).ready(function(e) {
		$('textarea#PRO_DESC').ckeditor();
		$('#PRO_NAME').focus();
		addProductListener();
    });
</script>