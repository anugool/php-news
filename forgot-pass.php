<?
@session_start();
include "inc/config.inc.php";
include "function/datethai.php";
include "function/datetime.php";
include "function/function.php";
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
<title>ลืมรหัสผ่าน | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[12];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> ลืมรหัสผ่าน <?=$titler[11];?>">
<meta name="robots"  content="index,follow">
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
    <td><? include "header.php"; ?></td>
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
            <td><? include "menu-left.php"; ?></td>
          </tr>
          <tr>
            <td><? include "menu-ads-a6.php"; ?></td>
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
                  <td align="left"><span style="font-size:15px; font-weight:bold; color:#333333;">ลืมรหัสผ่าน</span></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><form action="p-forgot-pass.php" method="post" enctype="multipart/form-data" name ="checkForm1" id="checkForm1" onsubmit="return check2()">
              <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
                      <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="100" align="right"><font size="2">Email</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="440" align="left"><input name="email" type="text" id="email" style="width:440px;"/></td>
                          <td width="10" align="right">&nbsp;</td>
                          <td width="90" align="left"><input type="submit" name="Submit" value="ส่งคำร้อง" /></td>
                        </tr>
                      </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="5"></td>
                        </tr>
                    </table></td>
                </tr>
              </table>
              <script language="JavaScript" type="text/javascript">

function check2() {
if(document.checkForm1.email.value=="") {
alert("กรุณากรอกอีเมล์ของคุณด้วยนะครับ") ;
document.checkForm1.email.focus() ;
return false ;
}
else if(checkForm1.email.value.indexOf('@')==-1) {
alert("อีเมล์ของคุณไม่ถูกต้องครับ") ;
document.checkForm1.email.focus() ;
return false ;
}
else if(checkForm1.email.value.indexOf('.')==-1) {
alert("อีเมล์ของคุณไม่ถูกต้องครับ") ;
document.checkForm1.email.focus() ;
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
    <td height="50"><? include "footer.php"; ?></td>
  </tr>
</table>
</body>
</html>
