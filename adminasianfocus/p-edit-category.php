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
$cate_id=$_POST[cate_id];
$cate_name=$_POST[cate_name];
$title=$_POST[title];
$description=$_POST[description];
$keyword=$_POST[keyword];
$op=$_POST[op];
$file1=$_FILES[file1][name];
$tmp1=$_FILES[file1][tmp_name];
//echo "$cate_name=[cate_name]<br>$title=[title]<br>$description=[description]<br>$keyword=[keyword]<br>$file1=[file1][name]<br>$tmp1=[file1][tmp_name]";
if($cate_name!=""&&$title!=""&&$description!=""&&$keyword!=""){
	if($file1==""){
	//update
	$update=mysql_query("UPDATE `category` SET `cate_name`='$cate_name' ,`title`='$title' ,`description`='$description' ,`keyword`='$keyword' WHERE id='$cate_id'") or die("ERROR $insert update 36");
	mysql_close();
		if($cate_id>18){
		print "<meta http-equiv=refresh content=0;URL=all-other-category.php?cate_id=$cate_id>";
		}else if($cate_id<=18){
		print "<meta http-equiv=refresh content=0;URL=all-main-category.php?cate_id=$cate_id>";
		}
	}else{
	$part1="../icon-menu/$op";
	@unlink ($part1);
	$time=date("YnjHis");
	$rename="$time-$file1";
	@copy($tmp1,"../icon-menu/$rename");
	//update
	$update=mysql_query("UPDATE `category` SET `cate_name`='$cate_name' ,`icon`='$rename' ,`title`='$title' ,`description`='$description' ,`keyword`='$keyword' WHERE id='$cate_id'") or die("ERROR $insert update 36");
	mysql_close();
		if($cate_id>18){
		print "<meta http-equiv=refresh content=0;URL=all-other-category.php?cate_id=$cate_id>";
		}else if($cate_id<=18){
		print "<meta http-equiv=refresh content=0;URL=all-main-category.php?cate_id=$cate_id>";
		}
	}
}else{
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ ท่านกรอกข้อมูลไม่ครบครับ'); 	
	history.back();
</script>
<?
exit();
}
?>