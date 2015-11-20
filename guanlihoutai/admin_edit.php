<?php
$admin->admin_chk($_SESSION['uid'],$_SESSION['shell'],1);

$id=$_GET['id'];
$admin->select(QIANZHUI.'admin',"*","`id` = '$id'");
$row=$admin->fetch_array();

if($_SERVER['REQUEST_METHOD']== 'POST'){
	$postid=$_POST['postid'];
	if(empty($_POST['password']) or empty($_POST['password2'])) $admin->msg("index.php?app=gl&action=admin_edit&id=$postid","密码不能为空！");
	if($_POST['password']<>$_POST['password2']) $admin->msg("index.php?app=gl&action=admin_edit&id=$postid","密码不相同！");
	if($_POST['level']==0) $admin->msg("index.php?app=gl&action=admin_edit&id=$postid","请选择用户权限！");
	$admin->admin_edit($postid,$_POST['password'],$_POST['level']);
}
include('template/admin_edit.php');
?>