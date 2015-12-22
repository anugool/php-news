<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
<?
		$sads5="SELECT * FROM `ads_a5`";
		$reads5=mysql_query($sads5) or die("Error $sads5");
		while($rads5=mysql_fetch_row($reads5)){
?>
  <tr>
    <td width="300" height="255" align="center" valign="top"><? 
			  if($rads5[1]==1){ 
			  echo $rads5[3];
			  }else if($rads5[1]==2){ ?>
        <a href="<?=$rads5[7];?>" title="<?=$rads5[8];?>">
        <? if($rads5[2]==1){  ?>
        <img src="http://<?=$titler[13];?>/ads-img/<?=$rads5[9];?>" width="300" height="250" border="0" title="<?=$rads5[8];?>" alt="<?=$rads5[8];?>" />
        <? }else if($rads5[2]==2){ ?>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="300" height="250" border="0">
          <param name="movie" value="http://<?=$titler[13];?>/ads-img/<?=$rads5[9];?>" />
          <param name="quality" value="high" />
          <embed src="http://<?=$titler[13];?>/ads-img/<?=$rads5[9];?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="300" height="250"></embed>
        </object>
        <? }} ?>
    </a></td>
  </tr>
<? } ?>
</table>
