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
if($id=='edit' || $id==''){
echo ADMIN_HEAD;
?>
<script>
function chk(){
	if(form.adminname.value==''){
		alert('����Ա�ʺ�Ϊ��');
		return false;
	}
	if(form.password.value=='' || form.password.value!=form.password1.value){
		alert('����Ϊ�ջ��ٴ����벻һ��');
		return false;
	}
}
</script>
<body> 
<div class="right">
  <? include "welcome.php"; ?>
  <div class="right_main">
  
  
  <form action="?id=save"  method="post" name="form" onsubmit="return chk();">
    <table width="98%" border="0" cellpadding="4" cellspacing="1" class="tableoutline"> 
        <tr nowrap  class="tb_head">
          <td colspan="2"><h2>�޸����룺</h2></td>
        </tr>
        <tr nowrap class="firstalt">
          <td width="260"><b>�û���</b><br><font color="#666666">���޸ģ��뱣��</font></td>
          <td><input  type="text" name="adminname" size="33" value="<?php echo $adminname; ?>"onFocus="this.style.borderColor='#00CC00'" onBlur="this.style.borderColor='#dcdcdc'" >
          </td>
        </tr>
		<tr nowrap class="firstalt">
          <td width="260"><b>������</b><br><font color="#666666">�����µ�����</font></td>
          <td><input  type="password" name="password" size="37"onFocus="this.style.borderColor='#00CC00'" onBlur="this.style.borderColor='#dcdcdc'" >
          </td>
        </tr>
        <tr nowrap class="firstalt">
          <td width="260"><b>�ظ�������</b><br><font color="#666666">�ظ������µ�����</font></td>
          <td><input  type="password" name="password1" size="37"onFocus="this.style.borderColor='#00CC00'" onBlur="this.style.borderColor='#dcdcdc'" >
          </td>
        </tr>
      </tbody>
<script type="text/javascript">
document.write(submit);
</script>
      </form>
    </table>  
  
 
  </div>
</div>
</body>
</html>

<?php
}elseif ($id=='save'){
	$con='<?php'."\r\n".'$adminname='.'"'.trim($_POST['adminname']).'"'.";\r\n".'$password='.'"'.md5($_POST['password']).'"'.";\r\n?>";
	if(@preg_match("/require|include|REQUEST|eval|system|fputs/i", $con)){   
		ShowMsg("���зǷ��ַ�,����������",'-1',2000);
	}else{
		write("data.php",$con);
		ShowMsg("�˺��޸ĳɹ�,�����µ�¼��",'index.php',2000);
	}
}
?>

