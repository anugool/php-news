<? 
session_start();
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION[member_login])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "../inc/config.inc.php";
$name=htmlspecialchars($_POST[name]);
$add=htmlspecialchars($_POST[add]);
$province=$_POST[province];
$tel=htmlspecialchars($_POST[tel]);
$email=htmlspecialchars($_POST[email]);
$user=htmlspecialchars($_POST[user]);
$pass=htmlspecialchars($_POST[pass]);

$update_member=mysql_query("UPDATE `member` SET `name`='$name' ,`add`='$add' ,`province_id`='$province' ,`tel`='$tel' ,`email`='$email' ,`user`='$user' ,`pass`='$pass' WHERE id='$_SESSION[m_id]'") or die ("ERROR $update_member");

$_SESSION[m_name]="$name";
echo "<meta http-equiv=refresh content=0;URL=index.php>"; 
?>