<?php
	if(isset($_POST['type_work']) && isset($_POST['type_org'])){
		$type_work = $_POST['type_work'];
		$type_org = $_POST['type_org'];
		$type = $type_work != 'งานทั้งหมด' ? "TYPE.JOB_TYPE_NAME = '$type_work' AND " : "TYPE.JOB_TYPE_NAME >= '1' AND ";
		$edu = $type_org != 'ทุกหน่วยงาน' ? "EDU.EDU_LEVEL_NAME = '$type_org' " : "EDU.EDU_LEVEL_NAME >= '1' ";
		$SQL = "SELECT ANN.*,TYPE.*,EDU.*,USR.* FROM annoucement ANN
				LEFT JOIN job_type TYPE ON(TYPE.JOB_TYPE_CODE = ANN.ANN_JOB_TYPE) 
				LEFT JOIN edu_level EDU ON(EDU.EDU_LEVEL_CODE = ANN.ANN_EDU_LEVEL) 
				LEFT JOIN tb_user USR ON(USR.USER_CODE = ANN.ANN_USER_CODE) 
				WHERE $type $edu  AND ANN.ANN_TRASH_STATUS = '0' 
				ORDER BY ANN.ANN_CODE DESC ";
		$title = "ประกาศ$type_work ของ $type_org";
	}else if(isset($_POST['SEARCH'])){
		$search = addslashes($_POST['SEARCH']);
		$SQL = "SELECT ANN.*,TYPE.*,EDU.*,USR.* FROM annoucement ANN
				LEFT JOIN job_type TYPE ON(TYPE.JOB_TYPE_CODE = ANN.ANN_JOB_TYPE) 
				LEFT JOIN edu_level EDU ON(EDU.EDU_LEVEL_CODE = ANN.ANN_EDU_LEVEL) 
				LEFT JOIN tb_user USR ON(USR.USER_CODE = ANN.ANN_USER_CODE) 
				WHERE ANN.ANN_KEYWORD LIKE '%$search%' AND ANN.ANN_TRASH_STATUS = '0' 
				OR ANN.ANN_TITLE LIKE '%$search%' 
				OR ANN.ANN_SHORT_DESCRIBE LIKE '%$search%' 
				ORDER BY ANN.ANN_CODE DESC ";
		$title = "<div align=\"left\" class=\"normal-text\">ผลการค้นหา ($search)...</div>";
	}else{
		$search = "";
		$SQL = "SELECT ANN.*,TYPE.*,EDU.*,USR.* FROM annoucement ANN
				LEFT JOIN job_type TYPE ON(TYPE.JOB_TYPE_CODE = ANN.ANN_JOB_TYPE) 
				LEFT JOIN edu_level EDU ON(EDU.EDU_LEVEL_CODE = ANN.ANN_EDU_LEVEL) 
				LEFT JOIN tb_user USR ON(USR.USER_CODE = ANN.ANN_USER_CODE) 
				WHERE ANN.ANN_TRASH_STATUS = '0' 
				ORDER BY ANN.ANN_CODE DESC ";
		$title = "ประกาศทั้งหมด";
	}
	$SQL .= " LIMIT 0,30;";
?>
	<div align="center"><?=$title;?></div>
    <div align="left">
