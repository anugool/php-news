<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION[admin_login])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลเว็บไซต์ ::.</title>
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
$type=$_GET[type];
$post_id=$_GET[post_id];
//ลบรูป
$s="select img from post_friend where id='$post_id'";
$re=mysql_query($s) or die("ERROR $s");
$r=mysql_fetch_row($re);
$part="../friend/show-img/$r[0]";
@unlink ($part);

//del post
$sql=mysql_query("delete from post_friend where id='$post_id'")or die("ERROR $sql");

//del post_option
$sql3=mysql_query("delete from post_friend_option where post_id='$post_id'")or die("ERROR $sql3");

//del contact_del
$sql4=mysql_query("delete from contact_del_friend where post_id='$post_id'")or die("ERROR $sql4");

if($type==1){
$url="all-list-active.php";
}else if($type==2){
$url="all-list-unactive.php";
}else if($type==3){
$url="contact-del-friend.php";
}else if($type==4){
$url="../friend/index.php";
}
print "<meta http-equiv=refresh content=0;URL=$url>";
?>
</body>
</html>
