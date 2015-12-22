<?
@session_start();
include "../inc/config.inc.php";

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
$st="select * from stats where id=1";
$stre=mysql_query($st) or die("ERROR $st บรททัด19");
$str=mysql_fetch_row($stre);

$post_id=$_GET[post_id];
$email=$_GET[email];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แจ้งลบประกาศ ลบประกาศที่ไม่เหมาะสม | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[12];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> แจ้งลบประกาศ ลบประกาศที่ไม่เหมาะสม <?=$titler[11];?>">
<meta name="robots" content="index,follow">
<style type="text/css">
<!--
body {
	background-color: #<?=$bgr[1];?>;
	<? if($bgr[2]!=""){ ?>background-image: url(bg-img/<?=$bgr[2];?>);
	background-repeat: <?=$bgr[3];?>;
	<? } ?>
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
    <td><? include "post_search.php"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
      <table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="665" align="center" valign="top"><table width="665" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="665" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="25" align="center" bgcolor="#333333"><font size="3" color="#FFFFFF"><strong>สำหรับเจ้าของอีเมล์</strong></font></td>
                </tr>
                <tr>
                  <td height="50" align="center" valign="middle">หากท่านเป็นเจ้าของอีเมล์ <?=$email;?><br />
                    และต้องการลบโพสต์อันนี้ ออกจากบอร์ดหาเพื่อน Social Network </td>
                </tr>
                <tr>
                  <td align="center">
				  <form id="form1" name="form1" method="post" action="send-del-post.php">
				  <input type="hidden" name="post_id" id="post_id" value="<?=$post_id;?>" />
				  <input type="hidden" name="email" id="email" value="<?=$email;?>" />
				  <input type="submit" name="Submit" value="คลิกที่นี่เพื่อลบ" />
				  </form>
                  </td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td><table width="665" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="25" align="center" bgcolor="#333333"><font size="3" color="#FFFFFF"><strong>สำหรับผู้อื่น</strong></font></td>
                </tr>
                <tr>
                  <td height="50" align="center" valign="middle">หากท่านไม่ใช่เจ้าของอีเมล์
                    <?=$email;?>
                    <br />
และต้องการแจ้งลบอีเมล์นี้ กรุณาระบุสาเหตุที่อีเมล์หรือข้อความนี้ไม่เหมาะสม </td>
                </tr>
                <tr>
                  <td align="center"><form id="form1" name="form1" method="post" action="p-contact-del-post.php">
                      <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="left"><input name="cause" type="radio" id="cause" value="เชิงธุรกิจ" checked="checked" onclick="cause_other.disabled=true" /> 
                            <font size="2">เชิงธุรกิจ</font></td>
                        </tr>
                        <tr>
                          <td align="left"><input type="radio" name="cause" id="cause" value="ลามกอนาจาร" onclick="cause_other.disabled=true" />
                            <font size="2">ลามกอนาจาร</font></td>
                        </tr>
                        <tr>
                          <td align="left"><input type="radio" name="cause" id="cause" value="ส่อไปในทางซื้อ-ขายบริการ" onclick="cause_other.disabled=true" />
                            <font size="2">ส่อไปในทางซื้อ-ขายบริการ</font></td>
                        </tr>
                        <tr>
                          <td align="left"><input type="radio" name="cause" id="cause" value="ใช้ถ้อยคำหยาบคาย" onclick="cause_other.disabled=true" />
                            <font size="2">ใช้ถ้อยคำหยาบคาย</font></td>
                        </tr>
                        <tr>
                          <td align="left"><input type="radio" name="cause" id="cause" value="หลอกลวง มิจฉาชีพ หลอกให้โอนเงิน" onclick="cause_other.disabled=true" />
                            <font size="2">หลอกลวง มิจฉาชีพ หลอกให้โอนเงิน</font></td>
                        </tr>
                        <tr>
                          <td align="left"><input type="radio" name="cause" id="cause" value="สิ่งผิดกฎหมาย/การพนัน" onclick="cause_other.disabled=true" />
                            <font size="2">สิ่งผิดกฎหมาย/การพนัน</font></td>
                        </tr>
                        <tr>
                          <td align="left"><input type="radio" name="cause" id="cause" value="ยาเสพติด" onclick="cause_other.disabled=true" />
                            <font size="2">ยาเสพติด</font></td>
                        </tr>
                        <tr>
                          <td align="left"><input type="radio" name="cause" id="cause" value="อื่นๆ โปรดระบุ " onclick="cause_other.disabled=false" />
                            <font size="2">อื่นๆ โปรดระบุ 
                            <input name="cause_other" type="text" id="cause_other" disabled="disabled" />
                            </font></td>
                        </tr>
                        <tr>
                          <td align="left"><table width="300" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="100"><table width="100" border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                                  <tr>
                                    <td align="center"><strong><font size="3" color="#B00D0E">
                                      <? 
$rand = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789'),0,4);
echo $rand;
?>
                                    </font></strong></td>
                                  </tr>
                              </table></td>
                              <td width="10">&nbsp;</td>
                              <td width="610"><input name="capcha" type="text" id="capcha" style="width:100px;" />
                                <input type="hidden" name="rands" id="rands" value="<?=$rand;?>" /></td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td align="center"><input type="hidden" name="post_id" id="post_id" value="<?=$post_id;?>" />
                            <input type="hidden" name="email" id="email" value="<?=$email;?>" />
                            <input type="submit" name="Submit" value="คลิกที่นี่เพื่อแจ้งลบ" /></td>
                        </tr>
                      </table>
                      </form></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
          <td width="5" align="center" valign="top">&nbsp;</td>
          <td width="300" align="center" valign="top"><? include "banner_right.php"; ?></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td><? include "../footer.php"; ?></td>
  </tr>
</table>
</body>
</html>
