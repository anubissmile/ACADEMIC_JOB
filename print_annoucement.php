<?php
	ob_start();
	include("lib/lib.inc.php");
	
	$id = $_GET['id'];
	$SQL = "SELECT ANN.*,TYPE.*,EDU.*,USR.* FROM annoucement ANN
				LEFT JOIN job_type TYPE ON(TYPE.JOB_TYPE_CODE = ANN.ANN_JOB_TYPE) 
				LEFT JOIN edu_level EDU ON(EDU.EDU_LEVEL_CODE = ANN.ANN_EDU_LEVEL) 
				LEFT JOIN tb_user USR ON(USR.USER_CODE = ANN.ANN_USER_CODE) 
				WHERE ANN.ANN_CODE = '$id'  
				ORDER BY ANN.ANN_CODE DESC ;";
	$response = DBQuery($SQL);
	$ANN_TITLE = stripslashes(DBResult($response,0,"ANN_TITLE"));
	$ANN_DESCRIBE = stripslashes(DBResult($response,0,"ANN_DESCRIBE"));
	$ANN_KEYWORD = stripslashes(DBResult($response,0,"ANN_KEYWORD"));
	$ANN_SHORT_DESCRIBE = stripslashes(DBResult($response,0,"ANN_SHORT_DESCRIBE"));
	$ANN_CODE = stripslashes(DBResult($response,0,"ANN_CODE"));
	$USER_ORG_NAME = stripslashes(DBResult($response,0,"USER_ORG_NAME"));
	$USER_WEBSITE = stripslashes(DBResult($response,0,"USER_WEBSITE"));
	$USER_EMAIL = stripslashes(DBResult($response,0,"USER_EMAIL"));
	$ANN_DATE = stripslashes(DBResult($response,0,"ANN_DATE"));
	$USER_TEL = stripslashes(DBResult($response,0,"USER_TEL")) . ',' . stripslashes(DBResult($response,0,"USER_OFFICE_TEL"));
?>
<div align="center" class="ti" id="ti"><?="$ANN_TITLE";?></div>
<div align="left" id="content" class="content normal-text">
<?="$ANN_DESCRIBE";?><br /><br /><br />

<table width="100%" border="0" align="left" style="position:relative;">
    <tr align="left" valign="middle">
      <td width="241" align="left"><b>ประกาศโดย</b>&nbsp;
        <?=$USER_ORG_NAME;?><b>เมื่อ</b>&nbsp;
        <?=$ANN_DATE;?></td>
    </tr>
    <tr align="left" valign="middle">
      <td align="left"><b>website&nbsp;:</b>&nbsp;<a href="#" onclick="javascript: hyperlink('http://<?=$USER_WEBSITE;?>');">
        <?=$USER_WEBSITE;?>
      </a></td>
  </tr>
    <tr align="left" valign="middle">
      <td align="left"><b>email&nbsp;:</b>&nbsp;<a href="#" onclick="javascript: hyperlink('mailto:<?=$USER_EMAIL;?>','_self');">
        <?=$USER_EMAIL;?>
      </a></td>
    </tr>
    <tr align="left" valign="middle">
      <td align="left"><b>โทรศัพท์&nbsp;:</b>&nbsp;
      <?=$USER_TEL;?></td>
    </tr>
  </table>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
</div>

<?php
	@include("MPDF56/mpdf.php");
	$html = ob_get_contents();
	ob_end_clean();
	$mpdf=new mPDF('UTF-8','A4','11','1',5,5,5,5,25,1); 
	//new mPDF('en-x','A4','font-size','',margin-left,margin-right,margin-content-top,margin-content-bottom,margin-header,margin-footer); 
	$mpdf->SetAutoFont();
	$stylesheet = file_get_contents("css/pdf_job_style.css");
	$mpdf->WriteHTML($stylesheet,1); //parameter 1 tell that is css style only no html,body tags
	$mpdf->WriteHTML($html);
	$mpdf->Output();
?>

