<?php
/*--------------------------
viviС͵��վϵͳ
qq:996948519
---------------------------*/
require_once('data.php');
require_once('checkAdmin.php');
$v_config=require_once('../data/config.php');
require_once('../inc/common.inc.php');
$id=isset($_GET ['id'])?$_GET ['id']:'';
if ($id=='') {
echo ADMIN_HEAD;
?>
<body>
<div class="right">
 <?php include "welcome.php";?>
  <div class="right_main">
<table width="98%" cellspacing="1" cellpadding="4" border="0" class="tableoutline">
	<tbody>
		<tr class="tb_head">
			<td><h2>���������</h2></td>
		</tr>
	</tbody>
</table>
<table width="98%" border="0" cellpadding="4" cellspacing="1" class="tableoutline">
	<tbody id="config2">
		<tr align=center class="firstalt">
          <td width="30%">����˵��</td>
          <td width="30%">����Ŀ¼</td>
		  <td width="20%">�����С</td>
          <td width="20%">����</td>
        </tr>
		<tr align=center class="firstalt">
          <td>��ҳ����</td>
          <td>../data/cache/index.html</td>
		  <td style="color: #FF0000;"><?php echo @round(@filesize(VV_CACHE."/index.html")/1024,2)?> KB</td>
          <td style="text-align:center"><input type="button" class="bginput" style="height:19px; font-size:12px" value="���" onClick="javascript:location.href='?id=del&del=index';" name="Input"></td>
        </tr>
        <tr align=center class="firstalt">
          <td>����ҳ����</td>
          <td >../data/cache/html</td>
		  <td style="color: #FF0000;" id="getdirsize"><a href="javascript:" onclick='getdirsize();'>�����ȡ</a></td>
          <td style="text-align:center"><input type="button" class="bginput" style="height:19px; font-size:12px" value="���" onClick="javascript:location.href='?id=del&del=other';" name="Input"></td>
        </tr>
		<tr align=center class="firstalt">
          <td>ͼƬ����</td>
          <td >../data/cache/img</td>
		  <td style="color: #FF0000;" id="getimgsize"><a href="javascript:" onclick='getimgsize();'>�����ȡ</a></td>
          <td style="text-align:center"><input type="button" class="bginput" style="height:19px; font-size:12px" value="���" onClick="javascript:location.href='?id=del&del=img';" name="Input"></td>
        </tr>
		<tr align=center class="firstalt">
          <td>css����</td>
          <td >../data/cache/css</td>
		  <td style="color: #FF0000;" id="getcsssize"><a href="javascript:" onclick='getcsssize();'>�����ȡ</a></td>
          <td style="text-align:center"><input type="button" class="bginput" style="height:19px; font-size:12px" value="���" onClick="javascript:location.href='?id=del&del=css';" name="Input"></td>
        </tr>
		<tr align=center class="firstalt">
          <td>js����</td>
          <td >../data/cache/css</td>
		  <td style="color: #FF0000;" id="getjssize"><a href="javascript:" onclick='getjssize();'>�����ȡ</a></td>
          <td style="text-align:center"><input type="button" class="bginput" style="height:19px; font-size:12px" value="���" onClick="javascript:location.href='?id=del&del=js';" name="Input"></td>
        </tr>
		<tr align=center class="firstalt">
          <td>֩�����м�¼</td>
          <td >../data/zhizhu.txt</td>
		  <td style="color: #FF0000;"><?php echo @round(@filesize(VV_DATA."/zhizhu.txt")/1024,2)?> KB</td>
          <td style="text-align:center"><input type="button" class="bginput" style="height:19px; font-size:12px" value="���" onClick="javascript:location.href='?id=del&del=zhizhu';" name="Input"></td>
        </tr>
		<tr align=center class="firstalt">
          <td >һ�����ȫ������</td>
          <td >&nbsp;</td>
		  <td>&nbsp;</td>
          <td style="text-align:center"><input type="button" class="bginput" style="height:19px; font-size:12px" value="���" onClick="javascript:location.href='?id=del&del=all';" name="Input"></td>
        </tr>
	</tbody>
</table>
</div>
</div>
<script type="text/javascript">
function getdirsize(){
	$('#getdirsize').html('<img src="../public/img/load.gif"> ������...');
	$.get("?id=getdirsize&_t="+Math.random()*10,function(data){
	  $('#getdirsize').html(data);
	});
}
function getimgsize(){
	$('#getimgsize').html('<img src="../public/img/load.gif"> ������...');
	$.get("?id=getimgsize&_t="+Math.random()*10,function(data){
	  $('#getimgsize').html(data);
	});
}
function getcsssize(){
	$('#getcsssize').html('<img src="../public/img/load.gif"> ������...');
	$.get("?id=getcsssize&_t="+Math.random()*10,function(data){
	  $('#getcsssize').html(data);
	});
}
function getjssize(){
	$('#getjssize').html('<img src="../public/img/load.gif"> ������...');
	$.get("?id=getjssize&_t="+Math.random()*10,function(data){
	  $('#getjssize').html(data);
	});
}
</script>
<?php include "footer.php";?>
</body>
</html>
<?php
}elseif($id == 'getdirsize') {
	echo @getRealSize(@getDirSize(VV_CACHE.'/html')).' MB';
}elseif($id == 'getjssize') {
	echo @getRealSize(@getDirSize(VV_CACHE.'/js')).' MB';
}elseif($id == 'getcsssize') {
	echo @getRealSize(@getDirSize(VV_CACHE.'/css')).' MB';
}elseif($id == 'getimgsize') {
	echo @getRealSize(@getDirSize(VV_CACHE.'/img')).' MB';
}elseif($id == 'del') {
	if($_GET['del']=='kw'){
		@unlink("../inc/kw.txt");
	}elseif($_GET['del']=='zhizhu'){
		@unlink(VV_DATA."/zhizhu.txt");
	}elseif($_GET['del']=='index'){
		@unlink(VV_CACHE."/index.html");
	}elseif($_GET['del']=='other'){
		@removedir(VV_CACHE.'/html');
	}elseif($_GET['del']=='css'){
		@removedir(VV_CACHE.'/css');
	}elseif($_GET['del']=='js'){
		@removedir(VV_CACHE.'/js');
	}elseif($_GET['del']=='img'){
		@removedir(VV_CACHE.'/img');
	}elseif($_GET['del']=='all'){
		@removedir(VV_CACHE);
		@unlink(VV_DATA."/zhizhu.txt");
	}
	ShowMsg("��ϲ��,��������ɹ���",'delcache.php',2000);
}
?>