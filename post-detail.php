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

$topic_id=$_GET[topic_id];
$topic=$_GET[topic];
$spost="select post.*, tag_post.* from post ";
$spost.="inner join tag_post on post.id=tag_post.post_id ";
$spost.="where post.id='$topic_id'";
$repost=mysql_query($spost) or die("ERROR $spost");
$rpost=mysql_fetch_row($repost);

$new_view=$rpost[8]+1;
$upd_view=mysql_query("UPDATE post SET view='$new_view' WHERE id='$topic_id'") or die("ERROE $upd_view");

$scate="select id, cate_name from category where id='$rpost[1]'";
$recate=mysql_query($scate) or die("ERROR $scate");
$rcate=mysql_fetch_row($recate);
$url=rewrite($rcate[1]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$rpost[2];?></title>
<META NAME="keywords" CONTENT="<? if($rpost[11]!=""){ echo "$rpost[11], ";} if($rpost[12]!=""){ echo "$rpost[12], ";} if($rpost[13]!=""){ echo "$rpost[13], ";} if($rpost[14]!=""){ echo "$rpost[14], ";} if($rpost[15]!=""){ echo "$rpost[15], ";} if($rpost[16]!=""){ echo "$rpost[16], ";} ?>"> 
<META NAME="description" CONTENT="<?=$rpost[3];?>">
<meta name="robots"  content="index,follow">
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "6a4c57b8-2fce-4f33-b2d9-11b926a519b8"}); </script>
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
                  <td align="left"><span style="font-size:15px; font-weight:bold; color:#333333;">หมวด » <a href="http://<?=$titler[13];?>/cate/<?=$rcate[0];?>/<?=$url;?>.html" title="<?=$rtab[1];?>" style="color:#333333;"><?=$rcate[1];?></a></span></td>
                  </tr>
            </table></td>
          </tr>
          <tr>
            <td>
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>
              <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center">
                    <table width="750" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left"><h1 style="font-size:16px; font-weight:bold; color:#333333; border-bottom:1px solid #999999;"><?=$rpost[2];?></h1></td>
                      </tr>
                    </table>                    </td>
                </tr>
                <tr>
                  <td><?=$rpost[4];?></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="25"><font size="2"><strong>TAG : </strong>
<? 
if($rpost[11]!=""){ $tag1=rewrite($rpost[11]); echo "<a href='http://$titler[13]/search-tag.php?tag=$tag1' style='color:#000000'>$rpost[11]</a>, ";} 
if($rpost[12]!=""){ $tag2=rewrite($rpost[12]); echo "<a href='http://$titler[13]/search-tag.php?tag=$tag2' style='color:#000000'>$rpost[12]</a>, ";} 
if($rpost[13]!=""){ $tag3=rewrite($rpost[13]); echo "<a href='http://$titler[13]/search-tag.php?tag=$tag3' style='color:#000000'>$rpost[13]</a>, ";} 
if($rpost[14]!=""){ $tag4=rewrite($rpost[14]); echo "<a href='http://$titler[13]/search-tag.php?tag=$tag4' style='color:#000000'>$rpost[14]</a>, ";}  
if($rpost[15]!=""){ $tag5=rewrite($rpost[15]); echo "<a href='http://$titler[13]/search-tag.php?tag=$tag5' style='color:#000000'>$rpost[15]</a>, ";}  
if($rpost[16]!=""){ $tag6=rewrite($rpost[16]); echo "<a href='http://$titler[13]/search-tag.php?tag=$tag6' style='color:#000000'>$rpost[16]</a>, ";} 
?></font></td>
                </tr>
                <tr>
                  <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="375" align="left">
<span class='st_facebook_hcount' displayText='Facebook'></span>
<span class='st_twitter_hcount' displayText='Tweet'></span>
<span class='st_googleplus_hcount' displayText='Google +'></span>
					  </td>
                      <td width="375" align="right"><font size="2"><strong>เขียนเมื่อ : </strong>
                          <? $postDate=DateTime($rpost[7]); echo $postDate; ?>
                          <strong>เข้าชม :</strong> 
                          <?=$rpost[8];?>
                           
                          <strong>ครั้ง</strong>
                          <? if(isset($_SESSION[admin_login])){ ?>
                          <a href="http://<?=$titler[13];?>/admin/del-data-category.php?id=<?=$rpost[0];?>&cate_id=<?=$rpost[1];?>&op=<?=$rpost[5];?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"><img src="http://<?=$titler[13];?>/webboard/img/Delete.gif" width="16" height="16" border="0" />ลบ</a>
                          <? }else{ ?>
                          <a href="http://<?=$titler[13];?>/contact-del-post.php?topic_id=<?=$topic_id;?>" onclick="javascript:if(!confirm('ต้องการแจ้งลบข่าวสาร')){return false;}">แจ้งลบ</a>
                          <? } ?>
                      </font></td>
                    </tr>
                  </table>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5" style="border-bottom:1px dotted #999999;"></td>
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
            <td><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center"><?
