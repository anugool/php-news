<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="10"></td>
  </tr>
</table>
<table width="972" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="670" align="center" valign="top"><table width="670" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="5"></td>
          </tr>
        </table>
              <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="50" background="img/bg-post.png"><table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="30" align="left"><font size="4" color="#FFFFFF"><strong>โพสข้อมูลที่นี่</strong></font></td>
                      </tr>
                      <tr>
                        <td height="20" align="left"><font size="2" color="#FF0000"><strong>Your IP :
                          <?=$_SERVER['REMOTE_ADDR'];?>
                        </strong></font></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><form action="p-post.php" method="post" name="checkForm" id="checkForm" enctype="multipart/form-data" onsubmit="return check1()">
                      <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="25"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="100" align="right"><font size="2" color="#000000"><strong>Email</strong></font></td>
                                <td width="10" align="right">&nbsp;</td>
                                <td width="300" align="left"><input name="email" type="text" id="email" style="width:280px;" /></td>
                                <td width="150" align="left"><font size="2" color="#000000"><strong>เพศ
                                  <input name="sex" type="radio" value="1" checked="checked" />
                                  </strong>ชาย<strong>
                                  <input name="sex" type="radio" value="2" />
                                </strong>หญิง</font></td>
                                <td width="100" align="left"><input name="webcam" type="checkbox" id="webcam" value="1" />
                                    <font size="2" color="#000000">มีกล้อง</font></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="25"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="100" align="right"><font size="2" color="#000000"><strong>ต้องการคุยกับ</strong></font></td>
                                <td width="10">&nbsp;</td>
                                <td width="220" align="left">
								<select name="talk_with" id="talk_with" style="width:220px;">
								<?
								$stw="select * from talk_with";
								$retw=mysql_query($stw) or die("ERROR $stw บรรทัด 55");
								while($rtw=mysql_fetch_row($retw)){
								?>
								<option value="<?=$rtw[0];?>"><?=$rtw[1];?></option>
								<? } ?>
								</select>
                                </td>
                                <td width="75" align="right"><font size="2" color="#000000"><strong>เรื่อง</strong></font></td>
                                <td width="10">&nbsp;</td>
                                <td width="245" align="left">
								<select name="talk_topic" id="talk_topic" style="width:220px;">
								<?
								$stt="select * from talk_topic";
								$rett=mysql_query($stt) or die("ERROR $stt บรรทัด 68");
								while($rtt=mysql_fetch_row($rett)){
								?>
								<option value="<?=$rtt[0];?>"><?=$rtt[1];?></option>
								<? } ?>
                                </select></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="25"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="100" align="right"><font size="2" color="#000000"><strong>ชื่อ/ข้อความ</strong></font></td>
                                <td width="10">&nbsp;</td>
                                <td width="390" align="left"><input name="msg" type="text" id="msg" style="width:380px;" /></td>
                                <td width="50" align="right"><font size="2" color="#000000"><strong>อายุ</strong></font></td>
                                <td width="10">&nbsp;</td>
                                <td width="100" align="left"><select name="age" id="age" style="width:75px;">
                                    <option value="ไม่ระบุ" selected="selected">ไม่ระบุ</option>
                                    <?
							  $age=18;
							  while($age<=100){
							  ?>
                                    <option value="<?=$age;?>">
                                      <?=$age;?>
                                  </option>
                                    <? $age++; } ?>
                                </select></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="25"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="100" align="right"><font size="2" color="#000000"><strong>รูปภาพ</strong></font></td>
                                <td width="10">&nbsp;</td>
                                <td width="320" align="left"><input name="file1" type="file" id="file1" style="width:220px;" />
                                <font size="2" color="#FF0000"> * ไม่เกิน 50 kb</font></td>
                                <td width="75" align="right"><font size="2" color="#000000"><strong>จังหวัด</strong></font></td>
                                <td width="10">&nbsp;</td>
                                <td width="145" align="left">
								  <select name="province" id="province" style="width:120px;">
								<option value="" selected="selected">- เลือกจังหวัด -</option>
								<?
								$spv="select * from province order by CONVERT(PROVINCE_NAME USING TIS620) asc ";
								$repv=mysql_query($spv) or die("ERROR $spv บรรทัด 111");
								while($rpv=mysql_fetch_row($repv)){
								?>
								<option value="<?=$rpv[0];?>"><?=$rpv[2];?></option>
								<? } ?>
                                </select></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="25"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="left"><img src="img/icon_fb.jpg" width="16" height="16" />
                                    <input name="fb" type="radio" value="1" onclick="facebook.disabled=true" checked="checked" />
                                    <font size="2" color="#000000">ไม่มี
                                      <input name="fb" type="radio" value="2" onclick="facebook.disabled=false" />
                                    <font size="2" color="#000000">มี</font></font>
                                    <input name="facebook" type="text" disabled="disabled" id="facebook" style="width:520px;" value="http://www.facebook.com/ชื่อ facebook ของคุณ" /></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="25"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="left"><img src="img/icon_tw.jpg" width="16" height="16" />
                                  <input name="tw" type="radio" value="1" onclick="twister.disabled=true" checked="checked" />
                                  <font size="2" color="#000000">ไม่มี
                                    <input name="tw" type="radio" value="2" onclick="twister.disabled=false" />
                                  <font size="2" color="#000000">มี</font></font>
                                  <input name="twister" type="text" disabled="disabled" id="twister" style="width:520px;" value="http://www.twitter.com/ชื่อ Twitter ของคุณ" /></td>
                            </tr>
                          </table>
                          </td>
                        </tr>
                        <tr>
                          <td height="25"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="left"><img src="img/line.png" width="16" height="16" />
                                  <input name="hi" type="radio" value="1" onclick="hi5.disabled=true" checked="checked" />
                                  <font size="2" color="#000000">ไม่มี
                                    <input name="hi" type="radio" value="2" onclick="hi5.disabled=false" />
                                  <font size="2" color="#000000">มี</font></font>
                                  <input name="hi5" type="text" disabled="disabled" id="hi5" style="width:520px;" /></td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="25"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="left"><img src="img/icon_bb_s.gif" width="16" height="16" />
                                    <input name="bb" type="radio" value="1" onclick="pinbb.disabled=true" checked="checked" />
                                    <font size="2" color="#000000">ไม่มี
                                      <input name="bb" type="radio" value="2" onclick="pinbb.disabled=false" />
                                    <font size="2" color="#000000">มี</font></font>
                                    <input name="pinbb" type="text" disabled="disabled" id="pinbb" style="width:520px;" maxlength="8" /></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="25"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="585" align="left"><font size="2" color="#FF0000">ไม่อนุญาตให้โพสต์ข้อความลามก อนาจาร หรือ ในเชิงธุรกิจ มิฉะนั้น Email ของท่านจะถูกลบ และ Block ทันที </font></td>
                                <td width="75" align="left"><input type="submit" name="Submit" value="Post!!" style="width:75px; height:25px;" /></td>
                              </tr>
                          </table></td>
                        </tr>
                      </table>
