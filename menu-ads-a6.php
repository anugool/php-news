<?
$sads6="SELECT * FROM `ads_a6`";
$reads6=mysql_query($sads6) or die("Error $sads6");
while($rads6=mysql_fetch_row($reads6)){
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="5"></td>
  </tr>
</table>
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="130" height="130" align="center" valign="middle"><? 
			  if($rads6[1]==1){ 
			  echo $rads6[3];
			  }else if($rads6[1]==2){ ?>
        <a href="<?=$rads6[7];?>" title="<?=$rads6[8];?>">
        <? if($rads6[2]==1){  ?>
        <img src="http://<?=$titler[13];?>/ads-img/<?=$rads6[9];?>" width="200" height="200" border="0" title="<?=$rads6[8];?>" alt="<?=$rads6[8];?>" />
        <? }else if($rads6[2]==2){ ?>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="200" height="200" border="0">
          <param name="movie" value="http://<?=$titler[13];?>/ads-img/<?=$rads6[9];?>" />
          <param name="quality" value="high" />
          <embed src="http://<?=$titler[13];?>/ads-img/<?=$rads6[9];?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="200" height="200"></embed>
        </object>
        <? }} ?>
      </a></td>
  </tr>
</table>
<? } ?>
