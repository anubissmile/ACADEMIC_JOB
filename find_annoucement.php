<?php
  if(isset($_POST['type_work']) && isset($_POST['type_org'])){
    $type_work = $_POST['type_work'];
    $type_org = $_POST['type_org'];
  }else{
    $type_work = "งานทั้งหมด";
    $type_org = "ทุกหน่วยงาน";
  }
?>
<div class="block">
            	<div class="head-block first">ดูประกาศ Free!</div>
                <div class="content-block">
                <form id="frm-view-annoucement" name="frm-view-annoucement" method="post" action="index.php">
               	  <div class="head-block" style="font-size:0.9em;">ประเภทงาน</div>
                    <table width="100%" border="0">
                      <tr>
                        <td width="12%">
                          <input type="radio" name="type_work" id="type_work" value="งานอาจารย์" 
	<?=$type_work == 'งานอาจารย์' ? "checked=\"checked\"" : "";?>/></td>
                        <td width="88%"><label for="type_work">&nbsp;งานอาจารย์</label></td>
                      </tr>
                      <tr>
                        <td><input type="radio" name="type_work" id="type_work2" value="งานบุคลากรสนับสนุน" 
	<?=$type_work == 'งานบุคลากรสนับสนุน' ? "checked=\"checked\"" : "";?>/></td>
                        <td><label for="type_work2">&nbsp;งานบุคลากรสนับสนุน</label></td>
                      </tr>
                      <tr>
                        <td><input type="radio" name="type_work" id="type_work3" value="งานไอที" 
	<?=$type_work == 'งานไอที' ? "checked=\"checked\"" : "";?>/></td>
                        <td><label for="type_work3">&nbsp;งานไอที</label></td>
                      </tr>
                      <tr>
                        <td><input name="type_work" type="radio" id="type_work4" value="งานทั้งหมด" 
	<?=$type_work == 'งานทั้งหมด' || !isset($type_work) ? "checked=\"checked\"" : "";?>/></td>
                        <td><label for="type_work4">&nbsp;งานทั้งหมด</label></td>
                      </tr>
                    </table>
               	  <div class="head-block" style="font-size:0.9em;">สถาบันการศึกษา</div>
                  <table width="100%" border="0">
                    <tr>
                      <td width="12%"><input name="type_org" type="radio" id="type_work5" value="ทุกหน่วยงาน" <?=$type_org == 'ทุกหน่วยงาน' || !isset($type_org) ? "checked=\"checked\"" : "";?> /></td>
                      <td width="88%"><label for="type_work5">&nbsp;ทุกหน่วยงาน</label></td>
                    </tr>
                    <tr>
                      <td width="12%"><input name="type_org" type="radio" id="type_work6" value="มหาวิทยาลัย" <?=$type_org == 'มหาวิทยาลัย' ? "checked=\"checked\"" : "";?>/></td>
                      <td width="88%"><label for="type_work6">&nbsp;มหาวิทยาลัย</label></td>
                    </tr>
                    <tr>
                      <td><input type="radio" name="type_org" id="type_work7" value="วิทยาลัย" <?=$type_org == 'วิทยาลัย' ? "checked=\"checked\"" : "";?>/></td>
                      <td><label for="type_work7">&nbsp;วิทยาลัย</label></td>
                    </tr>
                    <tr>
                      <td><input type="radio" name="type_org" id="type_work8" value="โรงเรียน" <?=$type_org == 'โรงเรียน' ? "checked=\"checked\"" : "";?>/></td>
                      <td><label for="type_work8">&nbsp;โรงเรียน</label></td>
                    </tr>
                    <tr>
                      <td><input type="radio" name="type_org" id="type_work9" value="สถานศึกษาทั่วไป" <?=$type_org == 'สถานศึกษาทั่วไป' ? "checked=\"checked\"" : "";?>/></td>
                      <td><label for="type_work9">&nbsp;สถานศึกษาทั่วไป</label></td>
                    </tr>
                  </table>
                  <div align="center"><br />
                  	<a href="#" class="btn-submit-add top-left bottom-right parent-size" id="btn-submit-view">เรียกดู</a>
					<br /><br />
                  </div>
                </form>
                </div>
          </div>