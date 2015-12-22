<?
@session_start();
include "../inc/config.inc.php";
include "../function/datethai.php";
include "../function/datetime.php";
include "../function/function.php";
if(!isset($_SESSION[member_login])) {
echo "<meta http-equiv='refresh' content='0;url=../index.php'>" ; 
exit() ;
}
$title="select * from web_detail where id=1";
$titlere=mysql_query($title) or die("ERROR $title บรททัด4");
$titler=mysql_fetch_row($titlere);
$link="select * from link where id=1";
$linkre=mysql_query($link) or die("ERROR $link บรททัด7");
$linkr=mysql_fetch_row($linkre);
$banner="select * from site_logo where id=1";
$bannerre=mysql_query($banner) or die("ERROR $banner บรททัด10");
$bannerr=mysql_fetch_row($bannerre);
$bg="select * from bg where id=1";
$bgre=mysql_query($bg) or die("ERROR $bg บรททัด13");
$bgr=mysql_fetch_row($bgre);
$fb="select * from fanpage where id=1";
$fbre=mysql_query($fb) or die("ERROR $fb บรททัด16");
$fbr=mysql_fetch_row($fbre);
$st="select * from stats where id=1";
$stre=mysql_query($st) or die("ERROR $st บรททัด19");
$str=mysql_fetch_row($stre);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบจัดการข้อมูลสมาชิก | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[12];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> ระบบจัดการข้อมูลสมาชิก <?=$titler[11];?>">
<meta name="robots"  content="index,nofollow">
<style type="text/css">
<!--
body {
	background-color: #<?=$bgr[1];?>;
	<? if($bgr[2]!=""){ ?>background-image: url(http://<?=$titler[13];?>/bg-img/<?=$bgr[2];?>);
	background-repeat: <?=$bgr[3];?>;
	<? } ?>
	margin-top: 0px;
	margin-bottom: 0px;
}
a:link {
	color: #<?=$linkr[1];?>;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #<?=$linkr[2];?>;
}
a:hover {
	text-decoration: underline;
	color: #<?=$linkr[3];?>;
}
a:active {
	text-decoration: none;
	color: #<?=$linkr[4];?>;
}
-->
</style>
</head>

<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td><? include "../header.php"; ?></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
        <table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="200" align="center" valign="top"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><? include "../menu-left.php"; ?></td>
                </tr>
                <tr>
                  <td><? include "../menu-ads-a6.php"; ?></td>
                </tr>
              </table>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="5"></td>
                  </tr>
              </table></td>
            <td width="5" align="center" valign="top">&nbsp;</td>
            <td width="765" align="center" valign="top"><table width="765" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="30" background="http://<?=$titler[13];?>/img/bg-title-category.png"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left"><span style="font-size:15px; font-weight:bold; color:#333333;">แก้ไขข้อมูลส่วนตัว</span></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                    <form action="p-edit-personal.php" method="post" enctype="multipart/form-data" name ="checkForm1" id="checkForm1" onsubmit="return check2()">
                      <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td>
<?
$sp="select * from member where id='$_SESSION[m_id]'";
$rep=mysql_query($sp) or die("ERROR $sp");
$rp=mysql_fetch_row($rep);
?>
                              <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td height="30" align="left"><font size="2" color="#0066FF"><strong>:: ข้อมูลการติดต่อ :: </strong></font></td>
                                </tr>
                                <tr>
                                  <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td width="130" height="20" align="right" valign="top"><font size="2">ชื่อที่ใช้เรียก</font></td>
                                        <td width="10" height="20" align="center" valign="top"><font size="2">:</font></td>
                                        <td width="610" height="20" align="left"><input name="name" type="text" id="name" style="width:250px;" value="<?=$rp[1];?>" />
                                            <font size="2" color="#FF0000">*</font></td>
                                      </tr>
                                      <tr>
                                        <td width="130" height="20" align="right" valign="top"><font size="2">ที่อยู่</font></td>
                                        <td width="10" height="20" align="center" valign="top"><font size="2">:</font></td>
                                        <td width="610" height="20" align="left"><input name="add" type="text" id="add" style="width:480px;" value="<?=$rp[2];?>" />
                                            <font size="2" color="#FF0000">*</font></td>
                                      </tr>
                                      <tr>
                                        <td width="130" height="20" align="right" valign="top"><font size="2">จังหวัด</font></td>
                                        <td width="10" height="20" align="center" valign="top"><font size="2">:</font></td>
                                        <td width="610" height="20" align="left"><select id="province" name="province" onchange = "list_province(this.value)" style="width:200px">
                                            <?
	$strSQL = "SELECT * FROM province ORDER BY CONVERT(PROVINCE_NAME USING TIS620) ASC ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
                                            <option value="<?=$objResult["PROVINCE_ID"];?>" <? if($objResult["PROVINCE_ID"]==$rp[3]){ echo "selected"; } ?>>
                                              <?=$objResult["PROVINCE_NAME"];?>
                                          </option>
                                            <? } ?>
                                          </select>
                                            <font size="2" color="#FF0000">*</font></td>
                                      </tr>

                                      <tr>
                                        <td width="130" height="20" align="right" valign="top"><font size="2">เบอร์โทรศัพท์</font></td>
                                        <td width="10" height="20" align="center" valign="top"><font size="2">:</font></td>
                                        <td width="610" height="20" align="left"><input name="tel" type="text" id="tel" style="width:250px;" value="<?=$rp[4];?>" />
                                            <font size="2" color="#FF0000">*</font></td>
                                      </tr>
                                      <tr>
                                        <td width="130" height="20" align="right" valign="top"><font size="2">Email</font></td>
                                        <td width="10" height="20" align="center" valign="top"><font size="2">:</font></td>
                                        <td width="610" height="20" align="left"><input name="email" type="text" id="email" style="width:250px;" value="<?=$rp[5];?>" />
                                            <font size="2" color="#FF0000">*</font></td>
                                      </tr>

                                  </table></td>
                                </tr>
                            </table></td>
                        </tr>
                        <tr>
                          <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="30" align="left"><font size="2" color="#0066FF"><strong>:: ข้อมูลการเข้าสู่ระบบ :: </strong></font></td>
                              </tr>
                              <tr>
                                <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="130" height="20" align="right" valign="top"><font size="2">ชื่อผู้ใช้</font></td>
                                      <td width="10" height="20" align="center" valign="top"><font size="2">:</font></td>
                                      <td width="610" height="20" align="left"><input name="user" type="text" id="user" style="width:200px;" value="<?=$rp[6];?>" />
                                          <font size="2" color="#FF0000">*</font></td>
                                    </tr>
                                    <tr>
                                      <td width="130" height="20" align="right" valign="top"><font size="2">รหัสผ่าน</font></td>
                                      <td width="10" height="20" align="center" valign="top"><font size="2">:</font></td>
                                      <td width="610" height="20" align="left"><input name="pass" type="password" id="pass" style="width:200px;" value="<?=$rp[7];?>" />
                                          <font size="2" color="#FF0000">*</font></td>
                                    </tr>
                                    <tr>
                                      <td width="130" height="20" align="right" valign="top">&nbsp;</td>
                                      <td width="10" height="20" align="center" valign="top">&nbsp;</td>
                                      <td width="610" height="20" align="right"><input type="submit" name="Submit" value="บันทึกข้อมูล" /></td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                      </table>
                      <script language="JavaScript" type="text/javascript">

