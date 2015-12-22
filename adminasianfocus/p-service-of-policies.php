<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION[admin_login])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$detail=$_POST[input];
$upd=mysql_query("UPDATE `service_of_policies` SET `detail` =  '$detail' WHERE `id` =1 LIMIT 1") or die("Error $upd");
mysql_close();
print "<meta http-equiv=refresh content=0;URL=service-of-policies.php>";
?>
