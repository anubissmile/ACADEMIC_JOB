<script src="js/jquery-academic-job.js" type="text/javascript" ></script>    	
<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/adapters/jquery.js"></script>	
			<?php
				if(!isOnline()){
					echo '<script type="text/javascript">showContent("SignIn.php");</script>';
					die();
				}
				if(isset($_GET['ann_id'])){
					$ann_id = base64_decode($_GET['ann_id']);
					$SQL = "SELECT * FROM annoucement WHERE ANN_CODE = '$ann_id'; ";
					DBBegin();
					$response = DBQuery($SQL);
					if($response){
						$ANN_TITLE = stripslashes(DBResult($response,0,'ANN_TITLE'));
						$ANN_KEYWORD = stripslashes(DBResult($response,0,'ANN_KEYWORD'));
						$ANN_SHORT_DESCRIBE = stripslashes(DBResult($response,0,'ANN_SHORT_DESCRIBE'));
						$ANN_DESCRIBE = stripslashes(DBResult($response,0,'ANN_DESCRIBE'));
						$ANN_JOB_TYPE = stripslashes(DBResult($response,0,'ANN_JOB_TYPE'));
						$ANN_EDU_LEVEL = stripslashes(DBResult($response,0,'ANN_EDU_LEVEL'));
						DBCommit();
					}else{
						DBRollback();
					}
				}
				
				$SQL = "SELECT * FROM job_type ORDER BY JOB_TYPE_CODE ASC; ";
				$response = DBQuery($SQL);
				while($re = DBFetch($response)){
					if($re['JOB_TYPE_CODE'] != '0004'){
						$jobtype .= $ANN_JOB_TYPE == $re['JOB_TYPE_CODE'] ? "<option selected value=\"{$re['JOB_TYPE_CODE']}\">{$re['JOB_TYPE_NAME']}</option>"
							: "<option value=\"{$re['JOB_TYPE_CODE']}\">{$re['JOB_TYPE_NAME']}</option>";
					}
				}
				$SQL = "SELECT * FROM edu_level ORDER BY EDU_LEVEL_CODE ASC; ";
				$response = DBQuery($SQL);
				while($re = DBFetch($response)){
					$edulevel .= $ANN_EDU_LEVEL == $re['EDU_LEVEL_CODE'] ? "<option selected value=\"{$re['EDU_LEVEL_CODE']}\">{$re['EDU_LEVEL_NAME']}</option>"
						: "<option value=\"{$re['EDU_LEVEL_CODE']}\">{$re['EDU_LEVEL_NAME']}</option>";
				}
				
			?>
<p align="center">แก้ไขประกาศ</p>
<form action="" method="post" enctype="multipart/form-data" name="add_ann" id="add_ann">
<table width="100%" border="0" align="center">
  <tr>
    <td width="18%" align="right" valign="middle"><span class="normal-text">หัวข้อ&nbsp;:&nbsp;</span></td>
    <td width="82%">
      <input value="<?=$ANN_TITLE;?>" name="ANN_TITLE" type="text" class="normal-text" id="ANN_TITLE" maxlength="150" style="width:80%;" placeholder="หัวข้อ"></td>
  </tr>
  <tr>
    <td align="right" valign="middle"><span class="normal-text">คีย์เวิร์ดและตำแหน่งงาน&nbsp;:&nbsp;</span></td>
    <td><input value="<?=$ANN_KEYWORD;?>" name="ANN_KEYWORD" type="text" class="normal-text" id="ANN_KEYWORD" style="width:80%;" maxlength="255" placeholder="ทุนการศึกษา,สมัคร,ไอที,คลัง,ทะเบียน,บัญชี"></td>
  </tr>
  <tr>
    <td align="right" valign="top"><span class="normal-text">คำโปรย&nbsp;:&nbsp;</span></td>
    <td valign="top"><input value="<?=$ANN_SHORT_DESCRIBE;?>" name="ANN_SHORT_DESCRIBE" type="text" class="normal-text" id="ANN_SHORT_DESCRIBE" style="width:80%;" value="" maxlength="100" placeholder="เนื้อหาหรือใจความสั้นๆ" /></td>
  </tr>
  <tr>
    <td align="right" valign="top"><span class="normal-text">เนื้อหาประกาศ&nbsp;:&nbsp;</span></td>
    <td><textarea name="ANN_DESCRIBE" rows="15" wrap="virtual" class="normal-text" id="ANN_DESCRIBE" style="width:100%;" placeholder="เนื้อหาประกาศ"> <?=$ANN_DESCRIBE;?></textarea></td>
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
        <input name="ANN_CODE" type="hidden" id="ANN_CODE" value="<?=$ann_id;?>">
    </td>
  </tr>
<!--  <tr>
    <td align="right" valign="middle"><span class="normal-text">ภาพประกอบ&nbsp;:&nbsp;</span></td>
    <td><input type="file" name="fileField" id="fileField" ></td>
  </tr>-->
  <tr>
    <td align="right" valign="middle">&nbsp;</td>
    <td><a href="#" class="btn-submit-add top-left bottom-right" id="btn-submit-edit">แก้ไขบทความ</a></td>
  </tr>
</table>
</form>

<script type="text/javascript">
	$('textarea#ANN_DESCRIBE').ckeditor();
	$('#ANN_TITLE').focus();
	submitEditListener();
</script>