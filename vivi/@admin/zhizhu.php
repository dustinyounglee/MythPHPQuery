<?php
/*--------------------------
viviС͵��վϵͳ
qq:996948519
---------------------------*/
require_once('data.php');
require_once('checkAdmin.php');
$v_config=require_once('../data/config.php');
require_once('../inc/common.inc.php');
if(isset($_GET['del']) && $_GET['del']=='yes'){
	@unlink(VV_DATA."/zhizhu.txt");
	ShowMsg("֩����������ϣ�",'zhizhu.php',2000);
}
echo ADMIN_HEAD;
?>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
p {	
	margin: 0 0 10px 5px;
	
}
.f {color: #CCCCCC}
-->
</style>

<body>

<div class="right">
  <?php include "welcome.php"; ?>
  <div class="right_main">

 <table width="98%" border="0" cellpadding="4" cellspacing="1" class="tableoutline">
 <tr nowrap  class="tb_head">
      <td colspan="5" id="a"><h2>֩����ʼ�¼����ʾǰ300��&nbsp;&nbsp;<a href="?del=yes" style='color:red'>�����¼</a></h2></td>
 </tr>

 <tr nowrap class="firstalt">
   <td width="50" height="30"><div align="center">ID</div></td>
   <td width="70"><div align="center">֩��</div></td>
   <td width="120"><div align="center">֩��IP</div></td>
   <td>����ҳ��</td>
   <td width="200">����ʱ��</td>
 </tr>
<?php
if(file_exists(VV_DATA."/zhizhu.txt")){
	$list=file(VV_DATA."/zhizhu.txt");
	$l=count($list);
	$l=min($l,300);
	if( $l!=0 ){
		for ($i=0; $i<$l; $i++) {
		   $detail=explode("---",$list[$i]);
		   echo '<tr class="firstalt"><td>'.$i.'</td><td >'.$detail[1].'</td><td >'.$detail[0].'</td><td><a target="_blank" href="'.$detail[2].'">'.$detail[2].'</a></td><td>'.$detail[3].'</td></tr>'."\r\n";
		   if(empty($detail[0]) || $detail[0]=='') break;  
		}
	}else{
		echo '<tr align=center class="firstalt"><td colspan=5>��ʱ��û��֩�����</td></tr>';
	}
}else{
		echo '<tr align=center class="firstalt"><td colspan=5>��ʱ��û��֩�����</td></tr>';
}
?>
 </table>
</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>