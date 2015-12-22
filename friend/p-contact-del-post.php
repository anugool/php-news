<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "../inc/config.inc.php";
$post_id=$_POST[post_id];
$email=$_POST[email];
$cause=$_POST[cause];
$cause_other=$_POST[cause_other];
$capcha=$_POST[capcha];
$rands=$_POST[rands];
$date=date("Y-n-j H:i:s");

if(isset($rands)&&isset($capcha)&&$rands==$capcha){
$insert=mysql_query("INSERT INTO `contact_del_friend` (`post_id` ,`email` ,`cause` ,`cause_other` ,`date`)VALUES ('$post_id', '$email', '$cause', '$cause_other', '$date')") or die("ERROR $insert บรรทัดที่ 56");
mysql_close();
?>
<script language="JavaScript"> 	
	alert('บันทึกข้อมูลเสร็จเรียบร้อย'); 	
	window.location = 'index.php'; 
</script> 
<?
}else{
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ คุณกรอกรหัสยืนยันไม่ถูกต้องครับ'); 	
		history.back();
	</script> 
<? 
}
?>