$sads7="SELECT * FROM `ads_a7` WHERE id='1'";
$reads7=mysql_query($sads7) or die("Error $sads7");
$rads7=mysql_fetch_row($reads7);
if($rads7[1]==1){ 
echo $rads7[3];
}else if($rads7[1]==2){ 
?>
                  <a href="<?=$rads7[7];?>" title="<?=$rads7[8];?>">
                  <? if($rads7[2]==1){  ?>
                  <img src="http://<?=$titler[13];?>/ads-img/<?=$rads7[9];?>" width="728" height="90" border="0" title="<?=$rads7[8];?>" alt="<?=$rads7[8];?>" />
                  <? }else if($rads7[2]==2){ ?>
                  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" height="90" border="0">
                    <param name="movie" value="http://<?=$titler[13];?>/ads-img/<?=$rads7[9];?>" />
                    <param name="quality" value="high" />
                    <embed src="http://<?=$titler[13];?>/ads-img/<?=$rads7[9];?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="728" height="90"></embed>
                  </object>
                  <? } ?>
                  </a>
                  <? } ?></td>
              </tr>
            </table>
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td><table width="765" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="30" background="http://<?=$titler[13];?>/img/bg-title-category.png"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="left"><span style="font-size:15px; font-weight:bold; color:#333333;">เรื่องที่เกี่ยวข้อง</span></td>
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
$strSQL="SELECT id, title, img, short_detail, view FROM `post` WHERE cate_id='$rpost[1]' ORDER BY RAND() LIMIT 0, 4";
$objQuery = mysql_query($strSQL) or die("ERROR $strSQ1");
echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
$intRows= 0;
while($objResult = mysql_fetch_row($objQuery))
{
$url=rewrite($objResult[1]);
	echo "<td width='378' align='center' valign='top'>"; 
	$intRows++;
?>
                  <table width="378" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td valign="top"><table width="375" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                          <tr>
                            <td bgcolor="#FFFFFF"><table width="375" border="0" align="center" cellpadding="0" cellspacing="0"  onmouseover="this.style.backgroundColor='#DDDDDD';" onmouseout="this.style.backgroundColor='#FFFFFF';">
                                <tr>
                                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                      <table width="365" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="100" align="center" valign="top"><a href="http://<?=$titler[13];?>/p/<?=$objResult[0];?>/<?=$url;?>.html" title="<?=$objResult[1];?>">
                                            <? if($objResult[2]==""){ ?>
                                            <img src="http://<?=$titler[13];?>/post-s-img/NoPic.png" alt="<?=$objResult[1];?>" width="100" height="100" border="0" title="<?=$objResult[1];?>" />
                                            <? }else{ ?>
                                            <img src="http://<?=$titler[13];?>/post-s-img/<?=$objResult[2];?>" alt="<?=$objResult[1];?>" width="100" height="100" border="0" title="<?=$objResult[1];?>" />
                                            <? } ?>
                                          </a></td>
                                          <td width="5" align="center" valign="top">&nbsp;</td>
                                          <td width="260" align="center" valign="top"><table width="260" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td align="left"><strong><font size="2"><a href="http://<?=$titler[13];?>/p/<?=$objResult[0];?>/<?=$url;?>.html" title="<?=$objResult[1];?>" style="color:#407EFF;">
                                                  <?=$objResult[1];?>
                                                </a></font></strong></td>
                                              </tr>
                                              <tr>
                                                <td align="left"><font size="2" color="#999999">
                                                  <?=$objResult[3];?>
                                                </font></td>
                                              </tr>
                                              <tr>
                                                <td align="left"><font size="2" color="#960105">เข้าชม :
                                                  <?=$objResult[4];?>
                                                  ครั้ง</font></td>
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
            </table>
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table></td>
          </tr>
<? if($rpost[6]!=3){ ?>
          <tr>
            <td>
			<? if($rpost[6]==1){ ?>
			<table width="765" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-comments" data-href="http://<?=$titler[13];?>/p/<?=$topic_id;?>/<?=$topic;?>.html" data-num-posts="10" data-width="765"></div></td>
              </tr>
            </table>
			<? 
			}else if($rpost[6]==2){ 
				if(isset($_SESSION[member_login])){
			?>
			<table width="765" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><div id="fb-root"></div>
                    <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-comments" data-href="http://<?=$titler[13];?>/p/<?=$topic_id;?>/<?=$topic;?>.html" data-num-posts="10" data-width="765"></div></td>
              </tr>
            </table>
			<? }else{ ?>
			<table width="765" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#333333">
              <tr>
                <td height="30" align="center" bgcolor="#CCCCCC"><font size="2" color="#FF0000"><strong>กรุณาล็อกอินเข้าสู่ระบบก่อนถึงจะแสดงความคิดเห็นได้</strong></font></td>
              </tr>
            </table>
			<? }} ?>
			</td>
          </tr>
<? } ?>
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
