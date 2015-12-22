<? 
@session_start(); 
include "../inc/config.inc.php";
include "../function/datetime.php";
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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> จัดการข้อมูลรายการแจ้งลบประกาศหาเพื่อน</font></strong></td>
                  </tr>
                  <tr>
                    <td><?
$s="SELECT * FROM `contact_del_friend`";
$re=mysql_query($s) or die("ERROR $s");
while($r=mysql_fetch_row($re)){
$sql="SELECT post_friend.*, post_friend_option.*, province.PROVINCE_NAME, talk_with.talk_with, talk_topic.talk_topic FROM post_friend ";
$sql.="INNER JOIN post_friend_option ON post_friend.id=post_friend_option.post_id ";
$sql.="INNER JOIN province ON post_friend.province_id=province.PROVINCE_ID ";
$sql.="INNER JOIN talk_with ON post_friend.talk_with=talk_with.id ";
$sql.="INNER JOIN talk_topic ON post_friend.talk_topic=talk_topic.id ";
$sql.="WHERE post_friend.active=1 AND post_friend.id='$r[1]' ORDER BY post_friend.id DESC LIMIT 0,100 ";
$result=mysql_query($sql) or die("ERROR บรรทัด 111");
while($row= mysql_fetch_row($result)){
?>
                      <table width="675" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
                        <tr>
                          <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="5"></td>
                              </tr>
                            </table>
                              <table width="665" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td height="25" bgcolor="#CCCCCC"><table width="655" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="left" bgcolor="#CCCCCC"><strong><font size="2" color="#FF0000">แจ้งเมื่อ
                                          <?
							$sendDate = $r[5];
							echo DateTime($sendDate);
							?>
                                          เหตุผล <? echo "$r[3] $r[4]"; ?></font></strong></td>
                                      </tr>
                                  </table></td>
                                </tr>
                              </table>
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td height="5"></td>
                                </tr>
                              </table>
                            <table width="665" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="105" align="left" valign="top"><table width="100" border="0" align="left" cellpadding="0" cellspacing="2" bgcolor="#99BD46">
                                    <tr>
                                      <td align="center" bgcolor="#FFFFFF"><? if($row[8]!=""){ ?>
                                          <img src="../friend/show-img/<?=$row[8];?>" width="100" height="100" />
                                          <? 
						}else{
							if($row[2]==1){ 
						?>
                                          <img src="../friend/show-img/img-boy.png" width="100" height="100" />
                                          <? }else if($row[2]==2){ ?>
                                          <img src="../friend/show-img/img-girl.png" width="100" height="100" />
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
                                                <img src="../friend/img/webcam.png" width="28" height="28" />
                                                <? }else{ ?>
                                                <img src="../friend/img/msn.png" width="28" height="28" />
                                                <? } ?></td>
                                            <td width="324" height="28" align="left"><font size="4"><strong><a href="msnim:add?contact=<?=$row[1];?>" style="color:#3F681F" title="add : <?=$row[1];?>">
                                              <?=$row[1];?>
                                            </a></strong></font></td>
                                            <td width="188" height="28" align="right"><table width="188" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td width="28" align="center"><? if($row[17]==1){ ?>
                                                      <img src="../friend/img/icon_fb_g.jpg" width="28" height="28" />
                                                      <? }else if($row[17]==2){ ?>
                                                      <a href="<?=$row[18];?>" title="<?=$row[18];?>" target="_blank"> <img src="../friend/img/icon_fb.jpg" width="28" height="28" border="0" /> </a>
                                                      <? } ?>
                                                  </td>
                                                  <td width="38" align="center"><? if($row[19]==1){ ?>
                                                      <img src="../friend/img/icon_hi5_g.jpg" width="28" height="28" />
                                                      <? }else if($row[19]==2){ ?>
                                                      <a href="<?=$row[20];?>" title="<?=$row[20];?>" target="_blank"> <img src="../friend/img/icon_hi5.jpg" width="28" height="28" border="0" /> </a>
                                                      <? } ?>
                                                  </td>
                                                  <td width="38" align="center"><? if($row[21]==1){ ?>
                                                      <img src="../friend/img/icon_tw_g.jpg" width="28" height="28" />
                                                      <? }else if($row[21]==2){ ?>
                                                      <a href="<?=$row[22];?>" title="<?=$row[22];?>" target="_blank"> <img src="../friend/img/icon_tw.jpg" width="28" height="28" border="0" /> </a>
                                                      <? } ?>
                                                  </td>
                                                  <td width="84" align="center"><? if($row[23]==1){ ?>
                                                      <img src="../friend/img/icon_bb_g.gif" width="84" height="25" />
                                                      <? }else if($row[23]==2){ ?>
                                                      <table width="84" border="0" align="center" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <td height="25" background="../friend/img/icon_bb.gif"><table width="58" border="0" align="right" cellpadding="0" cellspacing="0">
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
                                            <td width="280" height="25" align="left" valign="bottom"><font size="3" color="#666666"><strong><img src="../friend/img/userinfo.gif" width="16" height="16" />
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
                                              <?=$row[6];?>
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
                                            <td width="250" align="right"><font size="2" color="#999999">[ <a href="del-post.php?post_id=<?=$row[0];?>&amp;type=2" style="color:#999999" title="ลบ" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}">ลบ</a> | <a href="del-post-blogmail.php?post_id=<?=$row[0];?>&amp;email=<?=$row[1];?>" style="color:#999999" title="ลบและBlog Email" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}">ลบและBlog Email</a> | <a href="del-post-banip.php?post_id=<?=$row[0];?>&amp;ip=<?=$row[10];?>" style="color:#999999" title="ลบและแบนไอพี" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}">ลบและแบนไอพี</a> ] </font></td>
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
                      </table>
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="5"></td>
                        </tr>
                      </table>
                      <? }} ?></td>
                  </tr>
                </table></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#666666"><strong><font size="2" color="#ffffff">Copyright 2012 &copy; ScritpWeb2U </font></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
