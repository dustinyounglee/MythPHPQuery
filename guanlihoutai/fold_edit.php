<?php
$admin->admin_chk($_SESSION['uid'],$_SESSION['shell'],1);

//获取新闻表的内容
$id=$_GET['id'];
$admin->select(QIANZHUI."fold","*","`id`='$id'");
$row=$admin->fetch_array();

//修改数据
if($_SERVER['REQUEST_METHOD']== 'POST'){
	$postid=$_POST['postid'];
	$name=$_POST['name'];
	if(empty($_POST['name'])) $admin->msg("index.php?app=gl&action=fold_edit&id=$postid","标题不能为空！");
	$admin->update(QIANZHUI."fold", "`name`='$name'", "`id`='$postid'");
	$admin->msg('index.php?app=gl&action=fold',"修改栏目成功！");
}
//加载模板
include('template/fold_edit.php');
?>