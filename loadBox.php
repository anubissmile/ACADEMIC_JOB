<?php
	include_once("lib/lib.inc.php");
	
	if(isset($_POST['USER_CODE'])){
		$SQL = "SELECT USR.*, ANN.*, LEV.*, TYP.*, COUNT(VIE.VIEW_ANN_CODE) as COUNT_VIEW, 
				VIE.VIEW_ANN_CODE, VIE.VIEW_DATE 
				FROM tb_user USR 
				LEFT JOIN annoucement ANN ON(ANN.ANN_USER_CODE = USR.USER_CODE AND ANN.ANN_TRASH_STATUS = '0' ) 
				LEFT JOIN edu_level LEV ON(LEV.EDU_LEVEL_CODE = ANN.ANN_EDU_LEVEL) 
				LEFT JOIN job_type TYP ON(TYP.JOB_TYPE_CODE = ANN.ANN_JOB_TYPE) 
				LEFT JOIN view_annoucement VIE ON(VIE.VIEW_ANN_CODE = ANN.ANN_CODE) 
				WHERE USR.USER_CODE = '{$_POST['USER_CODE']}' 
				GROUP BY ANN.ANN_CODE 
				ORDER BY ANN.ANN_DATE DESC 
				LIMIT 0,20; ";
		$response = DBQuery($SQL);
		$count = DBNumRow($response);
		while($re = DBFetch($response)){
			$code = stripslashes($re['ANN_CODE']);
			$id = stripslashes($re['ANN_ID']);
			$title = substr(stripslashes($re['ANN_TITLE']),0,80)."...";
			$date =  stripslashes($re['ANN_DATE']);
			$countview =  number_format(stripslashes($re['COUNT_VIEW']),0,'.',',');
?>
      <tr align="left" valign="middle" class="tr_ann">
        <td width="2%"><input type="checkbox" name="chk_ann" class="chk_ann" value="<?=$code;?>"></td>
        <td>&nbsp;<?="$title $date (พบเห็นแล้ว $countview คน)";?></td>
      </tr>
<?php
		}
	}else{
		echo "fail";
	}
?>