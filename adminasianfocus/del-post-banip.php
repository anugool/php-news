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
$post_id=$_GET[post_id];
$ip=$_GET[ip];
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

//ban ip
$sql2=mysql_query("INSERT INTO `ban_ip` (`ip`)VALUES ('$ip')")or die("ERROR $sql2");

print "<meta http-equiv=refresh content=0;URL=ban-ip.php>";
?>