<?php
	$response = DBQuery($SQL);
	$count = DBNumRow($response);
	$val = 1;
	while($re = DBFetch($response)){
		$ed = edu_eng_name($re['EDU_LEVEL_NAME']);
		/*switch($val){
			case 1:
				$BLOCK1[] = array("CODE" => $re['ANN_CODE'], "TITLE" => $re['ANN_TITLE'], "DESC" => $re['ANN_SHORT_DESCRIBE']);
				$val++;
				break;
			case 2:
				$BLOCK2[] = array("CODE" => $re['ANN_CODE'], "TITLE" => $re['ANN_TITLE'], "DESC" => $re['ANN_SHORT_DESCRIBE']);
				$val++;
				break;
			case 3:
				$BLOCK3[] = array("CODE" => $re['ANN_CODE'], "TITLE" => $re['ANN_TITLE'], "DESC" => $re['ANN_SHORT_DESCRIBE']);
				$val = 1;
				break;
		}
	}*/
?>
        	<!--<div class="block-content">
            	<div class="head-block-content first head-<?=$ed;?>-fix">
                <a href="javascript: " onClick="showContent('showpage.php?Node=show_annoucement&id=<?="{$re['ANN_CODE']}";?>');"><div><?=HightLight(stripslashes("{$re['ANN_TITLE']}"),stripslashes($search),"parent-size");?></div></a>
                </div>
                <div class="content-block content-<?=$ed;?>-fix">
                    <a href="javascript: " onClick="showContent('showpage.php?Node=show_annoucement&id=<?="{$re['ANN_CODE']}";?>');"><div><?=HightLight(stripslashes("{$re['ANN_SHORT_DESCRIBE']}..."),stripslashes($search),"parent-size");?><br /><?="<b>ประกาศโดย</b> {$re['USER_ORG_NAME']} <b>เมื่อ</b> {$re['ANN_DATE']}";?></div></a>
                </div>
            </div>-->
            
	<div class="wrap-block normal-text">
    	<div class="sub-wrap-block">
            <div class="shade-block"></div>
            <div class="figure-block"></div>
            <div class="desc-block">
                <b><a href="javascript:" onClick="showContent('showpage.php?Node=show_annoucement&id=<?="{$re['ANN_CODE']}";?>');" ><?=HightLight(stripslashes("{$re['ANN_TITLE']}"),stripslashes($search),"parent-size");?></a></b><br>
                <a href="javascript:" onClick="showContent('showpage.php?Node=show_annoucement&id=<?="{$re['ANN_CODE']}";?>');" ><?=HightLight(stripslashes("{$re['ANN_SHORT_DESCRIBE']}..."),stripslashes($search),"parent-size");?><br /><?="<b>ประกาศโดย</b> {$re['USER_ORG_NAME']} <b>เมื่อ</b> {$re['ANN_DATE']}";?></a><br>
			</div>
        </div>	
    	<div class="sub-wrap-block">
            <div class="shade-block"></div>
            <div class="figure-block"></div>
            <div class="desc-block">
                <b><a href="javascript:" onClick="showContent('showpage.php?Node=show_annoucement&id=<?="{$re['ANN_CODE']}";?>');" ><?=HightLight(stripslashes("{$re['ANN_TITLE']}"),stripslashes($search),"parent-size");?></a></b><br>
                <a href="javascript:" onClick="showContent('showpage.php?Node=show_annoucement&id=<?="{$re['ANN_CODE']}";?>');" ><?=HightLight(stripslashes("{$re['ANN_SHORT_DESCRIBE']}..."),stripslashes($search),"parent-size");?><br /><?="<b>ประกาศโดย</b> {$re['USER_ORG_NAME']} <b>เมื่อ</b> {$re['ANN_DATE']}";?></a><br>
			</div>
        </div>	
    </div>
	<div class="wrap-block normal-text">
    	<div class="sub-wrap-block">
            <div class="shade-block"></div>
            <div class="figure-block"></div>
            <div class="desc-block">
                <a href="javascript:" onClick="showContent('showpage.php?Node=show_annoucement&id=<?="{$re['ANN_CODE']}";?>');" ><?=HightLight(stripslashes("{$re['ANN_TITLE']}"),stripslashes($search),"parent-size");?></a><br>
                <a href="javascript:" onClick="showContent('showpage.php?Node=show_annoucement&id=<?="{$re['ANN_CODE']}";?>');" ><?=HightLight(stripslashes("{$re['ANN_SHORT_DESCRIBE']}..."),stripslashes($search),"parent-size");?><br /><?="<b>ประกาศโดย</b> {$re['USER_ORG_NAME']} <b>เมื่อ</b> {$re['ANN_DATE']}";?></a><br>
			</div>
        </div>	
    	<div class="sub-wrap-block">
            <div class="shade-block"></div>
            <div class="figure-block"></div>
            <div class="desc-block">
                <a href="javascript:" onClick="showContent('showpage.php?Node=show_annoucement&id=<?="{$re['ANN_CODE']}";?>');" ><?=HightLight(stripslashes("{$re['ANN_TITLE']}"),stripslashes($search),"parent-size");?></a><br>
                <a href="javascript:" onClick="showContent('showpage.php?Node=show_annoucement&id=<?="{$re['ANN_CODE']}";?>');" ><?=HightLight(stripslashes("{$re['ANN_SHORT_DESCRIBE']}..."),stripslashes($search),"parent-size");?><br /><?="<b>ประกาศโดย</b> {$re['USER_ORG_NAME']} <b>เมื่อ</b> {$re['ANN_DATE']}";?></a><br>
			</div>
        </div>	
    </div>
	<div class="wrap-block normal-text">
    	<div class="sub-wrap-block">
            <div class="shade-block"></div>
            <div class="figure-block"></div>
            <div class="desc-block">
                <a href="javascript:" onClick="showContent('showpage.php?Node=show_annoucement&id=<?="{$re['ANN_CODE']}";?>');" ><?=HightLight(stripslashes("{$re['ANN_TITLE']}"),stripslashes($search),"parent-size");?></a><br>
                <a href="javascript:" onClick="showContent('showpage.php?Node=show_annoucement&id=<?="{$re['ANN_CODE']}";?>');" ><?=HightLight(stripslashes("{$re['ANN_SHORT_DESCRIBE']}..."),stripslashes($search),"parent-size");?><br /><?="<b>ประกาศโดย</b> {$re['USER_ORG_NAME']} <b>เมื่อ</b> {$re['ANN_DATE']}";?></a><br>
			</div>
        </div>
    	<div class="sub-wrap-block">
            <div class="shade-block"></div>
            <div class="figure-block"></div>
            <div class="desc-block">
                <a href="javascript:" onClick="showContent('showpage.php?Node=show_annoucement&id=<?="{$re['ANN_CODE']}";?>');" ><?=HightLight(stripslashes("{$re['ANN_TITLE']}"),stripslashes($search),"parent-size");?></a><br>
                <a href="javascript:" onClick="showContent('showpage.php?Node=show_annoucement&id=<?="{$re['ANN_CODE']}";?>');" ><?=HightLight(stripslashes("{$re['ANN_SHORT_DESCRIBE']}..."),stripslashes($search),"parent-size");?><br /><?="<b>ประกาศโดย</b> {$re['USER_ORG_NAME']} <b>เมื่อ</b> {$re['ANN_DATE']}";?></a><br>
			</div>
        </div>	
    </div>
   <?php } ?> 
	</div>