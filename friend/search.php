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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ค้นหาเพื่อน msn facebook twitter bb social network | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[12];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> ค้นหาเพื่อน msn facebook twitter bb social network <?=$titler[11];?>">
<meta name="robots"  content="index,follow">
<style type="text/css">
<!--
body {
	background-color: #<?=$bgr[1];?>;
	<? if($bgr[2]!=""){ ?>background-image: url(http://<?=$titler[13];?>/bg-img/<?=$bgr[2];?>);
	background-repeat: <?=$bgr[3];?>;
	<? } ?>
	margin-top: 0px;
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
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
      <table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="665" align="center" valign="top"><?
$zone=$_GET[zone];
if($zone==1){
$zone_name="ภาคเหนือ";
}else if($zone==2){
$zone_name="ภาคกลาง";
}else if($zone==3){
$zone_name="ภาคอีสาน";
}else if($zone==4){
$zone_name="ภาคตะวันตก";
}else if($zone==5){
$zone_name="ภาคตะวันออก";
}else if($zone==6){
$zone_name="ภาคใต้";
}
?>
              <table width="665" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="50" background="img/bg-msn-list.png"><table width="610" border="0" align="right" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="30" align="left"><font size="4" color="#333333"><strong>ผลการค้นหาเพื่อน Social Network  100 คนล่าสุด</strong></font></td>
                      </tr>
                      <tr>
                        <td height="20" align="left"><font size="2"><a href="index.php" title="เพื่อนทั่วประเทศ">เพื่อนทั่วประเทศ</a> | <a href="index.php?zone=1" title="ภาคเหนือ">ภาคเหนือ</a> | <a href="index.php?zone=2" title="ภาคกลาง">ภาคกลาง</a> | <a href="index.php?zone=3" title="ภาคอีสาน">ภาคอีสาน</a> | <a href="index.php?zone=4" title="ภาคตะวันตก">ภาคตะวันตก</a> | <a href="index.php?zone=5" title="ภาคตะวันออก">ภาคตะวันออก</a> | <a href="index.php?zone=6" title="ภาคใต้">ภาคใต้</a></font></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
                      <?
$sex=$_POST[sex];
$age_start=$_POST[age_start];
$age_finish=$_POST[age_finish];
$province=$_POST[province];
$talk_with=$_POST[talk_with];
$talk_topic=$_POST[talk_topic];
$fb=$_POST[fb];
$hi5=$_POST[hi5];
$tw=$_POST[tw];
$bb=$_POST[bb];

if($sex=="ไม่ระบุ"){ $ws=""; }else{ $ws="AND post_friend.sex='$sex' "; }
if($age_start=="ไม่ระบุ"&&$age_finish=="ไม่ระบุ"){ $wa=""; }
else if($age_start=="ไม่ระบุ"&&$age_finish!="ไม่ระบุ"){ $ws="AND post_friend.age<='$age_finish' "; }
else if($age_start!="ไม่ระบุ"&&$age_finish=="ไม่ระบุ"){ $ws="AND post_friend.age>='$age_start' "; }
else if($age_start!="ไม่ระบุ"&&$age_finish!="ไม่ระบุ"){ $ws="AND post_friend.age BETWEEN $age_start AND $age_finish "; }
if($province=="ทุกจังหวัด"){ $wp=""; }else{ $wp="AND post_friend.province_id='$province' "; }
if(isset($fb)){ $wfb="AND post_friend_option.fb='2' "; }else{ $wfb=""; }
if(isset($hi5)){ $whi5="AND post_friend_option.hi='2' "; }else{ $whi5=""; }
if(isset($tw)){ $wtw="AND post_friend_option.tw='2' "; }else{ $wtw=""; }
if(isset($bb)){ $wbb="AND post_friend_option.bb='2' "; }else{ $wbb=""; }

$sql="SELECT post_friend.*, post_friend_option.*, province.PROVINCE_NAME, talk_with.talk_with, talk_topic.talk_topic FROM post_friend ";
$sql.="INNER JOIN post_friend_option ON post_friend.id=post_friend_option.post_id ";
$sql.="INNER JOIN province ON post_friend.province_id=province.PROVINCE_ID ";
$sql.="INNER JOIN talk_with ON post_friend.talk_with=talk_with.id ";
$sql.="INNER JOIN talk_topic ON post_friend.talk_topic=talk_topic.id ";
$sql.="WHERE post_friend.active=1 AND post_friend.talk_with='$talk_with' AND post_friend.talk_topic='$talk_topic' $ws $wa $wp $wfb $whi5 $wtw $wbb ";
$sql.="ORDER BY post_friend.id DESC LIMIT 0,100 ";
$result=mysql_query($sql) or die("ERROR บรรทัด 111");
while($row= mysql_fetch_row($result)){
?>
                      <table width="665" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="105" align="left" valign="top"><table width="100" border="0" align="left" cellpadding="0" cellspacing="2" bgcolor="#99BD46">
                              <tr>
                                <td align="center" bgcolor="#FFFFFF"><? if($row[8]!=""){ ?>
                                    <img src="show-img/<?=$row[8];?>" width="100" height="100" />
                                    <? 
						}else{
							if($row[2]==1){ 
						?>
                                    <img src="show-img/img-boy.png" width="100" height="100" />
                                    <? }else if($row[2]==2){ ?>
                                    <img src="show-img/img-girl.png" width="100" height="100" />
                                    <? }} ?>
                                </td>
                              </tr>
                          </table></td>
                          <td width="10" valign="top">&nbsp;</td>
                          <td width="550" align="center" valign="top"><table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="33"><table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="38" height="28" align="left"><? if($row[3]==1){ ?>
                                        <img src="img/webcam.png" width="28" height="28" />
                                        <? }else{ ?>
                                        <img src="img/msn.png" width="28" height="28" />
                                        <? } ?></td>
                                    <td width="264" height="28" align="left"><font size="4"><strong><a href="msnim:add?contact=<?=$row[1];?>" style="color:#3F681F" title="add : <?=$row[1];?>">
                                      <?=$row[1];?>
                                    </a></strong></font></td>
                                    <td width="248" height="28" align="right"><table width="248" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="28" align="center"><? if($row[17]==1){ ?>
                                              <img src="img/icon_fb_g.jpg" width="28" height="28" />
                                              <? }else if($row[17]==2){ ?>
                                              <a href="<?=$row[18];?>" title="<?=$row[18];?>" target="_blank"> <img src="img/icon_fb.jpg" width="28" height="28" border="0" /> </a>
                                              <? } ?>
                                          </td>
                                          <td width="98" align="center"><? if($row[19]==1){ ?>
                                              <img src="img/icon-line-g.png" width="88" height="25" />
                                              <? }else if($row[19]==2){ ?>
                                              <table width="84" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td height="25" background="img/icon-line.png"><table width="80" border="0" align="right" cellpadding="0" cellspacing="0">
                                                      <tr>
                                                        <td height="22" align="left" valign="bottom"><font size="1" color="#FFFFFF">
                                                          <?=$row[20];?>
                                                        </font></td>
                                                      </tr>
                                                  </table></td>
                                                </tr>
                                              </table>
                                            <? } ?>
                                          </td>
                                          <td width="38" align="center"><? if($row[21]==1){ ?>
                                              <img src="img/icon_tw_g.jpg" width="28" height="28" />
                                              <? }else if($row[21]==2){ ?>
                                              <a href="<?=$row[22];?>" title="<?=$row[22];?>" target="_blank"> <img src="img/icon_tw.jpg" width="28" height="28" border="0" /> </a>
                                              <? } ?>
                                          </td>
                                          <td width="84" align="center"><? if($row[23]==1){ ?>
                                              <img src="img/icon_bb_g.gif" width="84" height="25" />
                                              <? }else if($row[23]==2){ ?>
                                              <table width="84" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td height="25" background="img/icon_bb.gif"><table width="58" border="0" align="right" cellpadding="0" cellspacing="0">
                                                      <tr>
                                                        <td height="22" align="left" valign="bottom"><font size="1" color="#FFFFFF">
                                                          <?=$row[24];?>
                                                        </font></td>
                                                      </tr>
                                                  </table></td>
                                                </tr>
                                              </table>
                                            <? } ?></td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td height="5" style="height: 5;margin: 0 0 10px 0;border-bottom: 1px solid #999999;"></td>
                                      </tr>
                                  </table></td>
                              </tr>
                              <tr>
                                <td height="25"><table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="280" height="25" align="left" valign="bottom"><font size="3" color="#666666"><strong><img src="img/userinfo.gif" width="16" height="16" />
                                              <? if($row[2]==1){ echo "ชาย"; }else if($row[2]==2){ echo "หญิง"; }?>
                                         
                                        <? if($row[7]=="ไม่ระบุ"){ echo "ไม่ระบุ"; }else{ echo "$row[7] ปี"; }?>
                                         
                                        <?=$row[25];?>
                                      </strong></font></td>
                                      <td width="270" height="25" align="right" valign="bottom"><font size="3" color="#999999"><strong>
                                        <?=$row[26];?>
                                        /
                                        <?=$row[27];?>
                                      </strong></font></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td height="25"><table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="left"><font size="2">
                                        <?
   $wordchange = ("<font color=red>***</font>") ; // ข้อความที่ต้องการแทนที่คำหยาบ
   $sbw = "select * from ban_word ";
   $dbquery = mysql_query($sbw);
   $num_rows = mysql_num_rows($dbquery);
   $msg=$row[6];
   
   $i=0;
   while ($i < $num_rows)
   {
   $obresult= mysql_fetch_array($dbquery);
   $msg= eregi_replace ("$obresult[word]" ,$wordchange ,$msg );
   $i++;
   }
   echo $msg ;
   ?>
                                      </font></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td height="25"><table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="300" align="left"><font size="2" color="#999999">วันที่
                                        <?
							$postDate = $row[11];
							echo DateTime($postDate);
							?>
                                        น. </font></td>
                                      <td width="250" align="right"><font size="2" color="#999999">
                                        <? if(isset($_SESSION[admin_login])){ ?>
                                        [ <a href="http://<?=$titler[13];?>/admin/del-post.php?post_id=<?=$row[0];?>&amp;type=4" style="color:#999999" title="ลบ" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}">ลบ</a> | <a href="http://<?=$titler[13];?>/admin/del-post-blogmail.php?post_id=<?=$row[0];?>&amp;email=<?=$row[1];?>" style="color:#999999" title="ลบและBlog Email" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}">ลบและBlog Email</a> | <a href="http://<?=$titler[13];?>/admin/del-post-banip.php?post_id=<?=$row[0];?>&amp;ip=<?=$row[10];?>" style="color:#999999" title="ลบและแบนไอพี" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}">ลบและแบนไอพี</a> ]
                                        <? }else{ ?>
                                        [ <a href="contact-del-post.php?post_id=<?=$row[0];?>&amp;email=<?=$row[1];?>" title="ลบ/แจ้งลบ" target="_blank" style="color:#999999">ลบ/แจ้งลบ</a> ]
                                        <? } ?>
                                      </font></td>
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
                      </table>
                    <? } ?>
                  </td>
                </tr>
            </table></td>
          <td width="5" align="center" valign="top">&nbsp;</td>
          <td width="300" align="center" valign="top"><? include "banner_right.php"; ?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="50"><? include "../footer.php"; ?></td>
  </tr>
</table>
</body>
</html>
