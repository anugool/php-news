<? 
@session_start(); 
include "../inc/config.inc.php";
if(!isset($_SESSION[admin_login])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$s="SELECT * FROM `ads_a7` WHERE id='1'";
$re=mysql_query($s) or die("Error $s");
$r=mysql_fetch_row($re);
if(isset($_GET[type])){
$type=$_GET[type];
}else{
$type=$r[1];
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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> จัดการข้อมูลโฆษณาตำแหน่ง A7 728 x 90 px</font></strong></td>
                  </tr>
                  <tr>
                    <td><form id="form1" name="form1" method="post" action="p-ads-a7.php" enctype="multipart/form-data">
                      <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">ประเภทโฆษณา</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500"><select name="type" id="type" onchange="window.open(this.options[this.selectedIndex].value,'_self')">
                              <option value="">- เลือกประเภทโฆษณา -</option>
                              <option value="ads-a7.php?type=1" <? if($type==1){ echo "selected"; }?>>Google Adsense</option>
                              <option value="ads-a7.php?type=2" <? if($type==2){ echo "selected"; }?>>ผู้ลงโฆษณาทั่วไป</option>
                            </select>
                          </td>
                        </tr>
                      </table>
                      <? if($type==1){ ?>
                      <? if($r[3]!=""){ ?>
                      <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td></td>
                        </tr>
                      </table>
                      <table width="729" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center"><?=$r[3];?></td>
                        </tr>
                      </table>
                      <? } ?>
                      <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td></td>
                        </tr>
                      </table>
                      <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><table width="660" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="150" align="right"><font color="#000000" size="2">โค๊ด Google Adsense </font></td>
                                <td width="10">&nbsp;</td>
                                <td width="500"><input type="hidden" name="type_id" id="type_id" value="1" />
                                    <input type="hidden" name="op" id="op" value="<?=$r[9];?>" /></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td><textarea name="adsense" rows="10" id="adsense" style="width: 630px;"><?=$r[3];?></textarea></td>
                        </tr>
                        <tr>
                          <td align="center"><input type="submit" name="Submit2" value="บันทึกข้อมูล" /></td>
                        </tr>
                      </table>
                      <? }else if($type==2){ ?>
                      <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td></td>
                        </tr>
                      </table>
                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center"><? if($r[2]==1){ ?>
                              <img src="../ads-img/<?=$r[9];?>" width="728" height="90" />
                              <? }else if($r[2]==2){ ?>
                              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" height="90">
                                <param name="movie" value="../ads-img/<?=$r[9];?>" />
                                <param name="quality" value="high" />
                                <embed src="../ads-img/<?=$r[9];?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="728" height="90"></embed>
                              </object>
                              <? } ?></td>
                        </tr>
                      </table>
                      <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td></td>
                        </tr>
                      </table>
                      <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">เลือกประเภท</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="type_ads" type="radio" value="1" <? if($r[2]==1){ echo "checked";} ?>/>
                              <font color="#000000" size="2">รูปภาพ
                                <input name="type_ads" type="radio" value="2" <? if($r[2]==2){ echo "checked";} ?> />
                                แฟลช </font>
                              <input type="hidden" name="op" id="op" value="<?=$r[9];?>" />
                              <input type="hidden" name="type_id" id="type_id" value="2" /></td>
                        </tr>
                        <tr>
                          <td align="right"><font color="#000000" size="2">ไฟล์โฆษณา</font></td>
                          <td>&nbsp;</td>
                          <td align="left"><input name="file1" type="file" id="file1" /></td>
                        </tr>
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">คำอธิบาย</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="keyword" type="text" id="keyword" value="<?=$r[8];?>" /></td>
                        </tr>
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">ลิงค์</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="url" type="text" id="url" value="<?=$r[7];?>" size="50" />
                              <br />
                              <font size="2" color="#FF0000">ใส่ http:// ด้วย เช่น http://www.domain.com </font></td>
                        </tr>
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">วันที่</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="start_date" type="text" id="start_date" value="<?=$r[10];?>" />
                              <font color="#000000" size="2">ถึง
                                <input name="finish_date" type="text" id="finish_date" value="<?=$r[11];?>" />
                            </font></td>
                        </tr>
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">ชื่อลูกค้า</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="name" type="text" id="name" value="<?=$r[4];?>" /></td>
                        </tr>
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">เบอร์โทรศัพท์</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="tel" type="text" id="tel" value="<?=$r[5];?>" /></td>
                        </tr>
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">อีเมล์</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="email" type="text" id="email" value="<?=$r[6];?>" /></td>
                        </tr>
                        <tr>
                          <td width="150" align="right">&nbsp;</td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="Submit" type="submit" id="Submit" value="บันทึกข้อมูล" /></td>
                        </tr>
                      </table>
                      <? } ?>
                    </form></td>
                  </tr>
                </table></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#666666"><strong><font size="2" color="#ffffff">Copyright 2012 &copy; Asianfocus  </font></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>