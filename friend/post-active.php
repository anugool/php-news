<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "../inc/config.inc.php";
$post_id=$_GET[post_id];
$email=$_GET[email];
$code_active=$_GET[code_active];

//select post
$sp="SELECT * FROM `post_friend` WHERE id='$post_id' AND email='$email' AND code_active='$code_active'";
$rep=mysql_query($sp) or die("ERROR $sp บรรทัด 10");
$np=mysql_num_rows($rep);
if($np<=0){
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ ไม่พบข้อมูล'); 	
	window.location = 'index.php'; 
</script> 
<?
}else{
//upd post active
$upd_post_active=mysql_query("UPDATE `post_friend` SET active='1' WHERE id='$post_id'") or die("ERROR upd_post_active บรรทัด 96");
mysql_close();
?>
<script language="JavaScript"> 	
	alert('ยืนยันการโพสต์เรียบร้อยแล้ว'); 	
	window.location = 'index.php'; 
</script> 
<? } ?>