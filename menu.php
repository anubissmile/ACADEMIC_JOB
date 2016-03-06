 <div class="block">
	<div class="head-block first">เมนู</div>
    <div class="content-block menu-side">
           <a href="index.php" onclick="javascript: window.location.href = 'index.php';"><span class="left-nav border-end">หน้าแรก</span></a>
    <?php
		if(isOnline()){
			$usr = $_SESSION['ajuser']['user'];
			$pwd = $_SESSION['ajuser']['password'];
		}
		if(isOnline() && !isAdmin($usr,$pwd)){
	?>
           <a href="javascript: " onClick="showContent('purchase.php');" ><span class="left-nav border-end">สั่งซื้อ</span></a>
           <a href="index.php?Node=annoucement_box"><span class="left-nav border-end">กล่องเก็บประกาศ</span></a>
           <a href="index.php?Node=movetrash_annoucement"><span class="left-nav border-end">ถังขยะ</span></a>
           <a href="javascript: " onClick="showContent('showpage.php?Node=add_annoucement');"><span class="left-nav border-end">สร้างประกาศ</span></a>
           <a href="javascript: " onClick="showContent('showpage.php?Node=user_setting');"><span class="left-nav border-end">control panel</span></a>
<!--           <a href="#" onclick="javascript: showContent('showpage.php?Node=setting');"><span class="left-nav border-end">ตั้งค่า</span></a>-->
          <!--<a href="index.php?Node=setting" onclick="javascript: hyperlink('index.php?Node=setting','_self');"><span class="left-nav border-end">ตั้งค่า</span></a>-->
           <a href="javascript: " onClick="showContent('showpage.php?Node=contact');"><span class="left-nav border-end">แจ้งปัญหาการใช้งาน</span></a>
           <a href="javascript: " onClick="window.location.href = 'SignOut.php';"><span class="left-nav border-end">ออกจากระบบ</span></a>
    <?php
		}else if(isOnline() && isAdmin($usr,$pwd)){
	?>
           <a href="index.php?Node=annoucement_box"><span class="left-nav border-end">กล่องเก็บประกาศ</span></a>
           <a href="index.php?Node=movetrash_annoucement"><span class="left-nav border-end">ถังขยะ</span></a>
           <a href="javascript: " onClick="showContent('showpage.php?Node=add_annoucement');"><span class="left-nav border-end">สร้างประกาศ</span></a>
           <a href="javascript: " onClick="showContent('showpage.php?Node=setting');"><span class="left-nav border-end">control panel</span></a>
           <a href="javascript: " onClick="showContent('showpage.php?Node=stat');"><span class="left-nav border-end">สถิติ</span></a>
           <a href="javascript: " onClick="window.location.href = 'SignOut.php';"><span class="left-nav border-end">ออกจากระบบ</span></a>
    <?php
		}else{
	?>
           <a href="javascript: " onclick="showContent('purchase.php');"><span class="left-nav border-end">สั่งซื้อ</span></a>
           <a href="javascript: " onclick="showContent('payment.php');"><span class="left-nav border-end">วิธีการชำระเงิน</span></a>
           <a href="javascript: " onClick="showContent('showpage.php?Node=register');"><span class="left-nav border-end">สมัครสมาชิก</span></a>
           <a href="javascript: " onClick="showContent('showpage.php?Node=SignIn');"><span class="left-nav border-end">ลงชื่อเข้าใช้</span></a>
           <a href="javascript: " onClick="showContent('showpage.php?Node=contact');"><span class="left-nav border-end">แจ้งปัญหาการใช้งาน</span></a>
           <a href="javascript: " onClick="showContent('showpage.php?Node=info');"><span class="left-nav border-end">ข้อมูลเกี่ยวกับงาน</span></a>
    <?php
		}
	?>
	</div>
 </div>