<?php
$username=$_POST['username'];
$password=$_POST['password'];
if($admin->admin_chk_shell($_SESSION['uid'],$_SESSION['shell'])) $admin->msg("index.php?app=gl&action=main","自动登录中...");
if($_POST) $admin->admin_login($username,$password);
include('template/index.php');
?>