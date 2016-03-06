<?php
	$code = $_SESSION['ajuser']['code'];
	$SQL = "SELECT USR.*, ANN.ANN_CODE, ANN.ANN_USER_CODE, ANN.ANN_DATE
			FROM tb_user USR 
			LEFT JOIN annoucement ANN ON(ANN.ANN_USER_CODE = USR.USER_CODE) 
			WHERE USR.USER_CODE = '$code' 
			ORDER BY ANN.ANN_DATE DESC;";
	$response = DBQuery($SQL);
	$count = number_format(DBNumRow($response),0,'.',',');
	$website = DBResult($response,0,"USER_WEBSITE");	
	$USER_CODE = DBResult($response,0,"USER_CODE");	
	$SQL = "SELECT * FROM view_annoucement WHERE VIEW_USER_CODE = '$USER_CODE';";
	$view = DBNumRow(DBQuery($SQL));
?>
 <div class="block">
	<div class="head-block first"><?=$_SESSION['ajuser']['name'];?></div>
    <div class="content-block menu-side">
      <table width="100%" border="0" align="center" class="normal-text" style="font-size:0.65em;">
            <tr>
              <td width="5%" align="right" valign="middle"><strong >website&nbsp;:&nbsp;</strong></td>
              <td width="95%" valign="middle" class="user-info-web"><a href="#" onClick="javascript: hyperlink('http://<?=$website;?>');" title="<?=$website;?>"><?=substr($website,0,35);?></a></td>
            </tr>
            <tr>
              <td align="right" valign="middle"><strong>IP&nbsp;:&nbsp;</strong></td>
              <td valign="middle"><?=$_SERVER['REMOTE_ADDR'];?></td>
            </tr>
            <tr>
              <td align="right" valign="middle"><strong>ประกาศ&nbsp;:&nbsp;</strong></td>
              <td valign="middle"><?="$count ประกาศ";?></td>
            </tr>
            <tr>
              <td align="right" valign="middle"><strong>เข้าชม&nbsp;:&nbsp;</strong></td>
              <td valign="middle"><?="$view คน";?></td>
            </tr>
            <tr>
              <td align="right" valign="middle"><strong>ผู้สนใจ&nbsp;:&nbsp;</strong></td>
              <td valign="middle">&nbsp;</td>
            </tr>
<!--            <tr>
              <td align="right" valign="middle"><strong>คงเหลือ&nbsp;:&nbsp;</strong></td>
              <td>&nbsp;</td>
            </tr>-->
<?php
	if(isAdmin($_SESSION['ajuser']['user'],$_SESSION['ajuser']['password'])){
?>
            <tr>
              <td align="right" valign="middle"><strong>สถานะ&nbsp;:&nbsp;</strong></td>
              <td valign="middle">ผู้ดูแลระบบ</td>
            </tr>
<?php
	}
?>
          </table>
    </div>
 </div>