<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "../inc/config.inc.php";
$email=htmlspecialchars($_POST[email]);
$sex=$_POST[sex];
$webcam=$_POST[webcam];
$talk_with=$_POST[talk_with];
$talk_topic=$_POST[talk_topic];
$msg=htmlspecialchars($_POST[msg]);
$age=$_POST[age];
$file1=$_FILES[file1][name];
$tmp1=$_FILES[file1][tmp_name];
$size1=$_FILES[file1][size];
$province=$_POST[province];
$fb=$_POST[fb];
$facebook=htmlspecialchars($_POST[facebook]);
$hi=$_POST[hi];
$hi5=htmlspecialchars($_POST[hi5]);
$tw=$_POST[tw];
$twister=htmlspecialchars($_POST[twister]);
$bb=$_POST[bb];
$pinbb=htmlspecialchars($_POST[pinbb]);
$date=date("Y-n-j H:i:s");
$exp_date=date("Y-n-j H:i",strtotime("+ 1 month"));
$ip=$_SERVER['REMOTE_ADDR'];
$code_active=substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'),0,10);

//check ban ip
$s="SELECT ip FROM `ban_ip` where ip='$ip'";
$re=mysql_query($s) or die("ERROR $s");
$n=mysql_num_rows($re);
if($n<=0){
	//check block email
	$s2="SELECT email FROM `block_email` where email='$email'";
	$re2=mysql_query($s2) or die("ERROR $s2");
	$n2=mysql_num_rows($re2);
	if($n2<=0){
		//check ขนาดไฟล์ภาพ
		if(isset($file1)&&$file1!=""){
			if($size1<=50000){
			$time=date("YnjHis");
			$rename="$time-$file1";
			@copy($tmp1,"show-img/$rename");
			//insert post
			$insert_post=mysql_query("INSERT INTO `post_friend` (`email` ,`sex` ,`webcam` ,`talk_with` ,`talk_topic` ,`title` ,`age` ,`img` ,`province_id` ,`ip` ,`post_date` ,`post_exp` ,`code_active` ,`active`)VALUES ('$email', '$sex', '$webcam', '$talk_with', '$talk_topic', '$msg', '$age', '$rename', '$province', '$ip', '$date', '$exp_date', '$code_active', '0')") or die("ERROR insert_post บรรทัด 45");
	
			//select post order by id desc 0,1
			$sp="SELECT id FROM `post_friend` ORDER BY id DESC LiMIT 0,1";
			$rep=mysql_query($sp) or die("ERROR $sp บรรทัด 49");
			$rp=mysql_fetch_row($rep);
	
			//insert post_option
			$insert_post_option=mysql_query("INSERT INTO `post_friend_option` (`post_id` ,`fb` ,`facebook` ,`hi` ,`hi5` ,`tw` ,`twister` ,`bb` ,`pinbb` )VALUES ('$rp[0]', '$fb', '$facebook', '$hi', '$hi5', '$tw', '$twister', '$bb', '$pinbb')") or die("ERROR insert_post_option บรรทัด 54");
			
			//ดึงข้อมูลรายละเอียดเว็บไซต์
			$title="select * from web_detail where id=1";
			$titlere=mysql_query($title) or die("ERROR $title บรททัด 57");
			$titler=mysql_fetch_row($titlere);

			//send mail active
			$strTo = "$email";
			$strSubject = "=?UTF-8?B?".base64_encode("ยืนยันการโพสต์ $titler[1]")."?=";
			$strHeader .= "MIME-Version: 1.0' . \r\n";
			$strHeader .= "Content-type: text/html; charset=utf-8\r\n";
			$strHeader .= "From: $titler[1] <$titler[4]>\r\n";
			$strMessage = "<strong>ในกรณีที่ไม่สามารถคลิ๊ก link ยืนยันได้ กรุณาคัดลอก URL ต่อไปนี้ไปวางใน Address Bar แล้วกด Enter</strong><br>
			ยืนยันการโพสต์ : <a href='http://$titler[13]/friend/post-active.php?post_id=$rp[0]&email=$email&code_active=$code_active'>http://$titler[13]/post-active.php?post_id=$rp[0]&email=$email&code_active=$code_active</a>";
			$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);
	
			mysql_close();
?>
			<script language="JavaScript"> 	
				alert('ขณะนี้ ระบบได้ส่ง link ยืนยันการโพสต์ไปยัง Email ของท่าน (<?=$email;?>) Email อาจอยู่ใน กล่องขาเข้า(Inbox) หรือ กล่องขยะ(Junk) กรุณายืนยันการโพสต์ จากนั้นระบบถึงจะแสดงโพสต์ของท่านครับ'); 	
				window.location = 'index.php'; 
			</script> 
<?
			}else{
?>
			<script language="JavaScript"> 	
				alert('ขอโทษครับ ขนาดไฟล์ภาพของท่านมีขนาดเกิน 50kb ครับ'); 	
				history.back();
			</script> 
<?
			}
		}else{
			//insert post
			$insert_post=mysql_query("INSERT INTO `post_friend` (`email` ,`sex` ,`webcam` ,`talk_with` ,`talk_topic` ,`title` ,`age` ,`img` ,`province_id` ,`ip` ,`post_date` ,`post_exp` ,`code_active` ,`active`)VALUES ('$email', '$sex', '$webcam', '$talk_with', '$talk_topic', '$msg', '$age', '$rename', '$province', '$ip', '$date', '$exp_date', '$code_active', '0')") or die("ERROR insert_post บรรทัด 88");
	
			//select post order by id desc 0,1
			$sp="SELECT id FROM `post_friend` ORDER BY id DESC LiMIT 0,1";
			$rep=mysql_query($sp) or die("ERROR $sp บรรทัด 91");
			$rp=mysql_fetch_row($rep);
	
			//insert post_option
			$insert_post_option=mysql_query("INSERT INTO `post_friend_option` (`post_id` ,`fb` ,`facebook` ,`hi` ,`hi5` ,`tw` ,`twister` ,`bb` ,`pinbb` )VALUES ('$rp[0]', '$fb', '$facebook', '$hi', '$hi5', '$tw', '$twister', '$bb', '$pinbb')") or die("ERROR insert_post_option บรรทัด 96");
			
			//ดึงข้อมูลรายละเอียดเว็บไซต์
			$title="select * from web_detail where id=1";
			$titlere=mysql_query($title) or die("ERROR $title บรททัด 99");
			$titler=mysql_fetch_row($titlere);

			//send mail active
			$strTo = "$email";
			$strSubject = "=?UTF-8?B?".base64_encode("ยืนยันการโพสต์ $titler[1]")."?=";
			$strHeader .= "MIME-Version: 1.0' . \r\n";
			$strHeader .= "Content-type: text/html; charset=utf-8\r\n";
			$strHeader .= "From: $titler[1] <$titler[4]>\r\n";
			$strMessage = "<strong>ในกรณีที่ไม่สามารถคลิ๊ก link ยืนยันได้ กรุณาคัดลอก URL ต่อไปนี้ไปวางใน Address Bar แล้วกด Enter</strong><br>
			ยืนยันการโพสต์ : <a href='http://$titler[13]/post-active.php?post_id=$rp[0]&email=$email&code_active=$code_active'>http://$titler[13]/friend/post-active.php?post_id=$rp[0]&email=$email&code_active=$code_active</a>";
			$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);
	
			mysql_close();
?>
			<script language="JavaScript"> 	
				alert('ขณะนี้ ระบบได้ส่ง link ยืนยันการโพสต์ไปยัง Email ของท่าน (<?=$email;?>) Email อาจอยู่ใน กล่องขาเข้า(Inbox) หรือ กล่องขยะ(Junk) กรุณายืนยันการโพสต์ จากนั้นระบบถึงจะแสดงโพสต์ของท่านครับ'); 	
				window.location = 'index.php'; 
			</script> 
<?		
		}
	}else{
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ Email ของท่านไม่สามารถ Post ได้ครับ'); 	
		history.back();
	</script> 
<? 	
	}
}else{
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ หมายเลข IP ของท่านไม่สามารถ Post ได้ครับ'); 	
	history.back();
</script> 
<? 
} 
?>