function check2() {
if(document.checkForm1.name.value=="") {
alert("กรุณากรอก ชื่อ - นามสกุล / บริษัท ด้วยนะครับ") ;
document.checkForm1.name.focus() ;
return false ;
}
else if(document.checkForm1.add.value=="") {
alert("กรุณากรอกที่อยู่ด้วยนะครับ") ;
document.checkForm1.add.focus() ;
return false ;
}
else if(document.checkForm1.province.value=="") {
alert("กรุณาเลือกจังหวัดด้วยนะครับ") ;
document.checkForm1.province.focus() ;
return false ;
}
else if(document.checkForm1.amphur.value=="") {
alert("กรุณาเลือกอำเภอด้วยนะครับ") ;
document.checkForm1.amphur.focus() ;
return false ;
}
else if(document.checkForm1.tel.value=="") {
alert("กรุณากรอกเบอร์โทรศัพท์ด้วยนะครับ") ;
document.checkForm1.tel.focus() ;
return false ;
}
else if(document.checkForm1.email.value=="") {
alert("กรุณากรอก Email ด้วยนะครับ") ;
document.checkForm1.email.focus() ;
return false ;
}
else if(checkForm1.email.value.indexOf('@')==-1) {
alert("Email ของคุณไม่ถูกต้องครับ") ;
document.checkForm1.email.focus() ;
return false ;
}
else if(checkForm1.email.value.indexOf('.')==-1) {
alert("Email ของคุณไม่ถูกต้องครับ") ;
document.checkForm1.email.focus() ;
return false ;
}
else if(document.checkForm1.user.value=="") {
alert("กรุณากรอกชื่อที่ใช้เข้าระบบของคุณด้วยนะครับ") ;
document.checkForm1.user.focus() ;
return false ;
}
else if(document.checkForm1.pass.value=="") {
alert("กรุณากรอกรหัสผ่านของคุณด้วยนะครับ") ;
document.checkForm1.pass.focus() ;
return false ;
}
else 
return true ;
}

                    </script>
                    </form></td>
                </tr>
              </table>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="5"></td>
                  </tr>
              </table></td>
          </tr>
      </table></td>
  </tr>
  <tr>
    <td height="50"><? include "../footer.php"; ?></td>
  </tr>
</table>
</body>
</html>
