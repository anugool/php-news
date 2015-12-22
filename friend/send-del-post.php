<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "../inc/config.inc.php";
$post_id=$_POST[post_id];
$email=$_POST[email];
	
			//select post order by id desc 0,1
			$sp="SELECT code_active FROM `post_friend` WHERE id='$post_id'";
			$rep=mysql_query($sp) or die("ERROR $sp บรรทัด 9");
			$rp=mysql_fetch_row($rep);
			
			//ดึงข้อมูลรายละเอียดเว็บไซต์
			$title="select * from web_detail where id=1";
			$titlere=mysql_query($title) or die("ERROR $title บรททัด 99");
			$titler=mysql_fetch_row($titlere);

			//send mail active
			$strTo = "$email";
			$strSubject = "=?UTF-8?B?".base64_encode("ยืนยันการลบโพสต์ $titler[1]")."?=";
			$strHeader .= "MIME-Version: 1.0' . \r\n";
			$strHeader .= "Content-type: text/html; charset=utf-8\r\n";
			$strHeader .= "From: $titler[1] <$titler[4]>\r\n";
			$strMessage = "<strong>ในกรณีที่ไม่สามารถคลิ๊ก link ยืนยันได้ กรุณาคัดลอก URL ต่อไปนี้ไปวางใน Address Bar แล้วกด Enter</strong><br>
			ยืนยันการลบโพสต์ : <a href='http://$titler[13]/friend/del-post.php?post_id=$post_id&email=$email&code_active=$rp[0]'>http://$titler[13]/del-post.php?post_id=$post_id&email=$email&code_active=$rp[0]</a>";
			$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);
	
			mysql_close();
?>
			<script language="JavaScript"> 	
				alert('ขณะนี้ ระบบได้ส่ง link ยืนยันการลบโพสต์ไปยัง Email ของท่าน (<?=$email;?>) Email อาจอยู่ใน กล่องขาเข้า(Inbox) หรือ กล่องขยะ(Junk)'); 	
				window.location = 'index.php'; 
			</script> 
