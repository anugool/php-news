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
$cate_name=$_POST[cate_name];
$title=$_POST[title];
$description=$_POST[description];
$keyword=$_POST[keyword];
$file1=$_FILES[file1][name];
$tmp1=$_FILES[file1][tmp_name];
//echo "$cate_name=[cate_name]<br>$title=[title]<br>$description=[description]<br>$keyword=[keyword]<br>$file1=[file1][name]<br>$tmp1=[file1][tmp_name]";
$s="select * from category where cate_name='$cate_name'";
$re=mysql_query($s) or die("ERROR $s บรททัด 19");
$num=mysql_num_rows($re);
if($num>=1){
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ หมวดหมู่นี้มีอยู่แล้วครับ'); 	
	history.back();
</script> 
<?
exit();
}else{
	if($cate_name!=""&&$file1!=""&&$title!=""&&$description!=""&&$keyword!=""){
	$time=date("YnjHis");
	$rename="$time-$file1";
	@copy($tmp1,"../icon-menu/$rename");
	//insert
	$insert=mysql_query("INSERT INTO `category` (`cate_name` ,`icon` ,`title` ,`description` ,`keyword`)VALUES ('$cate_name', '$rename', '$title', '$description', '$keyword')") or die("ERROR $insert บรรทัดที่ 36");
	
	//select id
	$scate="select id from category order by id desc limit 0,1";
	$recate=mysql_query($scate) or die("ERROR $scate บรรทัด 39");
	$rcate=mysql_fetch_row($recate);
	mysql_close();
	print "<meta http-equiv=refresh content=0;URL=all-other-category.php?cate_id=$rcate[0]>";
	}else{
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ ท่านกรอกข้อมูลไม่ครบครับ'); 	
		history.back();
	</script>
<?
	exit();
	}
}
?>
