<?php
$admin->admin_chk($_SESSION['uid'],$_SESSION['shell'],2);

$admin->select(QIANZHUI."config","*");
$row=$admin->fetch_array();

include('template/first.php');
?>