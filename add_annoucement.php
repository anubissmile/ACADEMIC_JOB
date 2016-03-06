<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/adapters/jquery.js"></script>	
			<?php
				if(!isOnline()){
					echo '<script type="text/javascript">showContent("SignIn.php");</script>';
				}
				$SQL = "SELECT * FROM job_type ORDER BY JOB_TYPE_CODE ASC; ";
				$response = DBQuery($SQL);
				while($re = DBFetch($response)){
					if($re['JOB_TYPE_CODE'] != '0004'){
						$jobtype .= "<option value=\"{$re['JOB_TYPE_CODE']}\">{$re['JOB_TYPE_NAME']}</option>";
					}
				}
				$SQL = "SELECT * FROM edu_level ORDER BY EDU_LEVEL_CODE ASC; ";
				$response = DBQuery($SQL);
				while($re = DBFetch($response)){
					$edulevel .= "<option value=\"{$re['EDU_LEVEL_CODE']}\">{$re['EDU_LEVEL_NAME']}</option>";
				}
			?>
<p align="center">เพิ่มประกาศใหม่</p>
<form action="" method="post" enctype="multipart/form-data" name="add_ann" id="add_ann">
<table width="100%" border="0" align="center">
  <tr>
    <td width="18%" align="right" valign="middle"><span class="normal-text">หัวข้อ&nbsp;:&nbsp;</span></td>
    <td width="82%">
      <input name="ANN_TITLE" type="text" class="normal-text" id="ANN_TITLE" maxlength="150" style="width:80%;" placeholder="หัวข้อ"></td>
  </tr>
  <tr>
    <td align="right" valign="middle"><span class="normal-text">คีย์เวิร์ดและตำแหน่งงาน&nbsp;:&nbsp;</span></td>
    <td><input name="ANN_KEYWORD" type="text" class="normal-text" id="ANN_KEYWORD" style="width:80%;" maxlength="255" placeholder="ทุนการศึกษา,สมัคร,ไอที,คลัง,ทะเบียน,บัญชี"></td>
  </tr>
  <tr>
    <td align="right" valign="top"><span class="normal-text">คำโปรย&nbsp;:&nbsp;</span></td>
    <td valign="top"><input name="ANN_SHORT_DESCRIBE" type="text" class="normal-text" id="ANN_SHORT_DESCRIBE" style="width:80%;" value="" maxlength="100" placeholder="เนื้อหาหรือใจความสั้นๆ" /></td>
  </tr>
  <tr>
    <td align="right" valign="top"><span class="normal-text">เนื้อหาประกาศ&nbsp;:&nbsp;</span></td>
    <td><textarea name="ANN_DESCRIBE" rows="15" wrap="virtual" class="normal-text" id="ANN_DESCRIBE" style="width:100%;" placeholder="เนื้อหาประกาศ"></textarea></td>
  </tr>
  <tr>
    <td align="right" valign="middle"><span class="normal-text">ประเภทงาน&nbsp;:&nbsp;</span></td>
    <td>
        <select name="ANN_JOB_TYPE" id="ANN_JOB_TYPE" class="normal-text">
          <?=$jobtype;?>
        </select>
    </td>
  </tr>
  <tr>
    <td align="right" valign="middle"><span class="normal-text">ประเภทสถานศึกษา&nbsp;:&nbsp;</span></td>
    <td>
        <select name="ANN_EDU_LEVEL" id="ANN_EDU_LEVEL" class="normal-text">
          <?=$edulevel;?>
        </select>
    </td>
  </tr>
<!--  <tr>
    <td align="right" valign="middle"><span class="normal-text">ภาพประกอบ&nbsp;:&nbsp;</span></td>
    <td><input type="file" name="fileField" id="fileField" ></td>
  </tr>-->
  <tr>
    <td align="right" valign="middle">&nbsp;</td>
    <td><a href="#" class="btn-submit-add top-left bottom-right" id="btn-submit-add">เพิ่มบทความ</a></td>
  </tr>
</table>
</form>
<script src="js/jquery-academic-job.js" type="text/javascript" ></script>    
<script type="text/javascript">
	$(document).ready(function(e) {
		$( 'textarea#ANN_DESCRIBE' ).ckeditor();
		$('#ANN_TITLE').focus();
		add_annoucement();
    });
</script>