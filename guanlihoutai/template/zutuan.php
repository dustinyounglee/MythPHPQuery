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
                <td width="95%" class="STYLE1"><span class="STYLE3">你当前的位置</span>：[<a href="index.php?app=gl&action=first" target="NR">系统管理</a>]-[组团管理]</td>
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
                    <td class="STYLE1"><div align="center"><img src="<?=HT?>/template/images/22.gif" width="14" height="14" /></div></td>
                    <td class="STYLE1"><div align="center"><a href="index.php?app=gl&action=news_add" target="NR">新增</a></div></td>
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
      <tr>
        <td width="8" background="<?=HT?>/template/images/tab_12.gif">&nbsp;</td>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="b5d6e6" onmouseover="changeto()"  onmouseout="changeback()">
          <tr>
            <td width="5%" height="22" background="<?=HT?>/template/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">序号</span></div></td>
            <td width="44%" height="22" background="<?=HT?>/template/images/bg.gif" bgcolor="#FFFFFF"><div align="center">文章标题</div></td>
            <td width="16%" height="22" background="<?=HT?>/template/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">发表时间</span></div></td>
            <td width="9%" background="<?=HT?>/template/images/bg.gif" bgcolor="#FFFFFF"><div align="center">栏目名称</div></td>
            <td width="8%" height="22" background="<?=HT?>/template/images/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">是否审核</span></div></td>
            <td width="18%" height="22" background="<?=HT?>/template/images/bg.gif" bgcolor="#FFFFFF" class="STYLE1"><div align="center">基本操作</div></td>
          </tr>
          <?php 
while($list=$admin->fetch_array($sqllist)){
	//审核状态
	if($list['zt']==1){
		$zt="通过审核";	
	}else{
		$zt="等待审核";	
	}
	//栏目名称
	$fold_id=$list['fold_id'];
	$foldsql=mysql_query("select * from `".QIANZHUI."fold` where `id`='$fold_id'");
	$foldname=mysql_fetch_array($foldsql);
	$foldname=$foldname['name'];
?>  
          <tr>
            <td height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE1">
              <div align="center"><?=$list['id']?></div>
            </div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><?=$list['bt']?></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><?=$list['datetime']?></span></div></td>
            <td bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><?=$admin->readroom($list['room'])?></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1"><?=$zt;?></span></div></td>
            <td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE4"><img src="<?=HT?>/template/images/edt.gif" width="16" height="16" /><a href="index.php?app=gl&action=zutuan_read&id=<?=$list['id']?>" target="NR">编辑</a>&nbsp; &nbsp;<img src="<?=HT?>/template/images/del.gif" width="16" height="16" /><a href="index.php?app=gl&action=zutuan&do=del&id=<?=$list['id']?>" target="NR">删除</a></span></div></td>
          </tr>
<?php 
}
?>                 
        </table></td>
        <td width="8" background="<?=HT?>/template/images/tab_15.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="35" background="<?=HT?>/template/images/tab_19.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" height="35"><img src="<?=HT?>/template/images/tab_18.gif" width="12" height="35" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="STYLE4">&nbsp;&nbsp;</td>
            <td><table border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                  <?php
				  $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,"index.php?app=gl&action=news&p=",1); 
				  ?>
                  </td>
                  </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="16"><img src="<?=HT?>/template/images/tab_20.gif" width="16" height="35" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
