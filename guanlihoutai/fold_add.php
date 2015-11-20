<?php
$admin->admin_chk($_SESSION['uid'],$_SESSION['shell'],1);
if($_SERVER['REQUEST_METHOD']== 'POST'){
	if(empty($_POST['name'])) $admin->msg("index.php?app=gl&action=fold_add","栏目名称不能为空！");
	$name=$_POST['name'];
	$admin->insert(QIANZHUI.'fold','`name`',"'".$name."'");
	$admin->msg("index.php?app=gl&action=fold","添加栏目成功！");
}
include('template/fold_add.php');
?>