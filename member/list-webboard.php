<?
@session_start();
include "../inc/config.inc.php";
include "../function/datethai.php";
include "../function/datetime.php";
include "../function/function.php";
if(!isset($_SESSION[member_login])) {
echo "<meta http-equiv='refresh' content='0;url=../index.php'>" ; 
exit() ;
}
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
<title>ระบบจัดการข้อมูลสมาชิก | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[12];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> ระบบจัดการข้อมูลสมาชิก <?=$titler[11];?>">
<meta name="robots"  content="index,nofollow">
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
	border: 1px solid #6ec01b;
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
	border: 1px solid #6ec01b;
	background-color: #6ec01b;
	color: #000000;
	text-decoration: underline;
	}
	a.current {
	border: 1px solid #6ec01b;
	font: bold .7em Arial,Helvetica,sans-serif;
	padding: 2px 6px 2px 6px;
	cursor: default;
	background:#6ec01b;
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
            <td width="200" align="center" valign="top"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><? include "../menu-left.php"; ?></td>
                </tr>
                <tr>
                  <td><? include "../menu-ads-a6.php"; ?></td>
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
                        <td align="left"><span style="font-size:15px; font-weight:bold; color:#333333;">ข้อมูลกระทู้</span></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                    <table width="750" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999">
                      <tr>
                        <td width="470" height="30" align="center" bgcolor="#CCCCCC"><font size="2"><strong>หัวข้อ</strong></font></td>
                        <td width="130" height="30" align="center" bgcolor="#CCCCCC"><font size="2"><strong>เมื่อ</strong></font></td>
                        <td width="75" height="30" align="center" bgcolor="#CCCCCC"><font size="2"><strong>อ่าน</strong></font></td>
                        <td width="75" height="30" align="center" bgcolor="#CCCCCC"><font size="2"><strong>ตอบ</strong></font></td>
                      </tr>
                      <?
$strSQL="SELECT webboard.id, webboard.title, webboard.date, webboard.view, member.name, webboard.upd_date, webboard.status, ";
$strSQL.="webboard.cate_id, webboard.member_id FROM `webboard` ";
$strSQL.="INNER JOIN member ON webboard.member_id=member.id ";
$strSQL.="WHERE webboard.member_id=$_SESSION[m_id] ";
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
                      <tr>
                        <td width="470" height="45" bgcolor="#FFFFFF"><table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="20" align="left"><table width="460" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="30" align="center"><?
$strWB2="SELECT member.name, ans_webboard.date FROM `ans_webboard` ";
$strWB2.="INNER JOIN member ON ans_webboard.member_id=member.id ";
$strWB2.="WHERE ans_webboard.topic_id='$objResult[0]' ORDER BY ans_webboard.id DESC ";
$WBQuery2=mysql_query($strWB2) or die("ERROR บรรทัด 531");
$WBResult2=mysql_fetch_row($WBQuery2);
$NumWB2=mysql_num_rows($WBQuery2);
if($NumWB2<=0){
?>
                                        <img src="http://<?=$titler[13];?>/webboard/img/boardans.gif" width="16" height="11" />
                                        <? }else{ ?>
                                        <img src="http://<?=$titler[13];?>/webboard/img/boardunans.gif" width="16" height="11" />
                                        <? } ?></td>
                                    <td width="430" align="left"><font size="2"><a href="http://<?=$titler[13];?>/board/<?=$objResult[0];?>/<?=$objResult[7];?>/<?=$url;?>.html" title="<?=$objResult[1];?>" target="_blank">
                                      <?=$objResult[1];?>
                                      </a> <img src="http://<?=$titler[13];?>/webboard/img/Logout.gif" width="16" height="16" />
                                      <?=$objResult[4];?>
                                      <?
$today=date("Y-n-j H:i:s");
$yesterday=date("Y-m-d H:i:s",strtotime("- 1 day"));
//echo $objResult[5];
if($objResult[5]>=$yesterday){
//echo "yes";
	if($objResult[6]==1){
?>
                                      <img src="http://<?=$titler[13];?>/webboard/img/new_icon.gif" width="21" height="9" />
                                      <?
	}else if($objResult[6]==2){
?>
                                      <img src="http://<?=$titler[13];?>/webboard/img/icon_update.gif" width="42" height="12" />
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
                              <td height="20" align="left"><table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="10" align="left"><img src="http://<?=$titler[13];?>/webboard/img/arrow.gif" width="11" height="8" /></td>
                                    <td width="390" align="left"><font size="1">ตอบล่าสุดโดย
                                      <? if($NumWB2<=0){ echo "ยังไม่มีผู้ตอบ"; }else{ echo $WBResult2[0];?>
                                      เมื่อ
                                      <? $replyDate = $WBResult2[1];
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
								$postDate = $objResult[2];
								echo DateTime($postDate);
								?>
                        </font></td>
                        <td width="75" height="40" align="center" bgcolor="#FFFFFF"><font size="2">
                          <?=$objResult[3];?>
                        </font></td>
                        <td width="75" height="40" align="center" bgcolor="#FFFFFF"><font size="2">
                          <?=$NumWB2;?>
                        </font></td>
                      </tr>
                      <? } ?>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
                    <table width="640" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="30" align="center" valign="middle"><? 
$pages = new Paginator;
$pages->items_total = $Num_Rows;
$pages->mid_range = 10;
$pages->current_page = $Page;
$pages->default_ipp = $Per_Page;
$pages->url_next = $_SERVER["PHP_SELF"]."?QueryString=value&Page=";

$pages->paginate();

echo $pages->display_pages()
?></td>
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
  <tr>
    <td height="50"><? include "../footer.php"; ?></td>
  </tr>
</table>
</body>
</html>
