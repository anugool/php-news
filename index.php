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
<meta name="google-site-verification" content="-4FvUV3mTN-IzQvHiVk43ZsrILhyP54S3ByOfC_AJC0"/>
<meta name="stats-in-th" content="eb2c" />
<title><?=$titler[10];?> | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[12];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> <?=$titler[11];?>">
<meta name="robots"  content="index,follow">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>  
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>  
<script type="text/javascript">  
$(function(){  
    // แทรกโค้ต jquery  
    // กำหนดแบบทั่วไป  
    $("#tabs").tabs();   
  
    // กำหนดแบบเลื่อนหัวข้อซ้าย ขวาได้  
    $("#tabs").tabs().find(".ui-tabs-nav").sortable({axis:'x'});  
      
    // กำหนดแบบให้ซ่อนรายละเอียด เมื่อคลิกที่หัวข้อแท็บซ้ำ  
    // $("#tabs").tabs({collapsible: true});  
  
     // กำหนดให้แสดงรายละเอียดเมื่อนำเมาท์มาอยู่เหนือหัวข้อแท็บ  
     //$("#tabs").tabs({event: 'mouseover'});  
});  
</script>
<style type="text/css">  
/* ปรับขนาดตัวอักษรของข้อความใน tabs  
สามารถปรับเปลี่ยน รายละเอียดอื่นๆ เพิ่มเติมเกี่ยวกับ tabs 
ในไฟล์ css/smoothness/jquery-ui-1.7.2.custom.css หัวข้อ tabs 
*/  
.ui-tabs{  
    font-family:tahoma;  
    font-size:12px;
	height:340px; 
}  
</style> 
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
            <td align="center">
<?
$sads3="SELECT * FROM `ads_a3`";
$reads3=mysql_query($sads3) or die("Error $sads3");
while($rads3=mysql_fetch_row($reads3)){
?>
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>
              <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="130" height="130" align="center" valign="middle"><? 
			  if($rads3[1]==1){ 
			  echo $rads3[3];
			  }else if($rads3[1]==2){ ?>
                      <a href="<?=$rads3[7];?>" title="<?=$rads3[8];?>">
                      <? if($rads3[2]==1){  ?>
                      <img src="ads-img/<?=$rads3[9];?>" width="200" height="200" border="0" title="<?=$rads3[8];?>" alt="<?=$rads3[8];?>" />
                      <? }else if($rads3[2]==2){ ?>
                      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="200" height="200" border="0">
                        <param name="movie" value="ads-img/<?=$rads3[9];?>" />
                        <param name="quality" value="high" />
                        <embed src="ads-img/<?=$rads3[9];?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="200" height="200"></embed>
                      </object>
                      <? }} ?>
                    </a></td>
                </tr>
              </table>
<? } ?></td>
          </tr>
        </table>          </td>
        <td width="770" align="center" valign="top"><table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="300" align="center" valign="top">
<?
$sads1="SELECT * FROM `ads_a1` WHERE id='1'";
$reads1=mysql_query($sads1) or die("Error $sads1");
$rads1=mysql_fetch_row($reads1);
if($rads1[1]==1){ 
echo $rads1[3];
}else if($rads1[1]==2){ 
?>
                  <a href="<?=$rads1[7];?>" title="<?=$rads1[8];?>">
                  <? if($rads1[2]==1){  ?>
                  <img src="ads-img/<?=$rads1[9];?>" width="300" height="250" border="0" title="<?=$rads1[8];?>" alt="<?=$rads1[8];?>" />
                  <? }else if($rads1[2]==2){ ?>
                  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="300" height="250" border="0">
                    <param name="movie" value="ads-img/<?=$rads1[9];?>" />
                    <param name="quality" value="high" />
                    <embed src="ads-img/<?=$rads1[9];?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="300" height="250"></embed>
                  </object>
                  <? } ?>
                  </a>
                  <? } ?></td>
                <td width="5" align="center" valign="top">&nbsp;</td>
                <td width="455" align="center" valign="top">
