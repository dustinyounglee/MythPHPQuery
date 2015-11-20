<?php
/*--------------------------
vivi小偷网站系统
qq:996948519
---------------------------*/
require_once('data.php');
require_once('checkAdmin.php');
$v_config=require_once('../data/config.php');
require_once('../inc/common.inc.php');
$id=isset($_GET ['id'])?$_GET ['id']:'';
$file=VV_DATA."/flink.conf";
$flink=@file_get_contents($file);
if($id==''){
echo ADMIN_HEAD;
?>
<body>
<div class="right">
   <?php include "welcome.php";?>
  <div class="right_main">
  <form action="?id=save" method="post" onSubmit="return chk();" >
  <table width="98%" border="0" cellpadding="4" cellspacing="1" class="tableoutline">
	<tr class="tb_head">  
		<td colspan="2">
			<h2>友情链接设置</h2>
		</td>
	</tr>
	<tr class="firstalt">
		<td width="260" align="center">
			<b>友情链接设置</b>
		</td>  
		<td>每行一个链接<br>如：&lt;a target="_blank" href='http://baidu.com' &gt;百度&lt;/a&gt;<br>
		<textarea name="flink" cols="80" style="height:120px; width:450px" onFocus="this.style.borderColor='#00CC00'" onBlur="this.style.borderColor='#dcdcdc'" ><?php echo $flink?></textarea>
		</td>
	</tr>
<script type="text/javascript">
document.write(submit);
</script>
 </table>
</form>
  </div>
</div>
<?php include "footer.php";?>
</body>
</html>

<?php
}elseif ($id=='save'){
	$con=get_magic(trim($_POST['flink']));
	$con=str_replace('<?','***',$con);
	if(@preg_match("/require|include|REQUEST|eval|system|fputs/i", $con)){   
		ShowMsg("含有非法字符,请重新设置",'-1',2000);
	}else{
		write($file,$con);
		ShowMsg("恭喜你,修改成功！",'flink.conf',2000);
	}
}
?>

