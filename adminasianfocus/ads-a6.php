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
                    <td height="25"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="375" align="left"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> จัดการข้อมูลโฆษณาตำแหน่ง A6 200 x 200 px</font></strong></td>
                          <td width="375" align="right"><strong><font color="#000000" size="2">[ <a href="add-ads-a6.php" style="color:#0000FF">เพิ่มตำแหน่งโฆษณา  A6</a> ]</font></strong></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">

                      <tr>
                        <td align="center"><?
			$strSQL1="SELECT * FROM ads_a6 ORDER BY id ASC";
			$objQuery1 = mysql_query($strSQL1) or die("ERROR $strSQL1");
			while($objResult1 = mysql_fetch_row($objQuery1)){
			?>
                            <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="210" align="left" valign="top"><? if($objResult1[1]==1){ 
				  echo $objResult1[3]; 
				  }else if($objResult1[1]==2){
				  if($objResult1[2]==1){
				  ?>
                                    <img src="../ads-img/<?=$objResult1[9];?>" width="200" height="200" border="0" />
                                    <? }else if($objResult1[1]==2){ ?>
                                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="200" height="200">
                                      <param name="movie" value="../ads-img/<?=$objResult1[9];?>" />
                                      <param name="quality" value="high" />
                                      <embed src="../ads-img/<?=$objResult1[9];?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="200" height="200"></embed>
                                    </object>
                                    <? }} ?>                                </td>
                                <td width="520" align="left" valign="top"><? if($objResult1[1]==1){?>
                                    <table width="520" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="left"><strong><font color="#000000" size="2">Google Adsense </font></strong></td>
                                      </tr>
                                      <tr>
                                        <td align="left"><textarea name="textarea" rows="10" style="width:520px;" disabled="disabled"><?=$objResult1[3];?></textarea></td>
                                      </tr>
                                      <tr>
                                        <td align="left"><strong><font size="2"><a href="edit-ads-a6.php?id=<?=$objResult1[0];?>"><img src="images/edit.gif" width="40" height="15" border="0" /></a> <a href="del-ads6.php?id=<?=$objResult1[0];?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"> <img src="images/del.gif" width="40" height="15" border="0" /></a></font></strong></td>
                                      </tr>
                                    </table>
                                  <? }else if($objResult1[1]==2){ ?>
                                    <table width="520" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td width="150" align="right"><font color="#000000" size="2">คำอธิบาย</font></td>
                                        <td width="10">&nbsp;</td>
                                        <td width="360" align="left"><input name="keyword" type="text" id="keyword" value="<?=$objResult1[8];?>" disabled="disabled" /></td>
                                      </tr>
                                      <tr>
                                        <td width="150" align="right"><font color="#000000" size="2">ลิงค์</font></td>
                                        <td width="10">&nbsp;</td>
                                        <td width="360" align="left"><input name="url" type="text" id="url" value="<?=$objResult1[7];?>" size="50" disabled="disabled" />
                                            <br />
                                            <font size="2" color="#FF0000">ใส่ http:// ด้วย เช่น http://www.domain.com </font></td>
                                      </tr>
                                      <tr>
                                        <td width="150" align="right"><font color="#000000" size="2">วันที่</font></td>
                                        <td width="10">&nbsp;</td>
                                        <td width="360" align="left"><input name="start_date" type="text" id="start_date" value="<?=$objResult1[10];?>" disabled="disabled" />
                                            <font color="#000000" size="2">ถึง
                                              <input name="finish_date" type="text" id="finish_date" value="<?=$objResult1[11];?>" disabled="disabled" />
                                          </font></td>
                                      </tr>
                                      <tr>
                                        <td width="150" align="right"><font color="#000000" size="2">ชื่อลูกค้า</font></td>
                                        <td width="10">&nbsp;</td>
                                        <td width="360" align="left"><input name="name" type="text" id="name" value="<?=$objResult1[4];?>" disabled="disabled" /></td>
                                      </tr>
                                      <tr>
                                        <td width="150" align="right"><font color="#000000" size="2">เบอร์โทรศัพท์</font></td>
                                        <td width="10">&nbsp;</td>
                                        <td width="360" align="left"><input name="tel" type="text" id="tel" value="<?=$objResult1[5];?>" disabled="disabled" /></td>
                                      </tr>
                                      <tr>
                                        <td width="150" align="right"><font color="#000000" size="2">อีเมล์</font></td>
                                        <td width="10">&nbsp;</td>
                                        <td width="360" align="left"><input name="email" type="text" id="email" value="<?=$objResult1[6];?>" disabled="disabled" /></td>
                                      </tr>
                                      <tr>
                                        <td width="150" align="right">&nbsp;</td>
                                        <td width="10">&nbsp;</td>
                                        <td width="360" align="left"><font size="2"><a href="edit-ads-a6.php?id=<?=$objResult1[0];?>"><img src="images/edit.gif" width="40" height="15" border="0" /></a> <a href="del-ads6.php?id=<?=$objResult1[0];?>&amp;op=<?=$objResult1[9];?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"> <img src="images/del.gif" width="40" height="15" border="0" /></a></font></td>
                                      </tr>
                                    </table>
                                  <? } ?>                                </td>
                              </tr>
                            </table>
                          <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td></td>
                              </tr>
                            </table>
                          <? } ?></td>
                      </tr>
                    </table></td>
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
