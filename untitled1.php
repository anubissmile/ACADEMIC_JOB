<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="js/jquery-2.1.0.js" type="text/javascript"></script>
<!--<script src="js/jquery-academic-job.js" type="text/javascript"></script>-->
<script type="text/javascript">
	function fj(){
		$('.fk').click(function(x){
			$('iframe').attr('src','');
		});
	}
	function fb(){
		$('.chk').click(function(){
			alert("chk");
		});
	}
	$(document).ready(function(e) {
		fj();
		fb();
    });
</script>
</head>
<body>
<input type="checkbox" class="chk" />
<button class="fk">adsfasdf</button>
<iframe src="untitled.html">sad;lfkj</iframe>
<?php
	echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	echo "<br />" . date("Y-m-d H:i:s");
	foreach($_SERVER as $v => $a){
		echo "<br/>$v ($a)";	
	}
	
?><br />
<br />
<br />
<br />
<br />
<?php
	for($i=0;$i<=100;$i++){
		if($i%2 == 0){
			$a += $i;	
		}else{
			$b += $i;
		}
	}
	$c = $a - $b;
	echo "เลขคู่ $a<br/>เลขคี่ $b<br/>ผลต่าง $c";
?>
	<img src="untitled2.php" width="80"/>
</body>
</html>