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
//ลบรูป
$s="select img from post_friend where id='$post_id'";
$re=mysql_query($s) or die("ERROR $s");
$r=mysql_fetch_row($re);
$part="show-img/$r[0]";
@unlink ($part);

//del post
$sql=mysql_query("delete from post_friend where id='$post_id'")or die("ERROR $sql");

//del post_option
$sql3=mysql_query("delete from post_friend_option where post_id='$post_id'")or die("ERROR $sql3");

//del contact_del
$sql4=mysql_query("delete from contact_del_friend where post_id='$post_id'")or die("ERROR $sql4");
?>
<script language="JavaScript"> 	
	alert('ลบโพสต์เรียบร้อยแล้ว'); 	
	window.location = 'index.php'; 
</script> 
<? } ?>