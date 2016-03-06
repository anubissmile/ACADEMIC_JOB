<?php
	include_once("lib/lib.inc.php");
	
	//$SQL = "SELECT * FROM tb_user WHERE USER_LEVEL = 4 LIMIT 0,25 ; ";
	$SQL = "SELECT * FROM tb_user LIMIT 0,25 ; ";
	DBBegin();
	$response = DBQuery($SQL);
	if($response){
		DBCommit();	
?>
<table class="datatable" width="100%" border="1" align="center">
  <tr align="center" valign="middle" bgcolor="#99CC00">
    <td width="10%">&nbsp;</td>
    <td width="45%"><strong>ชื่อ-นามสกุล</strong></td>
    <td width="45%"><strong>องค์กร</strong></td>
  </tr>
<?php
		while($re = DBFetch($response)){
			$r++;
			$USER_CODE = $re['USER_CODE'];
			$USER_NAME = $re['USER_NAME'];
			$USER_LASTNAME = $re['USER_LASTNAME'];
			$USER_EMAIL = $re['USER_EMAIL'];
			$USER_ORG_NAME = $re['USER_ORG_NAME'];
			$USER_TEL = $re['USER_TEL'];
			$USER_OFFICE_TEL = $re['USER_OFFICE_TEL'];
?>
  <tr align="center" valign="middle" bgcolor="#FFFFFF" class="row-user" id="<?=$USER_CODE;?>">
    <td><input id="<?="INP$USER_CODE";?>" class="chk-user" type="checkbox" name="chk" value="1"></td>
    <td><?="$USER_NAME $USER_LASTNAME";?>&nbsp;</td>
    <td>&nbsp;<?="$USER_ORG_NAME";?></td>
  </tr>
<?php
		}
	}else{
		DBRollback();
	}
?>
</table>   
<script type="text/javascript">
	$(document).ready(function(e){
		loadUserBox(event);
	});
</script>