<script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.email.value=="") {
alert("อีเมล์ของคุณไม่ถูกต้องครับ") ;
document.checkForm.email.focus() ;
return false ;
}
else if(checkForm.email.value.indexOf('@')==-1) {
alert("อีเมล์ของคุณไม่ถูกต้องครับ") ;
document.checkForm.email.focus() ;
return false ;
}
else if(checkForm.email.value.indexOf('.')==-1) {
alert("อีเมล์ของคุณไม่ถูกต้องครับ") ;
document.checkForm.email.focus() ;
return false ;
}
else if(document.checkForm.msg.value=="") {
alert("กรุณาระบุชื่อ/ข้อความด้วยนะครับ") ;
document.checkForm.msg.focus() ;
return false ;
}
else if(document.checkForm.msg.value.length < 15) {
alert("กรุณาระบุชื่อ/ข้อความอย่างน้อย 15 ตัวอักษรครับ");
document.checkForm.msg.focus() ;
return false;
}
else if(document.checkForm.msg.value.length > 255) {
alert("กรุณาระบุชื่อ/ข้อความไม่เกิน 255 ตัวอักษรครับ");
document.checkForm.msg.focus() ;
return false;
}
else if(document.checkForm.province.value=="") {
alert("กรุณาเลือกจังหวัดด้วยนะครับ") ;
document.checkForm.province.focus() ;
return false ;
}
else 
return true ;  
}

