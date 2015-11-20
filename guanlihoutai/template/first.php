<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DTOS</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-size: 12px;
}
.STYLE1 {font-size: 12px}
.STYLE3 {font-size: 12px; font-weight: bold; }
.STYLE4 {
	color: #03515d;
	font-size: 12px;
}
.rightbt {
	text-align: right;
	font-size: 12px;
	line-height: 25px;
}
-->
</style>

<script>
var  highlightcolor='#c1ebff';
//此处clickcolor只能用win系统颜色代码才能成功,如果用#xxxxxx的代码就不行,还没搞清楚为什么:(
var  clickcolor='#51b2f6';
function  changeto(){
source=event.srcElement;
if  (source.tagName=="TR"||source.tagName=="TABLE")
return;
while(source.tagName!="TD")
source=source.parentElement;
source=source.parentElement;
cs  =  source.children;
//alert(cs.length);
if  (cs[1].style.backgroundColor!=highlightcolor&&source.id!="nc"&&cs[1].style.backgroundColor!=clickcolor)
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor=highlightcolor;
}
}

function  changeback(){
if  (event.fromElement.contains(event.toElement)||source.contains(event.toElement)||source.id=="nc")
return
if  (event.toElement!=source&&cs[1].style.backgroundColor!=clickcolor)
//source.style.backgroundColor=originalcolor
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor="";
}
}

function  clickto(){
source=event.srcElement;
if  (source.tagName=="TR"||source.tagName=="TABLE")
return;
while(source.tagName!="TD")
source=source.parentElement;
source=source.parentElement;
cs  =  source.children;
//alert(cs.length);
if  (cs[1].style.backgroundColor!=clickcolor&&source.id!="nc")
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor=clickcolor;
}
else
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor="";
}
}
</script>

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" background="<?=HT?>/template/images/tab_05.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" height="30"><img src="<?=HT?>/template/images/tab_03.gif" width="12" height="30" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="46%" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="5%"><div align="center"><img src="<?=HT?>/template/images/tb.gif" width="16" height="16" /></div></td>
                <td width="95%" class="STYLE1"><span class="STYLE3">DTOS信息系统管理后台</span></td>
              </tr>
            </table></td>
            <td width="54%"><table border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td width="60"><table width="87%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center">
                      
                    </div></td>
                    <td class="STYLE1"></td>
                  </tr>
                </table></td>
                <td width="60"><table width="90%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1">&nbsp;</td>
                    <td class="STYLE1">&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="16"><img src="<?=HT?>/template/images/tab_07.gif" width="16" height="30" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <form action="" method="post">
      <tr>
        <td width="8" background="<?=HT?>/template/images/tab_12.gif" >&nbsp;</td>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="b5d6e6" onmouseover="changeto()"  onmouseout="changeback()">
          <tr>
            <td width="16%"  bgcolor="#FFFFFF" class="rightbt">系统版本号：</td>
            <td width="84%" colspan="6"  bgcolor="#FFFFFF"><label for="username"></label>
              &nbsp;
              <?=$row['version']?></td>
            </tr>
          <tr>
            <td bgcolor="#FFFFFF" class="rightbt">授权使用公司：</td>
            <td colspan="6"  bgcolor="#FFFFFF"><label for="password"></label>
              &nbsp;
              <?=$row['coname']?></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" class="rightbt">授权时间：</td>
            <td colspan="6"  bgcolor="#FFFFFF"><label for="password2"></label>
             &nbsp;
             <?=$row['time']?></td>
          </tr>
          <tr>
            <td  bgcolor="#FFFFFF" class="rightbt">授权域名：</td>
            <td colspan="6"  bgcolor="#FFFFFF"><label for="level"></label>
              &nbsp;
              <?=$row['domain']?></td>
          </tr>
          <tr>
            <td  bgcolor="#FFFFFF" class="rightbt">短信剩余条数：</td>
            <td colspan="6"  bgcolor="#FFFFFF">&nbsp;              <?=$row['sms']?></td>
          </tr>
          </table></td>
        <td width="8" background="<?=HT?>/template/images/tab_15.gif">&nbsp;</td>
      </tr>
      </form>
    </table></td>
  </tr>
  <tr>
    <td height="35" background="<?=HT?>/template/images/tab_19.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" height="35"><img src="<?=HT?>/template/images/tab_18.gif" width="12" height="35" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="STYLE4"></td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td width="16"><img src="<?=HT?>/template/images/tab_20.gif" width="16" height="35" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" background="<?=HT?>/template/images/tab_05.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" height="30"><img src="<?=HT?>/template/images/tab_03.gif" width="12" height="30" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="46%" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="5%"><div align="center"><img src="<?=HT?>/template/images/tb.gif" width="16" height="16" /></div></td>
                <td width="95%" class="STYLE1"><span class="STYLE3">程序开发信息</span></td>
              </tr>
            </table></td>
            <td width="54%"><table border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td width="60"><table width="87%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center"></div></td>
                    <td class="STYLE1"></td>
                  </tr>
                </table></td>
                <td width="60"><table width="90%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1">&nbsp;</td>
                    <td class="STYLE1">&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="16"><img src="<?=HT?>/template/images/tab_07.gif" width="16" height="30" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form action="" method="post">
        <tr>
          <td width="8" background="<?=HT?>/template/images/tab_12.gif" >&nbsp;</td>
          <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="b5d6e6" onmouseover="changeto()"  onmouseout="changeback()">
            <tr>
              <td width="16%"  bgcolor="#FFFFFF" class="rightbt">开发公司：</td>
              <td width="84%" colspan="6"  bgcolor="#FFFFFF"><label for="username2"></label>
                &nbsp;
                佛山市德信创易网络有限公司</td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF" class="rightbt">联系电话：</td>
              <td colspan="6"  bgcolor="#FFFFFF"><label for="password3"></label>
                &nbsp;
                15307578392</td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF" class="rightbt">E-mail：</td>
              <td colspan="6"  bgcolor="#FFFFFF"><label for="password4"></label>
                &nbsp;
                myth@dexinnet.com</td>
            </tr>
            </table></td>
          <td width="8" background="<?=HT?>/template/images/tab_15.gif">&nbsp;</td>
        </tr>
      </form>
    </table></td>
  </tr>
  <tr>
    <td height="35" background="<?=HT?>/template/images/tab_19.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" height="35"><img src="<?=HT?>/template/images/tab_18.gif" width="12" height="35" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="STYLE4"></td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td width="16"><img src="<?=HT?>/template/images/tab_20.gif" width="16" height="35" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
