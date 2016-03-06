<?php
	session_start();
	include("config.inc.php");
	date_default_timezone_set('Asia/Bangkok');
	$connect = "";
	
	function DBConnect(){
		global $connect;
		$connect = mysql_connect(HOST,USR,PWD) or die("Cannot connect to host");
		mysql_select_db(DB) or die("Cannot connect database");
		mysql_query("SET NAMES 'utf8'");
		return $connect;
	}
	
	function DBClose(){
		global $connect;
		mysql_close($connect) or die("Cannot close database");
		return true;
	}
	
	function DBBegin(){
		DBConnect();
		mysql_query("BEGIN");	
		DBClose();
		return true;
	}
	
	function DBCommit(){
		DBConnect();
		$result = mysql_query("COMMIT");	
		DBClose();
		return $result;
	}
	
	function DBRollback(){
		DBConnect();
		$result = mysql_query("ROLLBACK");	
		DBClose();	
		return $result;
	}
	
	function DBQuery($SQL = ""){
		DBConnect();
		$response = mysql_query($SQL) or die(mysql_error() . "<br/>[$SQL]");
		DBClose();
		return $response;
	}
	
	function DBNumRow($response){
		DBConnect();
		$result = mysql_num_rows($response);
		DBClose();
		return $result;
	}
	
	function DBResult($response,$row,$field){
		DBConnect();
		$result = mysql_result($response,$row,$field);
		DBClose();
		return $result;
	}
	
	function DBFetch($response){
		DBConnect();
		$result = mysql_fetch_array($response);
		DBClose();
		return $result;
	}	
	
	function getVat($price = 0,$vat = 7){
		if(is_numeric($price)){
			return $price + (($price * $vat) / 100);
		}else{ return false; }
	}

	function sendMail($strTo,$strSubject,$strHeader,$strMessage){
		$strHeader = "Content-type: text/html; charset=UTF-8\n" . $strHeader; // or UTF-8 //		
		/*$strTo = "anubis.smile@gmail.com";
		$strSubject = "ทดสอบการส่งอีเมลล์";
		$strHeader .= "From: Mr.Wesarut Khumwilai<info.devcaffe.hol.es>\r\n";
		$strHeader .= "Cc: Mr.Wesarut Client<anubis.smile@gmail.com>\r\n";
		$strHeader .= "Bcc: anubis.smile@gmail.com";
		$strMessage = "<a href=\"http://academicjob.devcaffe.hol.es\" target=\"_blank\">Click here: to visit our site.<br/><img src=\"http://academicjob.devcaffe.hol.es/images/package/silver_package.png\"/></a>";
		$strMessage .= "<div>visit<br/>our<br/>website!<br/>now!</div>";*/
		$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
		if($flgSend)
		{
			//echo "Email Sending.";
			return true;
		}else{
			//echo "Email Can Not Send.";
			return false;
		}
		//echo $strMessage;
	}
	
	function edu_eng_name($edu){
		return $edu == "มหาวิทยาลัย" ? "university" 
			: ($edu == "วิทยาลัย" ? "college" 
			: ($edu == "โรงเรียน" ? "school"
			: "edu"));
	}
	
	function redirect($delay=0,$action){
		echo '<meta http-equiv="refresh" content="' . $delay . ';URL=' . $action .'" />';
		return true;
	}
	
	function newtab($addr=""){
		echo "<script>window.open(\"$addr\",\"_blank\");</script>";
	}
	
	function HightLight($str,$find,$cls="",$color="yellow"){
		$hili = "<span style=\"background-color:$color;\" class=\"$cls\">$find</span>";
		return str_ireplace($find,$hili,$str);
	}
	
	function msgalert($msg){
		echo "<script type=\"text/javascript\">alert(\"$msg\");</script>";
		return true;
	}
	
	function checkPattern($msg, $type){
		switch($type){
			case 'mail':
				$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$";
				break;
			default:
				return '0';
				die();
		}
		return eregi($pattern, $msg);
		
	}
	
	function LimitPage($SQL="",$range="",$URL="",$length=""){
	// Limit page
		if($range == ""){
			$limit = '0';
		}else{
			$limit = $range * $length;
		}
		$response = DBQuery($SQL);
		$numrow = DBNumRow(DBQuery($SQL));
		$page = ceil($numrow / $length);
		//$limitpage = "<div align=\"center\"  style=\"font-size:14px;color:black;\"><b>หน้า  " ;
		
		for($i=0;$i<$page;$i++){
			$r = $i+1;
			$querystring = explode("?",$URL);
			if(count($querystring) > 1){
				$dd = explode("#",$querystring[1]);
				$ran = 0;
				$da = $dd[0];
				if(count($dd) > 1){
					while($ran <= $numrow){
						$da = str_ireplace("&range=$ran","",$da);
						$ran++;
					}
					//msgalert($da . " 11 $numrow");
					$range = $querystring[0] . "?" . $da . "&range=$i" . "#" . $dd[1];
				}else{
					while($ran <= $numrow){
						$da = str_ireplace("&range=$ran","",$da);
						$ran++;
					}
					//msgalert($da . " 22");	
					$range = $querystring[0] . "?" . $da . "&range=$i";				
				}
			}else{
				$dd = explode("#",$querystring[1]);
				if(count($dd) > 1){
					$range = $querystring[0] . "?" . "range=$i" . "#" . $dd[1];	
				}else{
					$range = $querystring[0] . "?" . "range=$i";	
				}
			}
			
			//$limitpage .= "<a href=\"index.php?Node=mat_receive_history&range=$i#receive\" style=\"color:black;\">$r</a> |";
			//$limitpage = "<a href=\"$range\" style=\"color:black;\">$r</a> |";
			$limitpage[] = $range;
		}
		//$limitpage .="</b></div>";
		$SQL .= " LIMIT $limit,$length";
		return array($limitpage,$SQL);
	// End Limit page
	}
	
	function DateDifferent($date1 = array(0,0,0),$date2 = array(0,0,0)){
		//////////num_day//////////
		$result_1 = mktime(0, 0, 0, $date1[0], $date1[1], $date1[2]); //m-d-Y //???????????? 1 ???????????????? Unix timestamp
		$result_2 = mktime(0, 0, 0, $date2[0], $date2[1], $date2[2]); //m-d-Y //???????????? 2 ???????????????? Unix timestamp
		$result_date = $result_2 - $result_1; //???????? 2 - ?????? 1 
		$num_day = $result_date / (60 * 60 * 24); //????????????????? Unix timestamp ???????????????
		return $num_day;
		///////////////////////////
	}
		
	function HaveAtoZ($str){
		for($i=0;$i<strlen($str);$i++){
			$r = substr($str,$i,1);
			$result = $r >= "a" && $r <= "z" || $r >= "A" && $r <= "Z" ? true:false;
			if($result==true)
				break;
		}
			return $result;
	}
	
	function GetFileType($name){
		$type = explode('.',$name);
		return $type[count($type)-1];
	}
	
	function FileImageTypeRestrict($name){
		$type = GetFileType($name);
		switch($type){
			case 'png':
				return 'png'; break;
			case 'jpeg':
				return 'jpeg'; break;
			case 'jpg':
				return 'jpg'; break;
			case 'gif':
				return 'gif'; break;
			default:
				return false;	
		}
	}
	
	function GetUserLevel($usr,$pwd){
		if(isAdmin($usr,$pwd)){
			return 1;
		}else if(isSuperUser($usr,$pwd)){
			return 2;
		}else if(isVIP($usr,$pwd)){
			return 3;
		}else{
			return 4;
		}
	}
	
	function PageNotFound(){
		echo '<meta http-equiv="refresh" content="0;URL=index.php?Node=PageNotFound:(" />';
		return true;
	}
	
	function PermissionRestrict($a = array(null),$usr=null,$pwd=null){
		//////////////////////////////////// THE VALUE OF USER LEVEL ////////////////////////////////////////
		// "1" = Admin-Manager-Owner , "2" = Employee , "3" = Customer(Member) , "0" = Customer(Anonymous) //
		/////////////////////////////////////////////////////////////////////////////////////////////////////
		$user = isAdmin($usr,$pwd) ? "1" 
				: (isEmployee($usr,$pwd) ? "2" 
				: (isCustomer($usr,$pwd) ? "3" : "0"));
		foreach($a as $v){
			$result = $v == $user ? true : false;
			if($result == true)
				break;	
		}
		return $result == true ? true : false;
	}
	
	function ViewContent($Node=""){
		if($Node == "Look_Customer"){
			include("Look_Customer.php");
		}else if($Node == "add_annoucement"){
			include("add_annoucement.php");
		}else if($Node == "show_annoucement"){
			include("show_annoucement.php");
		}else if($Node == "register"){
			include("register.php");
		}else if($Node == "SignIn"){
			include("SignIn.php");
		}else if($Node == "setting"){
			include("setting.php");
		}else if($Node == "user_setting"){
			include("user_setting.php");
		}else if($Node == "contact"){
			include("contact.php");
		}else if($Node == "info"){
			include("info.php");
		}else if($Node == "stat"){
			include("stat.php");
		}else if($Node == "user_info"){
			include("user_info.php");
		}else if($Node == "annoucement_box"){
			include("annoucement_box.php");
		}else if($Node == "edit_annoucement"){
			include("edit_annoucement.php");
		}else if($Node == "edit_annoucement_ss"){
			include("edit_annoucement_ss.php");
		}else if($Node == "delete_annoucement_ss"){
			include("delete_annoucement_ss.php");
		}else if($Node == "movetrash_annoucement"){
			include("movetrash_annoucement.php");
		}else if($Node == "movetrash_annoucement_ss"){
			include("movetrash_annoucement_ss.php");
		}else if($Node == "purchase"){
			include("purchase.php");
		}else if($Node == "purchase_order"){
			include("purchase_order.php");
		}else if($Node == "confirm_user"){
			include("confirm_user.php");
		}else if($Node == "confirm_order"){
			include("confirm_order.php");
		}else{
			include("pagenotfound.php");
		}
	}
	
	function isAdmin($usr=0,$pwd=0){
		$strSQL = "SELECT * FROM tb_user WHERE USER_EMAIL = '$usr' AND USER_PASSWORD = '$pwd'; ";
		$response = DBQuery($strSQL);
		if(DBNumRow($response) < 1){
			return false;
		}else{
			return DBResult($response,0,"USER_LEVEL") == 1 ? true : false;
		}
	}
	
	function isSuperUser($usr=0,$pwd=0){
		$strSQL = "SELECT * FROM tb_user WHERE USER_EMAIL = '$usr' AND USER_PASSWORD = '$pwd'; ";
		$response = DBQuery($strSQL);
		if(DBNumRow($response) < 1){
			return false;
		}else{
			return DBResult($response,0,"USER_LEVEL") == 2 ? true : false;
		}
	}
	
	function isVIP($usr=0,$pwd=0){
		$strSQL = "SELECT * FROM tb_user WHERE USER_EMAIL = '$usr' AND USER_PASSWORD = '$pwd'; ";
		$response = DBQuery($strSQL);
		if(DBNumRow($response) < 1){
			return false;
		}else{
			return DBResult($response,0,"USER_LEVEL") == 3 ? true : false;
		}
	}
	
	function isOnline(){
		return isset($_SESSION['ajuser']) ? true : false;
	}

	function IDBuilder($ID){
		$ID++;
		if($ID < 10)
			return "000" . $ID;
		else if($ID < 100)
			return "00" . $ID;
		else if($ID < 1000)
			return "0" . $ID;
		else
			return $ID;
	}

	function GenerateID($strSQL="0",$FieldID=""){
		if($strSQL != "0"){
			$response = DBQuery($strSQL);
			$rows = DBNumRow(DBQuery($strSQL));
			if($rows > 0){
				$result = DBResult($response,0,$FieldID);
			}
			if(HaveAtoZ($result)){
				return $rows < 1 ? "0001" : substr($result,0,1) . IDBuilder(substr($result,1));
			}else{
				return $rows < 1 ? "0001" : IDBuilder(DBResult($response,0,$FieldID ));			
			}
		}else{
			return false;
		}
	}

?>