</script> 
                  </form></td>
                </tr>
              </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
            </table></td>
      </tr>
    </table></td>
    <td width="2" align="center" valign="top">&nbsp;</td>
    <td width="300" align="center" valign="top"><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="50" background="img/bg-search.png"><table width="180" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="30" align="left"><font size="4" color="#FFFFFF"><strong>Search หาเพื่อน </strong></font></td>
              </tr>
              <tr>
                <td height="20" align="left"><font size="2" color="#000000">&nbsp;&nbsp;ค้นปุ๊บ!!!...เจอเพื่อนปั๊บ!!!</font></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#CCCCCC"><form id="form" name="form" method="post" action="search.php">
              <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="25"><table width="280" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="75" align="left"><font size="2" color="#000000">เพศ</font></td>
                      <td width="10">&nbsp;</td>
                      <td width="195" align="left"><select name="sex" id="sex" style="width:100px;">
                        <option value="ไม่ระบุ" selected="selected">ไม่ระบุ</option>
                        <option value="1">ชาย</option>
                        <option value="2">หญิง</option>
                      </select>
                      </td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="25"><table width="280" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="75" align="left"><font size="2" color="#000000">อายุ</font></td>
                      <td width="10">&nbsp;</td>
                      <td width="195" align="left"><select name="age_start" id="age_start" style="width:70px;">
                        <option value="ไม่ระบุ" selected="selected">ไม่ระบุ</option>
                        <?
							  $age_start=18;
							  while($age_start<=100){
							  ?>
                        <option value="<?=$age_start;?>">
                          <?=$age_start;?>
                          </option>
                        <? $age_start++; } ?>
                      </select>
                                  <font size="2" color="#000000">ถึง
                                    <select name="age_finish" id="age_finish" style="width:70px;">
                                    <option value="ไม่ระบุ" selected="selected">ไม่ระบุ</option>
                                    <?
							  $age_finish=18;
							  while($age_finish<=100){
							  ?>
                                    <option value="<?=$age_finish;?>">
                                    <?=$age_finish;?>
                                    </option>
                                    <? $age_finish++; } ?>
                                  </select>
                                </font></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="25"><table width="280" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="75" align="left"><font size="2" color="#000000">จังหวัด</font></td>
                      <td width="10">&nbsp;</td>
                      <td width="195" align="left"><select name="province" id="province" style="width:175px;">
                        <option value="ทุกจังหวัด" selected="selected">ทุกจังหวัด</option>
								<?
								$spv="select * from province order by CONVERT(PROVINCE_NAME USING TIS620) asc ";
								$repv=mysql_query($spv) or die("ERROR $spv บรรทัด 111");
								while($rpv=mysql_fetch_row($repv)){
								?>
								<option value="<?=$rpv[0];?>"><?=$rpv[2];?></option>
								<? } ?>
                      </select>
                      </td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="25"><table width="280" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="75" align="left"><font size="2" color="#000000">คุยกับใคร</font></td>
                      <td width="10">&nbsp;</td>
                      <td width="195" align="left">
					  <select name="talk_with" id="talk_with" style="width:175px;">
								<?
								$stw="select * from talk_with";
								$retw=mysql_query($stw) or die("ERROR $stw บรรทัด 55");
								while($rtw=mysql_fetch_row($retw)){
								?>
								<option value="<?=$rtw[0];?>"><?=$rtw[1];?></option>
								<? } ?>
                      </select>
                      </td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="25"><table width="280" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="75" align="left"><font size="2" color="#000000">เรื่องอะไร</font></td>
                      <td width="10">&nbsp;</td>
                      <td width="195" align="left">
					  <select name="talk_topic" id="talk_topic" style="width:175px;">
								<?
								$stt="select * from talk_topic";
								$rett=mysql_query($stt) or die("ERROR $stt บรรทัด 68");
								while($rtt=mysql_fetch_row($rett)){
								?>
								<option value="<?=$rtt[0];?>"><?=$rtt[1];?></option>
								<? } ?>
                      </select>
                      </td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="25" align="center"><table width="280" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="70" align="center"><input name="fb" type="checkbox" id="fb" value="1" />
                                  <img src="img/icon_fb.jpg" width="16" height="16" /></td>
                      <td width="70" align="center"><input name="hi5" type="checkbox" id="hi5" value="1" />
                                  <img src="img/line.png" width="16" height="16" /></td>
                      <td width="70" align="center"><input name="tw" type="checkbox" id="tw" value="1" />
                                  <img src="img/icon_tw.jpg" width="16" height="16" /></td>
                      <td width="70" align="center"><input name="bb" type="checkbox" id="bb" value="1" />
                                  <img src="img/icon_bb_s.gif" width="16" height="16" /></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="25" align="center"><input name="Submit" type="submit" id="Submit" value="ค้นหาเพื่อน!!" /></td>
                </tr>
              </table>
            </form></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="5"></td>
          </tr>
        </table>
              <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center">
<?
$sads4="SELECT * FROM `ads_a4` WHERE id='1'";
$reads4=mysql_query($sads4) or die("Error $sads4");
$rads4=mysql_fetch_row($reads4);
?>
                    <a href="<?=$rads4[5];?>" title="<?=$rads4[6];?>">
                    <? if($rads4[1]==1){  ?>
                    <img src="http://<?=$titler[13];?>/ads-img/<?=$rads4[7];?>" width="300" height="60" border="0" title="<?=$rads4[6];?>" alt="<?=$rads4[6];?>" />
                    <? }else if($rads4[1]==2){ ?>
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="300" height="60" border="0">
                      <param name="movie" value="http://<?=$titler[13];?>/ads-img/<?=$rads4[7];?>" />
                      <param name="quality" value="high" />
                      <embed src="http://<?=$titler[13];?>/ads-img/<?=$rads4[7];?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="300" height="60"></embed>
                    </object>
                    <? } ?>
                  </a></td>
                </tr>
            </table></td>
      </tr>
    </table></td>
  </tr>
</table>
