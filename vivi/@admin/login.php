<?php
/*--------------------------
viviС͵��վϵͳ
QQ:996948519
---------------------------*/
require_once('data.php');
$v_config=require_once('../data/config.php');
require_once('../inc/common.inc.php');
if(md5($_POST['password'])==$password && $_POST['adminname']==$adminname){
	setcookie("y_Cookie", $password);
	setcookie("x_Cookie", $adminname);
	ShowMsg('�ɹ���¼��2���Ӻ�ת�������ҳ��',"admin.php",2000);
	exit;
}else{
	ShowMsg('�û������������!!!',-1,0,2000);
}
?>
