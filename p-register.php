<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "inc/config.inc.php";
$name=htmlspecialchars($_POST[name]);
$add=htmlspecialchars($_POST[add]);
$province=$_POST[province];
$tel=htmlspecialchars($_POST[tel]);
$email=htmlspecialchars($_POST[email]);
$user=htmlspecialchars($_POST[user]);
$pass=htmlspecialchars($_POST[pass]);
$capcha=htmlspecialchars($_POST[capcha]);
$rands=$_POST[rands];
$date=date("Y-m-d");
if(isset($rands)&&isset($capcha)&&$rands==$capcha){
$s="SELECT * FROM `member` WHERE user='$user' OR email='$email'";
$re=mysql_query($s) or die("ERROR $s");
$n=mysql_num_rows($re);
if($n>=1){
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ ชื่อผู้ใช้ และ/หรือ Email นี้มีอยู่ในระบบแล้วครับ'); 	
		window.location = 'member-condition.php'; 
	</script> 
<? 
exit();
}else{
$insert_member=mysql_query("INSERT INTO `member` (`name` ,`add` ,`province_id` ,`tel` ,`email` ,`user` ,`pass` ,`reg_date` )VALUES ('$name', '$add', '$province', '$tel', '$email', '$user', '$pass', '$date')") or die ("ERROR $insert_member");

$s="SELECT id, name, user, pass FROM `member` ORDER BY id DESC LIMIT 0,1";
$re=mysql_query($s) or die("ERROR $s");
$r=mysql_fetch_row($re);
$_SESSION[member_login]="member_login";
$_SESSION[m_id]="$r[0]";
$_SESSION[m_name]="$r[1]";
$_SESSION[m_user]="$r[2]";
$_SESSION[m_pass]="$r[3]";
echo "<meta http-equiv=refresh content=0;URL=member/index.php>"; 
}
}else{
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ คุณกรอกรหัสยืนยันไม่ถูกต้องครับ'); 	
		window.location = 'member-condition.php'; 
	</script> 
<? 
	exit();
}
?>