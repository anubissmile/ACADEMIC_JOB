<?php
	include_once("lib/lib.inc.php");
	$id = $_GET['id'];
	$url = str_replace("showpage.php","index.php","http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	//echo "<span class=\"normal-text\">$url</span>";
	$SQL = "SELECT ANN.*,TYPE.*,EDU.*,USR.* FROM annoucement ANN
				LEFT JOIN job_type TYPE ON(TYPE.JOB_TYPE_CODE = ANN.ANN_JOB_TYPE) 
				LEFT JOIN edu_level EDU ON(EDU.EDU_LEVEL_CODE = ANN.ANN_EDU_LEVEL) 
				LEFT JOIN tb_user USR ON(USR.USER_CODE = ANN.ANN_USER_CODE) 
				WHERE ANN.ANN_CODE = '$id'  
				ORDER BY ANN.ANN_CODE DESC ;";
	$response = DBQuery($SQL);
	$row = DBNumRow($response);
	if($row < 1){
		PageNotFound();
		die();
	}
	$ANN_TITLE = stripslashes(DBResult($response,0,"ANN_TITLE"));
	$ANN_DESCRIBE = stripslashes(DBResult($response,0,"ANN_DESCRIBE"));
	$ANN_KEYWORD = stripslashes(DBResult($response,0,"ANN_KEYWORD"));
	$ANN_SHORT_DESCRIBE = stripslashes(DBResult($response,0,"ANN_SHORT_DESCRIBE"));
	$ANN_CODE = stripslashes(DBResult($response,0,"ANN_CODE"));
	$USER_CODE = stripslashes(DBResult($response,0,"USER_CODE"));
	$USER_ORG_NAME = stripslashes(DBResult($response,0,"USER_ORG_NAME"));
	$USER_WEBSITE = stripslashes(DBResult($response,0,"USER_WEBSITE"));
	$USER_EMAIL = stripslashes(DBResult($response,0,"USER_EMAIL"));
	$ANN_DATE = stripslashes(DBResult($response,0,"ANN_DATE"));
	$USER_TEL = stripslashes(DBResult($response,0,"USER_TEL")) . ',' . stripslashes(DBResult($response,0,"USER_OFFICE_TEL"));
	$color = edu_eng_name(stripslashes(DBResult($response,0,"EDU_LEVEL_NAME")));
?>
<div align="center" style="background-color:#FFFF00;" class="top-left bottom-right head-<?=$color;?>-fix"><?="$ANN_TITLE";?></div>
<div align="justify" class="ann-block normal-text" style="text-indent:30px;">
<p><?="$ANN_DESCRIBE";?></p>
<p>
<table width="100%" border="0" align="left" style="position:relative;">
    <tr align="left" valign="middle">
      <td width="241" align="left"><b>ประกาศโดย</b>&nbsp;
        <?=$USER_ORG_NAME;?>        <b>เมื่อ</b>&nbsp;
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
 </p>
</div>
<table width="100%" border="0">
     <tr align="left" valign="top">
       <td width="22%" align="right">
       	<a href="#" title="พิมพ์ประกาศนี้" class="normal-text" onclick="javascript: window.open('print_annoucement.php?id=<?="$ANN_CODE";?>','_blank');"><img src="images/print.png" align="middle" title="พิมพ์ประกาศนี้" />พิมพ์ประกาศนี้</a>
	  	&nbsp;&nbsp;
       </td>
       <td width="78%">
		<iframe src="//www.facebook.com/plugins/like.php?href=<?=$url;?>&amp;width=500&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe>
	   </td>
     </tr>
     <tr align="left" valign="top">
       <td colspan="2">
       	<div class="head-facebook"><img src="images/facebook-icon.png"/>&nbsp;ความคิดเห็นจากแฟนเพจ</div>
       </td>
     </tr>
     <tr align="center" valign="top">
       <td colspan="2" bgcolor="#FFFFFF">
       	<iframe src="FBComments.php?URL=<?=base64_encode($url);?>" name="FBComments" class=" FBComments"></iframe>
       </td>
     </tr>
  </table>
<script src="js/jquery-academic-job.js" ></script>
<script>
	$('body').ready(function(){
		setTitle('<?=$ANN_TITLE;?>');
		setMetaKeywords('<?=$ANN_KEYWORD;?>');
		setMetaDescription('<?="$ANN_SHORT_DESCRIBE $ANN_TITLE";?>');
		viewCount('<?=$id;?>','<?=$USER_CODE;?>');
		setUrlWithoutReload("","","<?=$url;?>");
	});
</script>