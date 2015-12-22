<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><img src="http://<?=$titler[13];?>/img/bg-menu-left.png" width="200" height="30" /></td>
  </tr>
<?
$stab="select id, cate_name, icon from category where id between 11 and 18 order by id asc";
$retab=mysql_query($stab) or die("ERROR $stab");
while($rtab=mysql_fetch_row($retab)){
$urltab=rewrite($rtab[1]);
?> 
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
        <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="20" height="20" align="left"><img src="http://<?=$titler[13];?>/icon-menu/<?=$rtab[2];?>" width="16" height="16" /></td>
            <td width="180" align="left"><font size="2"><a href="http://<?=$titler[13];?>/cate/<?=$rtab[0];?>/<?=$urltab;?>.html" title="<?=$rtab[1];?>"><?=$rtab[1];?></a></font></td>
          </tr>
        </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="5" style="border-bottom:1px dotted #999999;"></td>
          </tr>
      </table></td>
  </tr>
<? } ?>
<?
$smain="select id, cate_name, icon from category where id between 8 and 10 order by id asc";
$remain=mysql_query($smain) or die("ERROR $smain");
while($rmain=mysql_fetch_row($remain)){
$urlmain=rewrite($rmain[1]);
?> 
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
      <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20" height="20" align="left"><img src="http://<?=$titler[13];?>/icon-menu/<?=$rmain[2];?>" width="16" height="16" /></td>
          <td width="180" align="left"><font size="2"><a href="http://<?=$titler[13];?>/cate/<?=$rmain[0];?>/<?=$urlmain;?>.html" title="<?=$rmain[1];?>"><?=$rmain[1];?></a></font></td>
        </tr>
      </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="5" style="border-bottom:1px dotted #999999;"></td>
        </tr>
      </table></td>
  </tr>
<? } ?>
<?
$s="select * from category";
$re=mysql_query($s) or die("ERROR $s");
$n=mysql_num_rows($re);
//$sn=$n+1;

$sother="select id, cate_name, icon from category order by id asc limit 18, $n";
$reother=mysql_query($sother) or die("ERROR $sother");
while($rother=mysql_fetch_row($reother)){
$urlother=rewrite($rother[1]);
?> 
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
      <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20" height="20" align="left"><img src="http://<?=$titler[13];?>/icon-menu/<?=$rother[2];?>" width="16" height="16" /></td>
          <td width="180" align="left"><font size="2"><a href="http://<?=$titler[13];?>/cate/<?=$rother[0];?>/<?=$urlother;?>.html" title="<?=$rother[1];?>"><?=$rother[1];?></a></font></td>
        </tr>
      </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="5" style="border-bottom:1px dotted #999999;"></td>
        </tr>
      </table></td>
  </tr>
<? } ?>
</table>