<?
$sgs="SELECT id, title, img FROM `post` where cate_id=8 ORDER BY id DESC LIMIT 0,8";
$regs=mysql_query($sgs) or die("Error $sgs");
echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
$intRows= 0;
while($rgs=mysql_fetch_row($regs))
{
$urlgs=rewrite($rgs[1]);
echo "<td width='225' align='center' valign='top'>"; 
$intRows++;
?>
                  <table width="225" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                      <td width="225" height="55" align="center" valign="top"><table width="225" border="0" align="left" cellpadding="0" cellspacing="1" bgcolor="#999999">
                        <tr>
                          <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="5"></td>
                              </tr>
                            </table>
                              <table width="215" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="45" align="center" valign="top">
								  <a href="p/<?=$rgs[0];?>/<?=$urlgs;?>.html" title="<?=$rgs[1];?>" style="color:#000000;" target="_blank">
								  <? if($rgs[2]==""){ ?>
								  <img src="post-s-img/NoPic.png" width="45" height="45" border="0" title="<?=$rgs[1];?>" alt="<?=$rgs[1];?>" />
								  <? }else{ ?>
								  <img src="post-s-img/<?=$rgs[2];?>" width="45" height="45" border="0" title="<?=$rgs[1];?>" alt="<?=$rgs[1];?>" />
								  <? } ?>
								  </a>
								  </td>
                                  <td width="5" valign="top">&nbsp;</td>
                                  <td width="165" align="left" valign="top"><table width="165" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="left"><font size="2"><strong><a href="p/<?=$rgs[0];?>/<?=$urlgs;?>.html" title="<?=$rgs[1];?>" style="color:#5a9018;" target="_blank"><?=$rgs[1];?></a></strong></font></td>
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
                      </table></td>
                    </tr>
                  </table>
                  <?
			echo"</td>";
			if(($intRows)%2==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
	?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="5"></td>
              </tr>
            </table>
              <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td>
				<div id="tabs">
                    <ul>
<?
$stab2="select cate_name from category where id between 12 and 18 order by id asc";
$retab2=mysql_query($stab2) or die("ERROR $stab2");
$x=1;
while($rtab2=mysql_fetch_row($retab2)){
?>
                      <li><a href="#tabs-<?=$x;?>"><strong><?=$rtab2[0];?></strong></a></li>
<? $x++; } ?>
                    </ul>
<?
$stab3="select id from category where id between 12 and 18 order by id asc";
$retab3=mysql_query($stab3) or die("ERROR $stab3");
$i=1;
while($rtab3=mysql_fetch_row($retab3)){
?>
                  <div id="tabs-<?=$i;?>">
                    <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="300" align="center" valign="top">
<?
$stab4="SELECT id, title, img FROM `post` where cate_id='$rtab3[0]' ORDER BY id DESC LIMIT 0,1";
$retab4=mysql_query($stab4) or die("ERROR $stab4");
$rtab4=mysql_fetch_row($retab4);
$ntab4=mysql_num_rows($retab4);
$urltab4=rewrite($rtab4[1]);
?>
						<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center">
							<a href="p/<?=$rtab4[0];?>/<?=$urltab4;?>.html" title="<?=$rtab4[1];?>" style="color:#5a9018;" target="_blank">
							<? if($rtab4[2]==""&&$ntab4>0){ ?>
							<img src="post-s-img/NoPic.png" width="250" border="0" title="<?=$rtab4[1];?>" alt="<?=$rtab4[1];?>" />
							<? }else if($rtab4[2]!=""&&$ntab4>0){ ?>
							<img src="post-s-img/<?=$rtab4[2];?>" width="300" border="0" title="<?=$rtab4[1];?>" alt="<?=$rtab4[1];?>" />
							<? } ?>
							</a>
							<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="5"></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="left"><font size="2"><strong><a href="p/<?=$rtab4[0];?>/<?=$urltab4;?>.html" title="<?=$rtab4[1];?>" target="_blank" style="color:#960105;"><?=$rtab4[1];?></a></strong></font></td>
                          </tr>
                          
                        </table>						
						</td>
                        <td width="10" align="center" valign="top">&nbsp;</td>
                        <td width="410" align="center" valign="top">
<?
$stab5="SELECT id, title, img FROM `post` where cate_id='$rtab3[0]' ORDER BY id DESC LIMIT 1,6";
$retab5=mysql_query($stab5) or die("Error $stab5");
echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
$intRows5=0;
while($rtab5=mysql_fetch_row($retab5))
{
$urltab5=rewrite($rtab5[1]);
echo "<td width='135' align='center' valign='top'>"; 
$intRows5++;
?>
                          <table width="135" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                              <td align="center" valign="top"><table width="125" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td align="center"><a href="p/<?=$rtab5[0];?>/<?=$urltab5;?>.html" title="<?=$rtab5[1];?>" style="color:#5a9018;" target="_blank">
                                    <? if($rtab5[2]==""){ ?>
                                    <img src="post-s-img/NoPic.png" width="125" border="0" title="<?=$rtab5[1];?>" alt="<?=$rtab5[1];?>" />
                                    <? }else{ ?>
                                    <img src="post-s-img/<?=$rtab5[2];?>" width="125" border="0" title="<?=$rtab5[1];?>" alt="<?=$rtab5[1];?>" />
                                    <? } ?>
                                  </a></td>
                                </tr>
                                <tr>
                                  <td align="center"><font size="2"><a href="p/<?=$rtab5[0];?>/<?=$urltab5;?>.html" title="<?=$rtab5[1];?>" style="color:#999999;" target="_blank"><?=$rtab5[1];?></a></font></td>
                                </tr>
                              </table>
                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="5"></td>
                                  </tr>
                                </table></td>
                          </tr>
                          </table>
                          <?
			echo"</td>";
			if(($intRows5)%3==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
	?></td>
                      </tr>
                    </table>
                  </div>
<? $i++; } ?>
                </div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="5"></td>
              </tr>
            </table>
              <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="455" align="center" valign="top"><table width="455" border="" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="30" valign="bottom" background="img/bg-news-hothit.png"><table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left"><strong><font size="2" color="#333333">บทนำ</font></strong></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="455" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999">
                      <tr>
                        <td align="center" bgcolor="#FFFFFF"><?
$shot="SELECT id, title, img FROM `post` where cate_id=11 ORDER BY id DESC LIMIT 0,8";
$rehot=mysql_query($shot) or die("Error $shot");
echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
$intRows2= 0;
while($rhot=mysql_fetch_row($rehot))
{
$urlhot=rewrite($rhot[1]);
echo "<td width='225' align='center' valign='top'>"; 
$intRows2++;
?>
                          <table width="223" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="225" height="55" align="center" valign="top"><table width="223" border="0" align="left" cellpadding="0" cellspacing="1" bgcolor="#999999">
                                  <tr>
                                    <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="5"></td>
                                        </tr>
                                      </table>
                                        <table width="215" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="45" align="center" valign="top"><a href="p/<?=$rhot[0];?>/<?=$urlhot;?>.html" title="<?=$rhot[1];?>" style="color:#5a9018;" target="_blank">
                                              <? if($rhot[2]==""){ ?>
                                              <img src="post-s-img/NoPic.png" width="45" height="45" border="0" title="<?=$rhot[1];?>" alt="<?=$rhot[1];?>" />
                                              <? }else{ ?>
                                              <img src="post-s-img/<?=$rhot[2];?>" width="45" height="45" border="0" title="<?=$rhot[1];?>" alt="<?=$rhot[1];?>" />
                                              <? } ?>
                                            </a> </td>
                                            <td width="5" valign="top">&nbsp;</td>
                                            <td width="165" align="left" valign="top"><table width="165" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td align="left"><font size="2"><strong><a href="p/<?=$rhot[0];?>/<?=$urlhot;?>.html" title="<?=$rhot[1];?>" style="color:#5a9018;" target="_blank">
                                                    <?=$rhot[1];?>
                                                  </a></strong></font></td>
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
                              </table></td>
                            </tr>
                          </table>
                          <?
			echo"</td>";
			if(($intRows2)%2==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
	?></td>
                      </tr>
                    </table>                      </td>
                  </tr>
                </table></td>
			<!-- hothit!-->
			
<td align="center"><?
$sads2="SELECT * FROM `ads_a2` WHERE id='1'";
$reads2=mysql_query($sads2) or die("Error $sads2");
$rads2=mysql_fetch_row($reads2);
if($rads2[1]==1){ 
echo $rads2[3];
}else if($rads2[1]==2){ 
?>
                      <a href="<?=$rads2[7];?>" title="<?=$rads2[8];?>">
                      <? if($rads2[2]==1){  ?>
                      <img src="ads-img/<?=$rads2[9];?>" width="300" height="250" border="0" title="<?=$rads2[8];?>" alt="<?=$rads2[8];?>" />
                      <? }else if($rads2[2]==2){ ?>
                      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="300" height="250" border="0">
                        <param name="movie" value="ads-img/<?=$rads2[9];?>" />
                        <param name="quality" value="high" />
                        <embed src="ads-img/<?=$rads2[9];?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="300" height="250"></embed>
                      </object>
                      <? } ?>
                      </a>
                      <? } ?></td>
                  </tr>
                </table>                  </td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
      <table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="665" align="center" valign="top"><table width="665" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="30" background="img/bg-title-clip-vdo.png"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left"><strong><font size="2" color="#333333">&nbsp;&nbsp;&nbsp;Video</font></strong></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="5"></td>
              </tr>
            </table>
              <?
$sclip="SELECT id, title, img FROM `post` where cate_id='7' ORDER BY id DESC LIMIT 0,15";
$reclip=mysql_query($sclip) or die("Error $sclip");
echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
$intRows6=0;
while($rclip=mysql_fetch_row($reclip))
{
$urlclip=rewrite($rclip[1]);
echo "<td width='128' align='center' valign='top'>"; 
$intRows6++;
?>
              <table width="128" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center" valign="top"><table width="125" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center"><a href="p/<?=$rclip[0];?>/<?=$urlclip;?>.html" title="<?=$rclip[1];?>" target="_blank">
                          <? if($rclip[2]==""){ ?>
                          <img src="post-s-img/NoPic.png" alt="<?=$rclip[1];?>" width="125" height="125" border="0" title="<?=$rclip[1];?>" />
                          <? }else{ ?>
                          <img src="post-s-img/<?=$rclip[2];?>" alt="<?=$rclip[1];?>" width="125" height="125" border="0" title="<?=$rclip[1];?>" />
                          <? } ?>
                        </a></td>
                      </tr>
                      <tr>
                        <td align="center"><font size="2"><a href="p/<?=$rclip[0];?>/<?=$urlclip;?>.html" title="<?=$rclip[1];?>" target="_blank">
                          <?=$rclip[1];?>
                        </a></font></td>
                      </tr>
                    </table>
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="5"></td>
                        </tr>
                    </table></td>
                </tr>
              </table>
              <?
			echo"</td>";
			if(($intRows6)%5==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
	?></td>
          </tr>
        </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="5"></td>
            </tr>
          </table>
			 <!-- ตาราง Picpost!-->
          <table width="665" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="30" background="img/bg-title-postpic.png"><table width="590" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left"><strong><font size="3" color="#333333">Picpost</font></strong></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="5"></td>
                  </tr>
                </table>
                  <?
$spic="SELECT id, title, img FROM `post` where cate_id='9' ORDER BY id DESC LIMIT 0,15";
$repic=mysql_query($spic) or die("Error $spic");
echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
$intRows7=0;
while($rpic=mysql_fetch_row($repic))
{
$urlpic=rewrite($rpic[1]);
echo "<td width='128' align='center' valign='top'>"; 
$intRows7++;
?>
                  <table width="128" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="center" valign="top"><table width="125" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center"><a href="p/<?=$rpic[0];?>/<?=$urlpic;?>.html" title="<?=$rpic[1];?>" target="_blank">
                              <? if($rpic[2]==""){ ?>
                              <img src="post-s-img/NoPic.png" alt="<?=$rpic[1];?>" width="125" height="125" border="0" title="<?=$rpic[1];?>" />
                              <? }else{ ?>
                              <img src="post-s-img/<?=$rpic[2];?>" alt="<?=$rpic[1];?>" width="125" height="125" border="0" title="<?=$rpic[1];?>" />
                              <? } ?>
                            </a></td>
                          </tr>
                          <tr>
                            <td align="center"><font size="2"><a href="p/<?=$rpic[0];?>/<?=$urlpic;?>.html" title="<?=$rpic[1];?>" target="_blank">
                              <?=$rpic[1];?>
                            </a></font></td>
                          </tr>
                        </table>
                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="5"></td>
                            </tr>
                        </table></td>
                    </tr>
                  </table>
                  <?
			echo"</td>";
			if(($intRows7)%5==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
	?></td>
            </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="5"></td>
            </tr>
          </table>
          <table width="665" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="30" background="img/bg-title-tv.png"><table width="590" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left"><strong><font size="2" color="#333333">Asian TV</font></strong></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td>
<?
$stv="SELECT id, title, img, short_detail, view FROM `post` where cate_id='4' ORDER BY id DESC LIMIT 0,6";
$retv=mysql_query($stv) or die("Error $stv");
while($rtv=mysql_fetch_row($retv)){
$urltv=rewrite($rtv[1]);
?>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="5"></td>
                  </tr>
                  </table>
                  <table width="665" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="100" align="center" valign="top"><a href="p/<?=$rtv[0];?>/<?=$urltv;?>.html" title="<?=$rtv[1];?>">
                        <? if($rtv[2]==""){ ?>
                        <img src="post-s-img/NoPic.png" alt="<?=$rtv[1];?>" width="100" height="100" border="0" title="<?=$rtv[1];?>" />
                        <? }else{ ?>
                        <img src="post-s-img/<?=$rtv[2];?>" alt="<?=$rtv[1];?>" width="100" height="100" border="0" title="<?=$rtv[1];?>" />
                        <? } ?>
                      </a></td>
                    <td width="5" valign="top">&nbsp;</td>
                    <td width="560" valign="top"><table width="560" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left"><strong><font size="2"><a href="p/<?=$rtv[0];?>/<?=$urltv;?>.html" title="<?=$rtv[1];?>" style="color:#407EFF;"><?=$rtv[1];?></a></font></strong></td>
                      </tr>
                      <tr>
                        <td align="left"><font size="2" color="#999999"><?=$rtv[3];?></font></td>
                      </tr>
                      <tr>
                        <td align="left"><font size="2" color="#960105">เข้าชม : <?=$rtv[4];?> ครั้ง</font></td>
                      </tr>
                      </table></td>
                  </tr>
                  </table>
                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5" style="border-bottom:1px dotted #999999;"></td>
                    </tr>
                  </table>
<? } ?></td>
            </tr>
          </table>          </td>
        <td width="5" align="center" valign="top">&nbsp;</td>
        <td width="300" align="center" valign="top"><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><?=$fbr[1];?></td>
          </tr>
        </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="5"></td>
            </tr>
          </table>
          <table width="300" border="1" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="30" background="img/bg-title-Article.png"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left"><strong><font size="3" color="#333333"></font></strong></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                <?
$sgame="SELECT id, title, img FROM `post` where cate_id='6' ORDER BY id DESC LIMIT 0,12";
$regame=mysql_query($sgame) or die("Error $sgame");
echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
$intRows10=0;
while($rgame=mysql_fetch_row($regame))
{
$urlgame=rewrite($rgame[1]);
echo "<td width='90' align='center' valign='top'>"; 
$intRows10++;
?>
                <table width="90" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="center" valign="top"><table width="80" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center"><a href="p/<?=$rgame[0];?>/<?=$urlgame;?>.html" title="<?=$rgame[1];?>" target="_blank">
                          <? if($rgame[2]==""){ ?>
                          <img src="post-s-img/NoPic.png" alt="<?=$rgame[1];?>" width="80" height="80" border="0" title="<?=$rgame[1];?>" />
                          <? }else{ ?>
                          <img src="post-s-img/<?=$rgame[2];?>" alt="<?=$rgame[1];?>" width="80" height="80" border="0" title="<?=$rgame[1];?>" />
                          <? } ?>
                        </a><a href="#" title="Games"></a></td>
                      </tr>
                      <tr>
                        <td align="center"><font size="2"><a href="p/<?=$rgame[0];?>/<?=$urlgame;?>.html" title="<?=$rgame[1];?>" target="_blank"><?=$rgame[1];?></a></font></td>
                      </tr>
                    </table>
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="5"></td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
                <?
			echo"</td>";
			if(($intRows10)%3==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
	?></td>
            </tr>
          </table>
		 
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="5"></td>
            </tr>
          </table>
          <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="30" background="img/bg-title-msn.png"><table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
	<!-- หาเพื่อน MSN !-->
                  <td align="left"><strong><font size="2" color="#FFFFFF"> </font></strong></td>
                </tr>
              </table></td>
            </tr>
			<a href="http://goo.gl/jYKPnN" title="รีวิวด่านชายแดน AEC">                                     
			 <img src="img/pic.png" width="300" height="250" border="0" title="รีวิวด่านชายแดน AEC" alt="รีวิวด่านชายแดน AEC"></a>
			 
			 <a href="http://goo.gl/FH7ZgG" title="รีวิวด่านชายแดน AEC">                                     
			 <img src="img/asianfoc_pic.jpg" width="300" height="250" border="0" title="รีวิวด่านชายแดน AEC" alt="รีวิวด่านชายแดน AEC"></a>
 
		
<?
$sfriend="SELECT post_friend.email, post_friend.sex, post_friend.age, post_friend.img, province.PROVINCE_NAME FROM post_friend ";
$sfriend.="INNER JOIN province ON post_friend.province_id=province.PROVINCE_ID ";
$sfriend.="WHERE post_friend.active=1 ORDER BY post_friend.id DESC LIMIT 0,10 ";
$refriend=mysql_query($sfriend) or die("ERROR $sfriend");
while($rfriend=mysql_fetch_row($refriend)){
?>
			  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>
                <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="50" align="center" valign="top"><table width="50" border="0" align="left" cellpadding="0" cellspacing="1" bgcolor="#99BD46">
                    <tr>
                      <td align="center" bgcolor="#FFFFFF"><? if($rfriend[3]!=""){ ?>
                        <img src="friend/show-img/<?=$rfriend[3];?>" width="50" height="50" />
                        <? 
						}else{
							if($rfriend[1]==1){ 
						?>
                        <img src="friend/show-img/img-boy.png" width="50" height="50" />
                        <? }else if($rfriend[1]==2){ ?>
                        <img src="friend/show-img/img-girl.png" width="50" height="50" />
                        <? }} ?></td>
                    </tr>
                  </table></td>
                  <td width="5" valign="top">&nbsp;</td>
                  <td width="245" align="left" valign="top"><table width="245" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="25" align="left"><font size="2"><strong><a href="msnim:add?<?=$rfriend[0];?>" style="color:#3F681F" title="add : <?=$rfriend[0];?>"><?=$rfriend[0];?></a></strong></font></td>
                    </tr>
                  </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="5" style="height: 5;margin: 0 0 10px 0;border-top: 1px solid #999999;"></td>
                      </tr>
                    </table>
                    <table width="245" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="20" align="left" valign="bottom"><font size="2" color="#666666"><img src="img/userinfo.gif" width="16" height="16" />
                              <? if($rfriend[1]==1){ echo "ชาย"; }else if($rfriend[1]==2){ echo "หญิง"; }?>
 
<? if($rfriend[2]=="ไม่ระบุ"){ echo "ไม่ระบุ"; }else{ echo "$rfriend[2] ปี"; }?>
 
<?=$rfriend[4];?>
                        </font></td>
                        </tr>
                    </table></td>
                </tr>
              </table>
<? $i++; } ?>			 </td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
  <!-- ตาราง Movie!-->
 <table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="30" background="img/bg-title-movie.png"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="left"><strong><font size="2" color="#333333">Asianfocus Live Tv</font></strong></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="center" bgcolor="#ffffff"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="5"></td>
            </tr>
          </table>
<?
$smv="SELECT id, title, img FROM `post` where cate_id='1' ORDER BY id DESC LIMIT 0,15";
$remv=mysql_query($smv) or die("Error $smv");
echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
$intRows8=0;
while($rmv=mysql_fetch_row($remv))
{
$urlmv=rewrite($rmv[1]);
echo "<td width='128' align='center' valign='top'>"; 
$intRows8++;
?>
            <table width="128" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center" valign="top"><table width="125" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#666666">
                  <tr>
                    <td align="center"><a href="p/<?=$rmv[0];?>/<?=$urlmv;?>.html" title="<?=$rmv[1];?>" target="_blank">
                      <? if($rmv[2]==""){ ?>
                      <img src="post-s-img/NoPic.png" alt="<?=$rmv[1];?>" width="125" height="125" border="0" title="<?=$rmv[1];?>" />
                      <? }else{ ?>
                      <img src="post-s-img/<?=$rmv[2];?>" alt="<?=$rmv[1];?>" width="125" height="125" border="0" title="<?=$rmv[1];?>" />
                      <? } ?>
                    </a></td>
                  </tr>
                  <tr>
                    <td align="center"> <font size="2"><a href="p/<?=$rmv[0];?>/<?=$urlmv;?>.html" title="<?=$rmv[1];?>" target="_blank">
					<?=$rmv[1];?>
					</a></font></td>
					       </tr>
                        </table>
                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="5"></td>
                            </tr>
                        </table></td>
                    </tr>
                  </table>
    
                        
          <?
			echo"</td>";
			if(($intRows8)%7==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
	?></td>
            </tr>
          </table>
  <tr>
    <td>
	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="5"></td>
        </tr>
      </table>
	  <table width="970" height="300" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #333333;border-top-right-radius:10px; border-top-left-radius:10px; border-bottom-right-radius:10px; border-bottom-left-radius:10px; -moz-border-radius-topright:10px; -moz-border-radius-topleft:10px; -moz-border-radius-bottomright:10px; -moz-border-radius-bottomleft:10px; -webkit-border-top-right-radius:10px; -webkit-border-top-left-radius:10px; -webkit-border-bottom-right-radius:10px; -webkit-border-bottom-left-radius:10px; background-image:url(img/bg-travel.png)">
      <tr>
        <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="5"></td>
          </tr>
        </table>
		  <!-- ตาราง Travel Talks!-->
          <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="30"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="30" height="30" align="center"><img src="icon-menu/Airport.png" width="30" height="30" /></td>
                <td width="5" height="30">&nbsp;</td>
                <td width="925" height="30"><strong><font size="2" color="#333333">Travel Talks</font></strong></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="5"></td>
              </tr>
            </table>
              <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="300" align="center" valign="top"><?
$stra="SELECT id, title, img FROM `post` where cate_id='10' ORDER BY id DESC LIMIT 0,1";
$retra=mysql_query($stra) or die("ERROR $stra");
$rtra=mysql_fetch_row($retra);
$urltra=rewrite($rtra[1]);
?>
                    <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center"><a href="p/<?=$rtra[0];?>/<?=$urltra;?>.html" title="<?=$rtra[1];?>" style="color:#5a9018;" target="_blank">
                          <? if($rtra[2]==""){ ?>
                          <img src="post-s-img/NoPic.png" width="300" border="0" title="<?=$rtra[1];?>" alt="<?=$rtra[1];?>" />
                          <? }else if($rtra[2]!=""){ ?>
                          <img src="post-s-img/<?=$rtra[2];?>" width="300" border="0" title="<?=$rtra[1];?>" alt="<?=$rtra[1];?>" />
                          <? } ?>
                          </a>
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="5"></td>
                              </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td align="left"><font size="2"><strong><a href="p/<?=$rtra[0];?>/<?=$urltra;?>.html" title="<?=$rtra[1];?>" target="_blank" style="color:#960105;">
                          <?=$rtra[1];?>
                        </a></strong></font></td>
                      </tr>
                    </table>
                    </td>
                <td width="5" valign="top">&nbsp;</td>
                <td width="655" valign="top"><table width="655" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#5a9018">
                  <tr>
	<!-- ใส่ BC !-->
                    <td align="center" valign="top" ><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
                      <?
$stra2="SELECT id, title, img FROM `post` where cate_id='10' ORDER BY id DESC LIMIT 1,12";
$retra2=mysql_query($stra2) or die("Error $stra2");
echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
$intRows9=0;
while($rtra2=mysql_fetch_row($retra2))
{
$urltra2=rewrite($rtra2[1]);
echo "<td width='215' align='center' valign='top'>"; 
$intRows9++;
?>
                      <table width="215" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" valign="top"><table width="210" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="50" align="center" valign="top"><table width="50" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#5a9018">
                                  <tr>
                                    <td bgcolor="#d4ff89"><a href="p/<?=$rtra2[0];?>/<?=$urltra2;?>.html" title="<?=$rtra2[1];?>" target="_blank">
                                      <? if($rtra2[2]==""){ ?>
                                      <img src="post-s-img/NoPic.png" alt="<?=$rtra2[1];?>" width="50" height="50" border="0" title="<?=$rtra2[1];?>" />
                                      <? }else{ ?>
                                      <img src="post-s-img/<?=$rtra2[2];?>" alt="<?=$rtra2[1];?>" width="50" height="50" border="0" title="<?=$rtra2[1];?>" />
                                      <? } ?>
                                    </a><a href="#" title="ท่องเที่ยว"></a></td>
                                  </tr>
                              </table></td>
                              <td width="5" valign="top">&nbsp;</td>
                              <td width="1500" align="left" valign="top"><strong><font size="2"><a href="p/<?=$rtra2[0];?>/<?=$urltra2;?>.html" title="<?=$rtra2[1];?>" style="color:#333333;" target="_blank"><?=$rtra2[1];?></a></font></strong></td>
                            </tr>
                          </table>
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="5"></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      <?
			echo"</td>";
			if(($intRows9)%3==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
	?></td>
                  </tr>
                </table></td>
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
    </table>	</td>
  </tr>
  <tr>
    <td><table  width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
      <table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" background="img/bg-title-webboard.png"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left"><strong><font size="2" color="#333333">กระทู้อัพเดทล่าสุด</font></strong></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="970" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999">
          <tr>
            <td width="690" height="30" align="center" bgcolor="#CCCCCC"><font size="2"><strong>หัวข้อ</strong></font></td>
            <td width="130" height="30" align="center" bgcolor="#CCCCCC"><font size="2"><strong>เมื่อ</strong></font></td>
            <td width="75" height="30" align="center" bgcolor="#CCCCCC"><font size="2"><strong>อ่าน</strong></font></td>
            <td width="75" height="30" align="center" bgcolor="#CCCCCC"><font size="2"><strong>ตอบ</strong></font></td>
          </tr>
          <?
$swb="SELECT webboard.id, webboard.title, webboard.date, webboard.view, member.name, webboard.upd_date, webboard.status, ";
$swb.="webboard.cate_id, webboard.member_id FROM `webboard` ";
$swb.="INNER JOIN member ON webboard.member_id=member.id ";
$swb.="ORDER BY webboard.upd_date DESC LIMIT 0,10";
$rewb=mysql_query($swb) or die("ERROR $swb");
while($rwb=mysql_fetch_row($rewb)){
$url=rewrite($rwb[1]);
?>
          <tr>
            <td width="690" height="45" bgcolor="#FFFFFF"><table width="680" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="20" align="left"><table width="680" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="30" align="center"><?
$strWB2="SELECT member.name, ans_webboard.date FROM `ans_webboard` ";
$strWB2.="INNER JOIN member ON ans_webboard.member_id=member.id ";
$strWB2.="WHERE ans_webboard.topic_id='$rwb[0]' ORDER BY ans_webboard.id DESC ";
$WBQuery2=mysql_query($strWB2) or die("ERROR $strWB2 บรรทัด 531");
$WBResult2=mysql_fetch_row($WBQuery2);
$NumWB2=mysql_num_rows($WBQuery2);
if($NumWB2<=0){
?>
                            <img src="webboard/img/boardans.gif" width="16" height="11" />
                            <? }else{ ?>
                            <img src="webboard/img/boardunans.gif" width="16" height="11" />
                            <? } ?></td>
                        <td width="650" align="left"><font size="2"><a href="http://<?=$titler[13];?>/board/<?=$rwb[0];?>/<?=$rwb[7];?>/<?=$url;?>.html" title="<?=$rwb[1];?>" target="_blank"><strong>
                          <?=$rwb[1];?>
                          </strong></a> <img src="webboard/img/Logout.gif" width="16" height="16" />
                          <?=$rwb[4];?>
                          <?
$today=date("Y-n-j H:i:s");
$yesterday=date("Y-m-d H:i:s",strtotime("- 1 day"));
//echo $objResult[5];
if($rwb[5]>=$yesterday){
//echo "yes";
	if($rwb[6]==1){
?>
                          <img src="webboard/img/new_icon.gif" width="21" height="9" />
                          <?
	}else if($rwb[6]==2){
?>
                          <img src="webboard/img/icon_update.gif" width="42" height="12" />
                          <?	
	}
}else{
//echo "no";
}
?>
                        </font></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="20" align="left"><table width="620" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="10" align="left"><img src="webboard/img/arrow.gif" width="11" height="8" /></td>
                        <td width="610" align="left"><?
$strWB="SELECT member.name, ans_webboard.date FROM `ans_webboard` ";
$strWB.="INNER JOIN member ON ans_webboard.member_id=member.id ";
$strWB.="WHERE ans_webboard.topic_id='$rwb[0]' ORDER BY ans_webboard.id DESC ";
$WBQuery=mysql_query($strWB) or die("ERROR บรรทัด 437");
$WBResult=mysql_fetch_row($WBQuery);
$NumWB = mysql_num_rows($WBQuery);
?>
                            <font size="1">ตอบล่าสุดโดย
                              <? if($NumWB<=0){ echo "ยังไม่มีผู้ตอบ"; }else{ echo $WBResult[0];?>
                              เมื่อ
                              <? $replyDate = $WBResult[1];
echo DateTime($replyDate);
}
?>
                          </font></td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
            <td width="130" height="40" align="center" bgcolor="#FFFFFF"><font size="2">
              <?
								$postDate = $rwb[2];
								echo DateTime($postDate);
								?>
            </font></td>
            <td width="75" height="40" align="center" bgcolor="#FFFFFF"><font size="2">
              <?=$rwb[3];?>
            </font></td>
            <td width="75" height="40" align="center" bgcolor="#FFFFFF"><font size="2">
              <?=$NumWB;?>
            </font></td>
          </tr>
          <? } ?>
          <?
$strSQL="SELECT webboard.id, webboard.title, webboard.date, webboard.view, member.name, webboard.upd_date, webboard.status, ";
$strSQL.="webboard.cate_id, webboard.member_id FROM `webboard` ";
$strSQL.="INNER JOIN member ON webboard.member_id=member.id ";
$strSQL.="WHERE webboard.sticky='0' ";
$objQuery=mysql_query($strSQL) or die("ERROR บรรทัด 344");
$Num_Rows = mysql_num_rows($objQuery);		
		$Per_Page = 20;   // Per Page

		$Page = $_GET["Page"];
		if(!$_GET["Page"])
		{
			$Page=1;
		}

		$Prev_Page = $Page-1;
		$Next_Page = $Page+1;

		$Page_Start = (($Per_Page*$Page)-$Per_Page);
		if($Num_Rows<=$Per_Page)
		{
			$Num_Pages =1;
		}
		else if(($Num_Rows % $Per_Page)==0)
		{
			$Num_Pages =($Num_Rows/$Per_Page) ;
		}
		else
		{
			$Num_Pages =($Num_Rows/$Per_Page)+1;
			$Num_Pages = (int)$Num_Pages;
		}

		$strSQL .=" ORDER BY webboard.upd_date DESC LIMIT $Page_Start , $Per_Page";
		$objQuery  = mysql_query($strSQL) or die("ERROR");
		while($objResult = mysql_fetch_row($objQuery))
		{
		$url=rewrite($objResult[1]);
?>
          <? } ?>
        </table></td>
      </tr>
    </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="5"></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td height="50"><? include "footer.php"; ?></td>
  </tr>
</table>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<!-- <td width="5" align="center" valign="top">&nbsp;</td>
                <td width="300" align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="8"></td>
                  </tr>
                </table>
                  <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999">
                     
							ข่าวhothit!
                      
                    </table>
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table></td>
                  </tr>-->