<? 
@session_start(); 
include "../inc/config.inc.php";
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
	color: #000000;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: underline;
	color: #FFFFFF;
}
a:active {
	text-decoration: none;
	color: #000000;
}
body {
	background-color: #888888;
}
-->
</style></head>

<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
  <tr>
    <td><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="90" bgcolor="#666666"><div align="center">
            <table width="960" border="0" cellspacing="1" cellpadding="1">
              <tr valign="top">
                <td width="690"><div align="left"><font color="#ffffff" size="4">.:: ยินดีต้อนรับเข้าสู่ ระบบจัดการข้อมูลเว็บไซต์ ::
                  <?
				$dm=date("d/m");
				$y=date("Y")+543;
				$date="$dm/$y";
				$time=date("H:i:s");
				echo "$date $time";
				?>
                  ::.</font></div></td>
                <td width="270"><div align="right"><font color="#ffffff" size="4"><a href="../index.php" target="_blank"><font color="#ffffff">ไปยังหน้าเว็บไซต์</font></a> | <a href="logout.php"><font color="#ffffff">ออกจากระบบ</font></a></font></div></td>
              </tr>
            </table>
        </div></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCCC"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="220" align="center" valign="top"><? include "menu.php"; ?></td>
              <td width="760" align="center" valign="top" bgcolor="#FFFFFF"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> เพิ่มหมวดหมู่ </font></strong></td>
                  </tr>
                  <tr>
                    <td><form action="p-add-category.php" method="post" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                      <table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="100" align="right"><strong><font size="2">ชื่อหมวดหมู่</font></strong></td>
                          <td width="10" align="center">&nbsp;</td>
                          <td width="350" align="left"><input name="cate_name" type="text" id="cate_name" style="width:200px;" /></td>
                        </tr>
                        <tr>
                          <td width="100" align="right"><strong><font size="2">แทรกไอคอน</font></strong></td>
                          <td width="10" align="center">&nbsp;</td>
                          <td width="350" align="left"><input name="file1" type="file" id="file1" style="width:200px;" /> <font size="2" color="#FF0000">* รูปภาพขนาด 16 x 16 px</font></strong></td>
                        </tr>
                        <tr>
                          <td width="100" align="right">&nbsp;</td>
                          <td width="10" align="center">&nbsp;</td>
                          <td width="350" align="left">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="100" height="105" align="right" valign="top"><strong><font size="2">Title</font></strong></td>
                          <td width="10" height="105" align="center" valign="top">&nbsp;</td>
                          <td width="350" height="105" align="left" valign="top"><textarea name="title" id="title" style="width:330px; height:100px;"></textarea></td>
                        </tr>
                        <tr>
                          <td width="100" height="105" align="right" valign="top"><strong><font size="2">Description</font></strong></td>
                          <td width="10" height="105" align="center" valign="top">&nbsp;</td>
                          <td width="350" height="105" align="left" valign="top"><textarea name="description" id="description" style="width:330px; height:100px;"></textarea></td>
                        </tr>
                        <tr>
                          <td width="100" height="105" align="right" valign="top"><strong><font size="2">Keyword</font></strong></td>
                          <td width="10" height="105" align="center" valign="top">&nbsp;</td>
                          <td width="350" height="105" align="left" valign="top"><textarea name="keyword" id="keyword" style="width:330px; height:100px;"></textarea></td>
                        </tr>
                        <tr>
                          <td width="100" align="right">&nbsp;</td>
                          <td width="10" align="center">&nbsp;</td>
                          <td width="350" align="left"><input type="submit" name="Submit" value="บันทึกข้อมูล" /></td>
                        </tr>
                      </table>
<script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.cate_name.value=="") {
alert("กรุณากรอกชื่อหมวดหมู่ด้วยนะครับ") ;
document.checkForm.cate_name.focus() ;
return false ;
}else if(document.checkForm.file1.value=="") {
alert("กรุณาเลือกไฟล์ไอคอนด้วยนะครับ") ;
document.checkForm.file1.focus() ;
return false ;
}else if(document.checkForm.title.value=="") {
alert("กรุณากรอก Title ด้วยนะครับ") ;
document.checkForm.title.focus() ;
return false ;
}else if(document.checkForm.description.value=="") {
alert("กรุณากรอก Description ด้วยนะครับ") ;
document.checkForm.description.focus() ;
return false ;
}else if(document.checkForm.keyword.value=="") {
alert("กรุณากรอก Keyword ด้วยนะครับ") ;
document.checkForm.keyword.focus() ;
return false ;
}
else 
return true ;
}
</script>
</form>
                    </td>
                  </tr>
                </table></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#666666"><strong><font size="2" color="#ffffff">Copyright 2012 &copy; Asianfocus </font></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
