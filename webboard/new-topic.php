<?
@session_start();
include "../inc/config.inc.php";
include "../function/datethai.php";
include "../function/datetime.php";
include "../function/function.php";
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

$cate_id=$_GET[cate_id];
$rscate="SELECT cate_name FROM `webboard_category` WHERE id='$cate_id' ORDER BY id ASC";
$rrecate=mysql_query($rscate) or die("ERROR $rscate");
$rrcate=mysql_fetch_row($rrecate);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ตั้งคำถามใหม่ <? if(isset($_GET[cate_id])){ echo "หมวดหมู่ $rrcate[0]";} ?>  | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[12];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> ตั้งคำถามใหม่ <? if(isset($_GET[cate_id])){ echo "หมวดหมู่ $rrcate[0]";} ?>  <?=$titler[11];?>">
<meta name="robots"  content="index,follow">
<link href="jquery.cleditor.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="jquery.cleditor.min.js"></script>
<script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor({width:950, height:450, useCSS:true})[0].focus();
      });
</script>
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
          <td><table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="30" background="http://<?=$titler[13];?>/img/bg-title-category-970.png"><table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="left"><span style="font-size:15px; font-weight:bold; color:#333333;">ตั้งคำถามใหม่
                        <? if(isset($_GET[cate_id])){ echo "หมวดหมู่ $rrcate[0]";} ?>
                      </span></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                    <form id="form1" name="form1" method="post" action="p-new-topic.php" style="height:715px;" enctype="multipart/form-data">
                      <table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
                        <? if(!isset($_SESSION[m_id])){ ?>
                        <tr>
                          <td height="20" align="left"><strong><font size="2">ชื่อผู้ใช้</font></strong></td>
                        </tr>
                        <tr>
                          <td height="20" align="left"><input name="user" type="text" id="user" style="width:250px;" /></td>
                        </tr>
                        <tr>
                          <td height="20" align="left"><strong><font size="2">รหัสผ่าน</font></strong></td>
                        </tr>
                        <tr>
                          <td height="20" align="left"><input name="pass" type="password" id="pass" style="width:250px;" /></td>
                        </tr>
                        <? }else{ ?>
                        <input type="hidden" name="user" id="user" value="<?=$_SESSION[m_user];?>" />
                        <input type="hidden" name="pass" id="pass" value="<?=$_SESSION[m_pass];?>" />
                        <? } 
if(isset($cate_id)){ ?>
                        <input type="hidden" name="cate" id="cate" value="<?=$cate_id;?>" />
                        <? }else if(!isset($cate_id)){ ?>
                        <tr>
                          <td height="20" align="left"><strong><font size="2">เลือกหมวดหมู่</font></strong></td>
                        </tr>
                        <tr>
                          <td height="20" align="left"><select name="cate" id="cate" style="width:350px;">
                              <option value="">- กรุณาเลือกหมวดหมู่ -</option>
                              <?
		$scate="SELECT * FROM `webboard_category` ORDER BY id ASC";
		$recate=mysql_query($scate) or die("Error $scate");
		while($rcate=mysql_fetch_row($recate)){
		?>
                              <option value="<?=$rcate[0];?>">
                              <?=$rcate[1];?>
                              </option>
                              <? } ?>
                          </select></td>
                        </tr>
                        <? } ?>
                        <tr>
                          <td height="20" align="left"><strong><font size="2">หัวข้อ</font></strong></td>
                        </tr>
                        <tr>
                          <td height="20" align="left"><input name="title" type="text" id="title" style="width:950px;" /></td>
                        </tr>
                        <tr>
                          <td height="20" align="left"><strong><font size="2">รายละเอียด</font></strong></td>
                        </tr>
                        <tr>
                          <td><textarea class="cleditorMain" id="input" name="input" style="width:950px; height:450px;"></textarea></td>
                        </tr>
                        <tr>
                          <td height="20" align="left"><strong><font size="2">ไฟล์ภาพ
                            <input name="file1" type="file" id="file1" />
                          </font></strong><font size="2" color="#FF0000">* ขนาดภาพไม่เกิน 200kb </font></td>
                        </tr>
                        <tr>
                          <td height="20" align="left"><table width="640" border="0" cellspacing="0" cellpadding="0">
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
                                <td width="530"><input name="capcha" type="text" id="capcha" style="width:100px;" />
                                    <font size="2" color="#FF0000">* &lt;= กรอกรหัสยืนยัน</font>
                                    <input type="hidden" name="rands" id="rands" value="<?=$rand;?>" /></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="20" align="center"><span style="text-align:center">
                            <input type="submit" name="Submit" value="ตั้งคำถามใหม่" />
                          </span></td>
                        </tr>
                      </table>
                    </form></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="5"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="50"><? include "../footer.php"; ?></td>
  </tr>
</table>
</body>
</html>
