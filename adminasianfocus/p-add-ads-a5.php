<?
session_start();
include "../inc/config.inc.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION[admin_login])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$type=$_POST[type_id];
if($type==1){
$adsense=$_POST[adsense];
$upd=mysql_query("INSERT INTO `ads_a5` (`type` ,`type_ads` ,`adsense` ,`name` ,`tel` ,`email` ,`url` ,`keyword` ,`img` ,`start_date` ,`finish_date`)VALUES ('$type', '', '$adsense', '', '', '', '', '', '', '', '')") or die("Error $upd");
mysql_close();
}else if($type==2){
$type_ads=$_POST[type_ads];
$keyword=$_POST[keyword];
$url=$_POST[url];
$start_date=$_POST[start_date];
$finish_date=$_POST[finish_date];
$name=$_POST[name];
$tel=$_POST[tel];
$email=$_POST[email];
$file1=$_FILES[file1][name];
$tmp1=$_FILES[file1][tmp_name];

if($file1==""){ 
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ กรุณาเลือกไฟล์โฆษณาด้วยนะครับ'); 	
	history.back();
</script> 
<?
}else{ 
$date=date("dmYHis");
$img="$date-$file1";
@copy($tmp1,"../ads-img/$img"); 
$upd=mysql_query("INSERT INTO `ads_a5` (`type` ,`type_ads` ,`adsense` ,`name` ,`tel` ,`email` ,`url` ,`keyword` ,`img` ,`start_date` ,`finish_date`)VALUES ('$type', '$type_ads', '', '$name', '$tel', '$email', '$url', '$keyword', '$img', '$start_date', '$finish_date')") or die("Error $upd");
mysql_close();
}
}
print "<meta http-equiv=refresh content=0;URL=ads-a5.php>";
?>
