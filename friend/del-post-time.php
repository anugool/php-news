#!/usr/local/bin/php -q
<?
include "../inc/config.inc.php";

$date=date("Y-n-j H:i");
//ลบรูป
$s="select id, img from post_friend where post_exp='$date'";
$re=mysql_query($s) or die("ERROR $s");
$num=mysql_num_rows($re);
if($num>=1){
while($r=mysql_fetch_row($re)){
$part="show-img/$r[1]";
@unlink ($part);

//del post
$sql=mysql_query("delete from post_friend where id='$r[0]'")or die("ERROR $sql");

//del post_option
$sql3=mysql_query("delete from post_friend_option where post_id='$r[0]'")or die("ERROR $sql3");

//del contact_del
$sql4=mysql_query("delete from contact_del_friend where post_id='$r[0]'")or die("ERROR $sql4");
}
}
?>