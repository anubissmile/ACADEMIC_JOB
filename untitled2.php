<?php
	
	$f = base64_encode(file_get_contents('images/ads.jpg'));
	echo "<img src=\"data:image/jpg;base64,$f\" />";
?>