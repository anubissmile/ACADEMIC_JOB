<?php
	include("lib/lib.inc.php");
	$title = "ACADEMIC JOB ANNOUCEMENT";
	$metakeyw = "ACADEMIC,JOB,ANNOUCEMENT,enroll,job applications,resume,ประกาศ,หางาน,สมัครงาน,รับสมัครงาน,อาจารย์,บุคลากร,ไอที,
				it,information technology,งาน,อะคาเดมิค,จ็อบ,การศึกษา,โรงเรียน,มหาวิทยาลัย,สถาบันการศึกษา,วิทยาลัย";
	$metadesc = "WEBSITE ACADEMIC JOB ANNOUCEMENT เราคือเว็บไซต์บริการประกาศรับสมัครงานและหางานที่เกี่ยวข้องกับสถาบันการศึกษาทั่วไปในประเทศไทย";
	if(isset($_GET['Node']) && isset($_GET['id'])){
		if($_GET['Node'] == "show_annoucement"){
			$SQL = "SELECT annoucement.ANN_SHORT_DESCRIBE, annoucement.ANN_TITLE, 
						annoucement.ANN_KEYWORD, annoucement.ANN_CODE FROM annoucement 
						WHERE annoucement.ANN_CODE =  '{$_GET['id']}'";
			$response = DBQuery($SQL);
			if(DBNumRow($response)>0){
				$title = DBResult($response,0,'ANN_TITLE');
				$metakeyw = DBResult($response,0,'ANN_KEYWORD');
				$metadesc = DBResult($response,0,'ANN_SHORT_DESCRIBE');
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/academic_job_style.css" />
<meta http-equiv="keywords" name="keywords" content="<?=$metakeyw;?>" />
<meta http-equiv="description" name="description" content="<?=$metadesc;?>" />
<script src="js/jquery-2.1.0.js" ></script>
<script src="js/jquery-academic-job.js" defer></script>
<script src="js/jquery-index-doc-ready.js" defer></script>
<title><?=$title;?></title>
</head>
<body>
<div class="carry">0</div>
<div id="bgpopup" class="bgpopup">
	<p>
		<div class="content-popup"><img src="images/delete.png" align="right"/></div>
    </p>	
</div>
<div class="wrap">
	<div class="banner">
    	<div class="wrap-banner">
            <h4>JOBM-EDUCATION.COM</h4><h5>The Education Employment Portal</h5>
            <ul class="banner-list">
                <li><h6 style="color:#FFFF00;" class="shadow">มหาวิทยาลัย&nbsp;</h6></li>|
                <li><h6 style="color:#66ffff;" class="shadow">วิทยาลัย&nbsp;</h6></li>|
                <li><h6 style="color:#FF0000;" class="shadow">โรงเรียน&nbsp;</h6></li>|
                <li><h6 style="color:#66FF00;" class="shadow">สถานศึกษาทั่วไป</h6></li>
            </ul>
        </div>
    </div>
    <div class="content-wrap">
    	<div class="content side" id="content-left">
        	<?php
				include("find_annoucement.php");
				include("menu.php");
				include("facepile.php");
			?>
            <!--<div class="block">
            	<div class="head-block first">ดูประกาศ</div>
                <div class="content-block">
               	  <div class="head-block" style="font-size:0.9em;">สถาบันการศึกษา</div>
                </div>
            </div>-->
        </div>
    	<div class="content center" id="content-main">
        	<?php
				if(isset($_GET['Node'])){
					ViewContent($_GET['Node']);
				}else{
					include("content.php");
				}
			?>
        </div>
    	<div class="content side" id="content-right">     
        <?php
			if(isOnline()){include("user_info.php");}
			include("search_annoucement.php");
			include("advertisement.php");
		?>               
        </div>
    </div>
    <div class="footer"></div>
</div>
</body>
</html>