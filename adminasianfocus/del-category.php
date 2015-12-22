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
$cate_id=$_GET[cate_id];
$op=$_GET[op];
if($cate_id>18){
//del icon
$part1="../icon-menu/$op";
@unlink ($part1);

//del category
$sql=mysql_query("delete from category where id='$cate_id'")or die("ERROR $sql");

//select img from post
$spost="SELECT id, img FROM `post` WHERE cate_id='$cate_id'";
$repost=mysql_query($spost) or die("ERROR $spost");
while($rpost=mysql_fetch_row($repost)){
//del img
$part2="../post-s-img/$rpost[1]";
@unlink ($part2);

//del tag post
$sql3=mysql_query("delete from tag_post where post_id='$rpost[0]'")or die("ERROR $sql3");

//del contact_del_post
$sql5=mysql_query("delete from contact_del_post where post_id='$rpost[0]'")or die("ERROR $sql5");
}

//del post
$sql4=mysql_query("delete from post where cate_id='$cate_id'")or die("ERROR $sql4");

mysql_close();
?>
<script language="JavaScript"> 	
	alert('ลบข้อมูลเสร็จเรียบร้อย'); 	
	window.location = 'data.php'; 
</script> 
<?
}else if($cate_id<=18){
?>
<script language="JavaScript"> 	
	alert('ผิดพลาด ไม่สามารถลบข้อมูลได้'); 	
	history.back();
</script> 
<?
}
?>
</body>
</html>
