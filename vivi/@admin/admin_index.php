<?php
/*--------------------------
viviС͵��վϵͳ
qq:996948519
---------------------------*/
require_once('data.php');
require_once('checkAdmin.php');
echo ADMIN_HEAD;
if(@$_GET['a']=='phpinfo'){
	phpinfo();
	exit;
}
?>
<body>

<div class="right">
  <?php include "welcome.php"; ?>
  
  <div class="right_main">
    <table width="98%" border="0" cellpadding="4" cellspacing="1" class="tableoutline">
      <tr class=tb_head>
        <td colspan="2" class="tbhead"><h2> ϵͳ��Ϣ��</h2></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">������ (IP���˿�)��</td>
        <td width="75%"><?php echo $_SERVER['SERVER_NAME']?>&nbsp;&nbsp;(<? echo $_SERVER['SERVER_ADDR'].":".$_SERVER['SERVER_PORT'];?>)</td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">����Ŀ¼��</td>
        <td width="75%"><?php echo dirname(dirname($_SERVER['SCRIPT_FILENAME']));?></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">Web��������</td>
        <td width="75%"><?php echo $_SERVER['SERVER_SOFTWARE']?></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">PHP ���з�ʽ��</td>
        <td width="75%"><?php echo PHP_SAPI?></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">PHP�汾��</td>
        <td width="75%"><?php echo PHP_VERSION?>&nbsp;&nbsp;<span style="color: #999999;">(>5.20)</span></td>
      </tr>
      
      <tr nowrap class="firstalt">
        <td width="25%">����ϴ����ƣ�</td>
        <td width="75%"><?php echo ini_get('file_uploads') ? ini_get('upload_max_filesize') : '<span style="color:red">Disabled</span>';?></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">���ִ��ʱ�䣺</td>
        <td width="75%"><?php echo ini_get('max_execution_time')?> seconds</td>
      </tr>
	  <tr nowrap class="firstalt">
        <td width="25%">display_errors�Դ��أ�</td>
        <td width="75%"><?php echo ini_get('display_errors') ? 'on' : 'off';  ?></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">֧�ֵĲɼ���ʽ��</td>
        <td width="75%">
		<?php echo function_exists('curl_init') && function_exists('curl_exec') ? '<span style="color:green">curl_init</span>' : '<span style="color:red">curl_init</span>'?> (�Ƽ�)��<?php echo (function_exists('fsockopen') || function_exists('pfsockopen') ) ? '<span style="color:green"> fsock</span>��' : '<span style="color:red"> fsockopen</span>��'?><?php echo function_exists('file_get_contents') ? '<span style="color:green"> file_get_contents</span>' : '<span style="color:red"> file_get_contents</span>'?> ( ϵͳ���Զ������л� )
		</td>
      </tr>
    </table>
    <table width="98%" border="0" cellpadding="4" cellspacing="1" class="tableoutline">
      <tr  class=tb_head>
        <td colspan="2"><h2>��Ʒ˵����</h2></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">վ�����ţ�</td>
        <td><iframe src="http://www.vxiaotou.com/news.html"; name="express" width="300" height="20" marginwidth="0" marginheight="0" frameborder="0" scrolling="no"></iframe></td>
      </tr>
	  <tr nowrap class="firstalt">
        <td width="25%">��ǰ�汾��</td>
        <td><font class="normalfont"><?php echo $version;?></font></td>
      </tr>
	  <tr nowrap class="firstalt">
        <td width="25%">�����£�</td>
        <td><span id="checkvip"></span> <?php if(!OoO0o0O0o()){echo '&nbsp;<a href="javascript:" onclick="o();"><font color="red">���¼����Ȩ��</font></a>';}?></td>
      </tr>
      <tr nowrap class="firstalt">
        <td width="25%">����֧�֣�</td>
        <td>QQ��<a href="http://wpa.qq.com/msgrd?v=3&uin=996948519&site=qq&menu=yes" target="_blank">996948519</a> &nbsp;&nbsp;&nbsp;���� : <a href="http://www.vxiaotou.com" target="_blank">www.vxiaotou.com</a></td>
      </tr>
     
    </table>
  </div>
</div>
<?php include "footer.php"; ?>
</body>
</html>