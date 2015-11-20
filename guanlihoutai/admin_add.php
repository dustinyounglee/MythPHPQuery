<?php
$admin->admin_chk($_SESSION['uid'],$_SESSION['shell'],1);
if($_SERVER['REQUEST_METHOD']== 'POST'){
	if(empty($_POST['username'])) $admin->msg("index.php?app=gl&action=admin_add","账号不能为空！");
	if(empty($_POST['password']) or empty($_POST['password2'])) $admin->msg("index.php?app=gl&action=admin_add","密码不能为空！");
	if($_POST['password']<>$_POST['password2']) $admin->msg("index.php?app=gl&action=admin_add","密码不相同！");
	if($_POST['level']==0) $admin->msg("index.php?app=gl&action=admin_add","请选择用户权限！");
	$admin->admin_add($_POST['username'],$_POST['password'],$_POST['level']);
}
include('template/admin_add.php');
?>