<?php
	include_once("lib/lib.inc.php");

	if(isset($_GET['Node'])){
		ViewContent($_GET['Node']);
	}
?>