<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION[admin_login])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$op=$_POST[op];
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

if($file1!=""){ 
$time=date("YnjHis");
$rename="$time-$file1";
$img=$rename; 
$part1="../ads-img/$op";
@unlink ($part1);
@copy($tmp1,"../ads-img/$img"); 
}else{ 
$img=$op; 
}
$upd=mysql_query("UPDATE `ads_a4` SET `type_ads` =  '$type_ads', `name` =  '$name', `tel` =  '$tel', `email` =  '$email', `url` =  '$url', `keyword` =  '$keyword', `img` =  '$img', `start_date` =  '$start_date', `finish_date` =  '$finish_date' WHERE `id` =1 LIMIT 1") or die("Error $upd");
mysql_close();
print "<meta http-equiv=refresh content=0;URL=ads-a4.php>";
?>
