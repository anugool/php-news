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
<? 
class Paginator{
	var $items_per_page;
	var $items_total;
	var $current_page;
	var $num_pages;
	var $mid_range;
	var $low;
	var $high;
	var $limit;
	var $return;
	var $default_ipp;
	var $querystring;
	var $url_next;

	function Paginator()
	{
		$this->current_page = 1;
		$this->mid_range = 7;
		$this->items_per_page = $this->default_ipp;
		$this->url_next = $this->url_next;
	}
	function paginate()
	{

		if(!is_numeric($this->items_per_page) OR $this->items_per_page <= 0) $this->items_per_page = $this->default_ipp;
		$this->num_pages = ceil($this->items_total/$this->items_per_page);

		if($this->current_page < 1 Or !is_numeric($this->current_page)) $this->current_page = 1;
		if($this->current_page > $this->num_pages) $this->current_page = $this->num_pages;
		$prev_page = $this->current_page-1;
		$next_page = $this->current_page+1;


		if($this->num_pages > 10)
		{
			$this->return .= (($this->current_page != 1 And $this->items_total >= 10)) ? "<a class=\"paginate\" href=\"".$this->url_next.$prev_page."\">&laquo; ก่อนหน้า</a>\n":"<span class=\"inactive\" href=\"#\">&laquo; ก่อนหน้า</span>\n";

			$this->start_range = $this->current_page - floor($this->mid_range/2);
			$this->end_range = $this->current_page + floor($this->mid_range/2);

			if($this->start_range <= 0)
			{
				$this->end_range += abs($this->start_range)+1;
				$this->start_range = 1;
			}
			if($this->end_range > $this->num_pages)
			{
				$this->start_range -= $this->end_range-$this->num_pages;
				$this->end_range = $this->num_pages;
			}
			$this->range = range($this->start_range,$this->end_range);

			for($i=1;$i<=$this->num_pages;$i++)
			{
				if($this->range[0] > 2 And $i == $this->range[0]) $this->return .= " ... ";
				if($i==1 Or $i==$this->num_pages Or in_array($i,$this->range))
				{
					$this->return .= ($i == $this->current_page And $_GET['Page'] != 'All') ? "<a title=\"หน้า $i จาก $this->num_pages\" class=\"current\" href=\"#\">$i</a> ":"<a class=\"paginate\" title=\"ไปที่หน้า $i จาก $this->num_pages\" href=\"".$this->url_next.$i."\">$i</a> ";
				}
				if($this->range[$this->mid_range-1] < $this->num_pages-1 And $i == $this->range[$this->mid_range-1]) $this->return .= " ... ";
			}
			$this->return .= (($this->current_page != $this->num_pages And $this->items_total >= 10) And ($_GET['Page'] != 'All')) ? "<a class=\"paginate\" href=\"".$this->url_next.$next_page."\">ถัดไป &raquo;</a>\n":"<span class=\"inactive\" href=\"#\">ถัดไป &raquo;</span>\n";
		}
		else
		{
			for($i=1;$i<=$this->num_pages;$i++)
			{
				$this->return .= ($i == $this->current_page) ? "<a class=\"current\" href=\"#\">$i</a> ":"<a class=\"paginate\" href=\"".$this->url_next.$i."\">$i</a> ";
			}
		}
		$this->low = ($this->current_page-1) * $this->items_per_page;
		$this->high = ($_GET['ipp'] == 'All') ? $this->items_total:($this->current_page * $this->items_per_page)-1;
		$this->limit = ($_GET['ipp'] == 'All') ? "":" LIMIT $this->low,$this->items_per_page";
	}

	function display_pages()
	{
		return $this->return;
	}
} 
?>
<style type="text/css"> 
<!--
	.paginate {
	font-family: Arial, Helvetica, sans-serif;
	font-size: .7em;
	}
	a.paginate {
	border: 1px solid #cccccc;
	background-color: #FFFFFF;
	padding: 2px 6px 2px 6px;
	text-decoration: none;
	color: #000000;
	}
	h2 {
		font-size: 12pt;
		color: #003366;
		}
		
		 h2 {
		line-height: 1.2em;
		letter-spacing:-1px;
		margin: 0;
		padding: 0;
		text-align: left;
		}
	a.paginate:hover {
	border: 1px solid #cccccc;
	background-color: #cccccc;
	color: #000000;
	text-decoration: underline;
	}
	a.current {
	border: 1px solid #cccccc;
	font: bold .7em Arial,Helvetica,sans-serif;
	padding: 2px 6px 2px 6px;
	cursor: default;
	background:#cccccc;
	color: #000000;
	text-decoration: none;
	}
	span.inactive {
	border: 1px solid #999;
	font-family: Arial, Helvetica, sans-serif;
	font-size: .7em;
	padding: 2px 6px 2px 6px;
	color: #999;
	cursor: default;
	}
-->
</style>
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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> จัดการข้อมูลประกาศหาเพื่อนยังไม่ได้ยืนยัน</font></strong></td>
                  </tr>
                  <tr>
                    <td><?
$sql="SELECT post_friend.*, post_friend_option.*, province.PROVINCE_NAME, talk_with.talk_with, talk_topic.talk_topic FROM post_friend ";
$sql.="INNER JOIN post_friend_option ON post_friend.id=post_friend_option.post_id ";
$sql.="INNER JOIN province ON post_friend.province_id=province.PROVINCE_ID ";
$sql.="INNER JOIN talk_with ON post_friend.talk_with=talk_with.id ";
$sql.="INNER JOIN talk_topic ON post_friend.talk_topic=talk_topic.id ";
$sql.="WHERE post_friend.active=1 ";
$result=mysql_query($sql) or die("ERROR บรรทัด 111");
$Num_Rows = mysql_num_rows($result);

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

		$sql .=" ORDER BY post_friend.id DESC LIMIT $Page_Start , $Per_Page";
		$result  = mysql_query($sql);
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
                      <? } ?>
                      <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td></td>
                        </tr>
                      </table>
                      <table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center"><font size="2" color="#000000">รายการข้อมูลรายการประกาศที่ยังไม่ได้ยืนยัน ทั้งหมด
                            <?=$Num_Rows;?>
                            รายการ : แสดงผลหน้าละ
                            <?=$Per_Page;?>
                            รายการ จำนวนทั้งหมด
                            <?=$Num_Pages;?>
                            หน้า</font></td>
                        </tr>
                        <tr>
                          <td height="30" align="center" valign="middle"><? 
$pages = new Paginator;
$pages->items_total = $Num_Rows;
$pages->mid_range = 10;
$pages->current_page = $Page;
$pages->default_ipp = $Per_Page;
$pages->url_next = $_SERVER["PHP_SELF"]."?QueryString=value&id=$id&Page=";

$pages->paginate();

echo $pages->display_pages()
?></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#666666"><strong><font size="2" color="#ffffff">Copyright 2012 &copy; Asianfocus </font></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
