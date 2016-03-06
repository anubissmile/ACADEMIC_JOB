<?php
	include_once("lib/lib.inc.php");
	
	$SQL = "SELECT * FROM `product` ORDER BY `PRO_PRICE` ";
	$response = DBQuery($SQL);
?>
<div class="block">
  	<div class="head-block first">
		อัตราค่าบริการ
	</div>
	<div class="content-block normal-text">
	  <p align="left">
   	  </p>
	  <table width="100%" border="0" align="center" class="datatable-noneborder">
<?php
	if($response){
		while($result = DBFetch($response)){
			$PRO_CODE = $result['PRO_CODE'];
			$PRO_NAME = $result['PRO_NAME'];
			$PRO_DESC = stripslashes($result['PRO_DESC']);
			$PRO_PRICE = number_format($result['PRO_PRICE'],2,'.',',');
			$VAT = $result['PRO_PRICE'] + (($result['PRO_PRICE'] * 7) / 100);
			$VAT = number_format($VAT,2,'.',',');
			$img = explode('::',$result['PRO_FIGURE']);
			$img = $img[0];
?> 
      
	    <tr align="center" valign="middle" bgcolor="#FFFFFF">
	      <td width="22%" align="left">&nbsp;<img src="<?=$img;?>" width="160"/></td>
	      <td width="52%" align="left">
          	<p align="left">
            	<b><?=$PRO_NAME;?></b><br />
                <?=$PRO_DESC;?>
            </p>          
          </td>
	      <td width="26%" align="right" valign="top">
          	<span class="price-view"><?=$PRO_PRICE;?>&nbsp;บาท&nbsp;<br>
		  	+VAT 7% <br/>
            ราคาสุทธิ&nbsp;<?=$VAT;?>&nbsp;บาท&nbsp;</span><br><br>
          	<a href="#" class="btn-purchase-view top-left bottom-right" data-pro-code="<?=$PRO_CODE;?>">สั่งซื้อ</a>&nbsp;
          </td>
        </tr>
<?php
		}
	}
?>        
      </table>
	  <p align="left"></p>
	</div>
</div>
<script>
	$(document).ready(function(){
		purchasingListener();
		setHoverFadeTo($('.datatable-noneborder tr'));
		//setUrlWithoutReload("","","<?=$url;?>");
		setTitle('อัตราค่าบริการ บริการของ ACADEMIC JOB');
		setMetaKeywords('อัตราค่าบริการ,ACADEMIC JOB,หางาน,สถาบันการศึกษา,การศึกษา');
		setMetaDescription('อัตราค่าบริการของทางเว็บไซต์ ACADEMIC JOB ซึ่งเป็นเว็บไซต์ให้บริการประกาศสมัครงานสำหรับสถาบันการศึกษาต่างๆ โดยมีทั้งหมด 3 package คือ package starter,package silver,package gold');
	});
</script>