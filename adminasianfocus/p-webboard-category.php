<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION[admin_login])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการร้านค้า ::.</title>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
.style4 {font-size: small; font-weight: bold; }
-->
</style></head>

<body>
<?
$Submit=$_POST[Submit];
$brand=htmlspecialchars($_POST[brand]);
$s="select * from category where cate_name='$brand'";
$re=mysql_query($s) or die("ERROR $s บรททัด39");
$num=mysql_num_rows($re);
if($num>=1){
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ หมวดหมู่หลักนี้มีอยู่แล้วครับ'); 	
	history.back();
</script> 
<?
}else{
if($brand!=""){
$sql=mysql_query("INSERT INTO `webboard_category` (`cate_name`)VALUES ('$brand')")or die("ERROR $sql บรรทัด 51");
echo "<meta http-equiv='refresh' content='0;url=webboard-category.php'>"; 
}else{
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ คุณกรอกข้อมูลไม่ครบครับ'); 	
	history.back();
</script> 
<?
}
}
?>
</body>
</html>